<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('registration', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('auth', [\App\Http\Controllers\Api\AuthController::class, 'login']);




