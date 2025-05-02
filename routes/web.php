<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// 🔒 Authentication Routes (Login/Logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ✅ Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('product-in', ProductInController::class);
    Route::resource('product-out', ProductOutController::class);


    Route::get('/report/daily', [ProductInController::class, 'dailyReport'])->name('report.daily');
});
