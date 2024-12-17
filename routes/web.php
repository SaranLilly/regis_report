<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/regis_form', function () {
    return view('regis');
});

// Route::post('register',function (Request $request) {
// 	$name = $request->input('register_fname'); 
// 	$data = array(
// 		'register_name' => $name,
//         'register_tel' => $name,
//         'register_mail' => $name,
//         'register_datetime' => $name
// 	);
//     return view("register",$data); 
// });

Route::post('/regis_form', [Usercontroller::class, 'register']);

