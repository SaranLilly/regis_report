<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/regis_form', function () {
    return view('regis');
});


Route::post('/regis_form', [Usercontroller::class, 'register']);

Route::get('/list', function (){
    return view('list');
})->name('list');

Route::get('/registers', [RegisterController::class, 'index']);