<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Registercontroller;


Route::get('auth/line', [LoginController::class, 'redirectToLine']);
Route::get('auth/line/callback', [LoginController::class, 'handleLineCallback']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/regis_form', function () {
    return view('regis');
});


Route::get('/login', function () {
    return view('login');
});

Route::get('/list', function () {
     $user = Auth::user(); 
    if($user){
    return view('list', ['user' => $user]);
    }
    else{
      return redirect('/login'); 
    }
   
    // return view('list');
});


Route::post('/regis_form', [Usercontroller::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);


Route::get('/getAllList', [RegisterController::class, 'getAllList']);
Route::post('/register/update-status', [RegisterController::class, 'updateStatus']);

Route::post('/logout', [Logoutcontroller::class, 'logout'])->name('logout');
