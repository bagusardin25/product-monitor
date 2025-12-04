<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/create', [ProductController::class, 'create'])->name('tambah');
Route::post('/store', [ProductController::class, 'store'])->name('store');
// Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('destroy');

