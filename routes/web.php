<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/create', [ProductController::class, 'create'])->name('tambah');
Route::post('/store', [ProductController::class, 'store'])->name('product.store');
Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');

