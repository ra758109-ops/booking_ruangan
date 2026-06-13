<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

// Rute Publik (Guest)
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister']);

// Rute Terproteksi Login (Auth)
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [BookingController::class, 'dashboard']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Manajemen Transaksi Booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

    // Manajemen Master Data Ruangan (Proteksi Admin dipindah ke dalam Controller)
    Route::resource('ruangan', RuanganController::class);

});
