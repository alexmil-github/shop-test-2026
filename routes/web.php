<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('categories');
})->middleware('auth');


Route::get('/admin/login', [\App\Http\Controllers\UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login.submit');
Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/admin/categories/add', [\App\Http\Controllers\CategoryController::class, 'create'])->name('addCategory');



