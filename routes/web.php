<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\AuthController;

// Halaman beranda
Route::get('/', [NasabahController::class, 'beranda'])->name('home');

// Halaman profil bank
Route::get('/profil', function () {
    return view('profil');
})->name('profil');

// Halaman FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Halaman Kontak
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route test sementara
Route::get('/test-nasabah', function () {
    return view('nasabah.test');
})->name('nasabah.test');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected routes - hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::resource('nasabah', NasabahController::class);
    Route::resource('rekening', RekeningController::class);
});