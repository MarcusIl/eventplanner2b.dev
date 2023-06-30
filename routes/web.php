<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    // Add routes specific to admin here
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::match(['get', 'post'], '/events/create', [EventController::class, 'showCreateForm'])->name('events.create');
Route::match(['get', 'post'], '/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'create'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/invite', [EventController::class, 'invite'])->name('events.invite');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::post('/events/{event}/send-invitation', [EventController::class, 'sendInvitation'])->name('events.sendInvitation');
Route::get('/invitations', [EventController::class, 'invitations'])->name('invitations.index');
Route::post('/invitations/{invitation}/respond', [EventController::class, 'respondInvitation'])->name('invitations.respond');

// Tasks
Route::get('/tasks/create/{event}', [TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('/tasks/create/{event}', [TaskController::class, 'create']);

// Budget/
Route::get('/budgets/create/{event}', [BudgetController::class, 'createForm'])->name('budgets.create');
Route::post('/budgets/create/{event}', [BudgetController::class, 'create']);
Route::patch('/budgets/{event}/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
Route::delete('/budgets/{event}/{budget}', [BudgetController::class, 'delete'])->name('budgets.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
