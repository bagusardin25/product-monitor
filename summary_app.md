Protect Routes dengan Auth Middleware

routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('products', ProductController::class);
});


Hasil:

halaman dashboard & produk hanya bisa diakses setelah login.