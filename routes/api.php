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
use App\Http\Controllers\Api\GoogleAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public routes
Route::post('/login', [AuthController::class, 'index']);
Route::post('/register', [AuthController::class, 'store']);

// Protected route (butuh login)
Route::middleware('auth:sanctum')->group(function () {
    // Products (hanya create, update, delete yang butuh login)
    Route::apiResource('products', ProductController::class)->except(['index', 'show']);
    // Customers
    Route::apiResource('customers', CustomerController::class);
    // Orders
    Route::apiResource('orders', OrderController::class);
    // Order Items
    Route::apiResource('order-items', OrderItemController::class);
    // Payments
    Route::apiResource('payments', PaymentController::class);
    // Categories
    Route::apiResource('categories', CategoryController::class);
    // Expenses
    Route::apiResource('expenses', ExpenseController::class);
    // Logout
    Route::post('/logout', [AuthController::class, 'destroy']);
    // Google login
    Route::post('/auth/google-login', [AuthController::class, 'googleLogin']);
    
    Route::get('/protected-data', function () {
        return response()->json(['message' => 'Berhasil akses API yang butuh token']);
    });
});