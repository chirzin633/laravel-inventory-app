<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user.index');
