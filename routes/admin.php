<?php

use App\Http\Controllers\Admin\AdminProductController as AdminAdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;


Route::get('/login', [AuthLoginController::class, 'index'])->name('');
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');


Route::get('/product', [AdminAdminProductController::class, 'index'])->name('product');
Route::get('/add-product', [AdminAdminProductController::class, 'showFormProduct'])->name('add.product');