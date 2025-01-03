<?php

namespace App\Http\Controllers;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function register(Request $request)
    {
       
        $validated = $request->validate([
            'register_name' => 'required|max:255',
            'register_mail' => 'required|email|max:255', 
            'register_tel' => 'required|max:255',
            'register_image' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
           
        ]);
        $checkFromDB = Form::where('register_mail', $validated['register_mail'])
        ->orWhere('register_tel', $validated['register_tel'])
        ->first();
    
        if ($checkFromDB) {
            return response()->json([
                'errors' => [
                    'register_mail' => 'อีเมลนี้มีการใช้งานแล้ว',
                    'register_tel' => 'เบอร์โทรศัพท์นี้มีการใช้งานแล้ว',
                ]
            ]); 
        }

        // dd($validated);

        // จัดการอัปโหลดไฟล์ (ถ้ามี)
        $path = null;
        if ($request->hasFile('register_image')) {
            $path = $request->file('register_image')->store('images', 'public');
           
        }

        Form::create([
            'register_name' => $validated['register_name'],
            'register_mail' => $validated['register_mail'],
            'register_tel' => $validated['register_tel'],
            'register_status' => '1',
            'register_datetime' => Carbon::now(),
            'register_image' => $path,
        ]);
        return redirect()->back()->with('success', 'Form saved successfully!');
    }

}
