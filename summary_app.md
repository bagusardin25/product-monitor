Protect Routes dengan Auth Middleware

routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('products', ProductController::class);
});


Hasil:

halaman dashboard & produk hanya bisa diakses setelah login.


Tambahkan Kolom Role (Opsional – Admin/User)
php artisan make:migration add_role_to_users_table --table=users

Schema::table('users', function (Blueprint $table) {
    $table->string('role')->default('user');
});

php artisan migrate

Role-Based Access (Admin Only)
if (Auth::user()->role !== 'admin') {
    abort(403, 'Unauthorized action.');
}

🟦 PHASE 2 — Implementasi REST API Product
API Routes

routes/api.php

Route::apiResource('products', ApiProductController::class);

API Controller

app/Http/Controllers/Api/ProductController.php

public function index() {
    return response()->json([
        'success' => true,
        'data' => Product::all()
    ]);
}

public function store(Request $request) {
    $validated = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'sku' => 'required|unique:products'
    ]);

    $product = Product::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'Product created',
        'data' => $product
    ], 201);
}


Endpoints yang diuji di Postman:

GET /api/products
GET /api/products/{id}
POST /api/products
PUT /api/products/{id}
DELETE /api/products/{id}