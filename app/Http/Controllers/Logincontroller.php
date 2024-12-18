<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

     
        $user = DB::table('users')->where('email', $validated['email'])->where('password', $validated['password'])->first();
                
        if ($user) {
                  
            // if (Hash::check($validated['password'], $user->password)) {
              
                return redirect('/list')->with('success', 'เข้าสู่ระบบสำเร็จ!');
            // }
        }

      
        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง.',
        ])->onlyInput('email');
    }
}



