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
            'register_mail' => 'required|email|max:255', // Add email rule for proper validation
            'register_tel' => 'required|max:255',
            // 'register_image' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
           
        ]);
        // dd($validated);
        // Form::create($validated);
        $test = new Form();
        $test->register_name= $validated['register_name'];
        $test->register_mail= $validated['register_mail'];
        $test->register_tel= $validated['register_tel'];
        $test->register_status= '1';
        $test->register_datetime = Carbon::now(); 

        $path = $request->file('register_image')->store('image');
    //    print_r($path); exit;
        $test->register_image = $path;
        $test->save();  

       

        return redirect()->back()->with('success', 'Form saved successfully!');
    }
}
