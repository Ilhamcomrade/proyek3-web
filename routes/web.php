<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductViewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products/filter', [ProductViewController::class, 'filter'])->name('product.filter');
Route::get('/', [ProductViewController::class, 'index']);