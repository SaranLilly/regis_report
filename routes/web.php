<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/regis_form', function () {
    return view('regis');
});

Route::get('/login', function () {
    return view('login');
});


Route::post('/regis_form', [Usercontroller::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

