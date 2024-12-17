<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Registercontroller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/regis_form', function () {
    return view('regis');
});


Route::post('/regis_form', [Usercontroller::class, 'register']);

// Route::get('/list', function (){
//     return view('list');
// })->name('list');

Route::get('/list', [RegisterController::class, 'getAllList']);
Route::post('/register/update-status', [RegisterController::class, 'updateStatus']);
