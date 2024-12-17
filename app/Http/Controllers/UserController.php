<?php

namespace App\Http\Controllers;
use App\Models\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UserController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        // DB::insert('insert into register (register_id, register_name, register_surname, register_tel, register_mail, register_datetime) 
        // values (?, ?, ?, ?, ?)', [1, 'Marc']);
        // return view('regis.index', ['regis' => $users]);
        $validated = $request->validate([
            'register_name' => 'required|max:255',
            'register_mail' => 'required|email|max:255', // Add email rule for proper validation
            'register_tel' => 'required|max:255',
           
        ]);
        // dd($validated);
        // Form::create($validated);
        $test = new Form();
        $test->register_name= $validated['register_name'];
        $test->register_mail= $validated['register_mail'];
        $test->register_tel= $validated['register_tel'];
        $test->register_status= '1';
        $test->register_datetime = Carbon::now(); 
        $test->save();

        return redirect()->back()->with('success', 'Form saved successfully!');
    }
}
