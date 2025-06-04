<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductViewController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PaymentController;


Route::get('/', [ProductViewController::class, 'index']);

// Perbaikan route filter
Route::get('/products/filter', [ProductViewController::class, 'filter'])->name('product.filter');

// Perbaikan route keranjang
Route::post('/keranjang/add', [OrderItemController::class, 'addToKeranjang'])->name('keranjang.add');
Route::get('/keranjang', [OrderItemController::class, 'index'])->name('keranjang');
Route::get('/keranjang/count', [OrderItemController::class, 'getCartCount'])->name('keranjang.count');

Route::post('/order-items', [OrderItemController::class, 'store'])->name('order-items.store');
Route::put('/order-items/{id}', [OrderItemController::class, 'update'])->name('order-items.update');
Route::delete('/order-items/{id}', [OrderItemController::class, 'destroy'])->name('order-items.destroy');

Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/order/{order}', [OrderController::class, 'index'])->name('order.index');

Route::get('/payment-methods', [PaymentMethodController::class, 'index']);
Route::get('/pembayaran/cash/{orderId}', [PaymentController::class, 'showCash'])->name('pembayaran.cash');
