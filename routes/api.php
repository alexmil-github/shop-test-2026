<?php


use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('registration', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('auth', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('categories/{id}/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);


Route::post('products/{id}/buy', [\App\Http\Controllers\Api\ProductController::class, 'buy'])->middleware('auth:api');
Route::post('/payment-webhook', [ProductController::class, 'handleWebhook'])
    ->name('payment.webhook');
