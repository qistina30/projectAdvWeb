<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingRecordsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RecordController;
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
Route::get('/volunteer/{id}/edit', [VolunteerController::class, 'edit'])->name('volunteer.edit');
Route::put('/volunteer/{id}', [VolunteerController::class, 'update'])->name('volunteer.update');

//Books route
Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
Route::post('/book', [BookController::class, 'store'])->name('book.store');
Route::get('/Book/create', [BookController::class, 'create'])->name('book.create');
Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');

//Member Route
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
Route::get('/member/{id}', [MemberController::class, 'show'])->name('member.show');
//Record route
Route::get('/records', [RecordController::class, 'index'])->name('records.index');
Route::get('/records/create', [RecordController::class, 'create'])->name('records.create');
Route::post('/records', [RecordController::class, 'store'])->name('records.store');
Route::get('/records/{id}/edit', [RecordController::class, 'edit'])->name('records.edit');

Route::delete('/records/{id}', [RecordController::class, 'destroy'])->name('records.destroy');


Route::put('/records/{id}', [RecordController::class, 'update'])->name('records.update');

//Route::resource('/records',RecordController::class);



