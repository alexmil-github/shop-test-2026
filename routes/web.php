<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin/login', [\App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login.submit');
Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/admin', [\App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth');

Route::resource('admin/category', \App\Http\Controllers\CategoryController::class);

Route::resource('admin/product', \App\Http\Controllers\ProductController::class);


