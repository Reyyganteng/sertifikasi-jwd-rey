<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Auth Routes (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (Admin Only)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('skema', SkemaController::class);
    Route::resource('peserta', PesertaController::class);
});
