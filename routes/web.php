<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/filter', [MenuController::class, 'filter'])->name('menu.filter');
