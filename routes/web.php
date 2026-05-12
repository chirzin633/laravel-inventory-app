<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:Super Admin,Admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});
Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user.index');
    Route::view('superadmin/category', 'superadmin.category.index')->name('superadmin.category.index');
    Route::view('superadmin/product', 'superadmin.product.index')->name('superadmin.product.index');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::view('admin/product', 'admin.product.index')->name('admin.product.index');
});
