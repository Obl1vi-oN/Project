<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/products', [ProductController::class, 'index'])->name('index')->middleware('auth');
Route::get('/product/{id}', [ProductController::class, 'show']);

Route::get('profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('/order', [OrderController::class, 'store']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [OrderController::class, 'show'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'admin'])->middleware('admin')->middleware('auth');

Route::put('/admin/orders/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
