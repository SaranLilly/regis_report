<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // DB::table('users')->insert([
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('test1234'),
        // ]);


        // ตรวจสอบข้อมูลการเข้าสู่ระบบ
    if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
        // เก็บข้อมูลผู้ใช้งานใน Session
        $user = Auth::user();
        session(['id' => $user->id]);

        
        // ตรวจสอบว่าต้องการ JSON response หรือ redirect
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
            ]);
        }

        // Redirect ไปยังหน้า /list
        return redirect('/list')->with('success', 'เข้าสู่ระบบสำเร็จ!');
    }
        $user = DB::table('users')->where('email', $validated['email'])->where('password', $validated['password'])->first();

   

      
        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง.',
        ])->onlyInput('email');
    }
}

