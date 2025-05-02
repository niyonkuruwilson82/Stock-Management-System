<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // ✅ Update route

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // 🗑️ Delete route

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/product-in/createp', [ProductInController::class, 'createp'])->name('product-in.createp');

Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
// 🔒 Authentication Routes (Login/Logout)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ✅ Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/product-in/{product_in}/edit', [ProductInController::class, 'edit']);

    Route::resource('products', ProductController::class);
    Route::resource('product-in', ProductInController::class);
    Route::resource('product-out', ProductOutController::class);
    Route::get('/product-in/{id}/edit', [ProductInController::class, 'edit'])->name('product-in.edit');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/product-in/{product_in}/edit', [ProductInController::class, 'edit'])->name('product-in.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // ✅ Update route
    
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // 🗑️ Delete route
    

    Route::get('/report/daily', [ProductInController::class, 'dailyReport'])->name('report.daily');
});
