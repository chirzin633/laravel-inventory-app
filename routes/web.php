<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user.index');
Route::view('superadmin/category', 'superadmin.category.index')->name('superadmin.category.index');
Route::view('superadmin/product', 'superadmin.product.index')->name('superadmin.product.index');
