<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::prefix('admin')->middleware('auth')->group(function(){
    // seit jaliek route kas bus tikai prieks admin
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/invite', [EventController::class, 'invite'])->name('events.invite');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
