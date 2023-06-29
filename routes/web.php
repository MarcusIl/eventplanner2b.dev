<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::prefix('admin')->middleware('auth')->group(function(){
    // seit jaliek route kas bus tikai prieks admin
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
