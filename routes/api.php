<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderItemController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExpenseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);

// Protected route (kalau nanti pakai sanctum atau auth middleware)
Route::middleware('auth:sanctum')->group(function () {
    // Products
    Route::apiResource('products', ProductController::class);
    // Customers
    Route::apiResource('customers', CustomerController::class);
    // Orders
    Route::apiResource('orders', OrderController::class);
    // Order Items (kalau butuh)
    Route::apiResource('order-items', OrderItemController::class);
    // Payments
    Route::apiResource('payments', PaymentController::class);
    // Categories
    Route::apiResource('categories', CategoryController::class);
    // Expenses
    Route::apiResource('expenses', ExpenseController::class);
    // Logout (optional)
    Route::post('/logout', [AuthController::class, 'destroy']);
});