<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/Supervisor/updateStatus/{user}', [SupervisorController::class, 'updateStatus'])
    ->name('Supervisor.updateStatus');

Route::get('/Supervisor/register_vol', [SupervisorController::class, 'showRegisterVolForm'])->name('Supervisor.register_vol');
//Route::resource('supervisor', SupervisorController::class);

// Explicitly defining the register routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//Route::resource('volunteer', VolunteerController::class);
Route::get('/volunteer/{id}', [VolunteerController::class, 'showProfile'])->name('volunteer.showProfile');


