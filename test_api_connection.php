<?php

use Illuminate\Support\Facades\Http;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "--- MENGUJI API SECARA MANUAL ---
";

// 1. Cek List Produk
echo "\n1. Mengambil data produk (GET /api/products)...";
$response = Http::get('http://127.0.0.1:8000/api/products');
if ($response->successful()) {
    echo "✅ SUKSES: " . $response->body() . "\n";
} else {
    echo "❌ GAGAL: " . $response->status() . " - " . $response->body() . "\n";
}

// 2. Coba Create Produk
echo "\n2. Mencoba membuat produk baru (POST /api/products)...";
$response = Http::withHeaders([
    'Accept' => 'application/json',
])->post('http://127.0.0.1:8000/api/products', [
    'name' => 'Produk Test Otomatis',
    'qty' => 10,
    'price' => 50000,
    'description' => 'Ini produk dari script test',
]);

if ($response->successful()) {
    echo "✅ SUKSES CREATE: " . $response->body() . "\n";
} else {
    echo "❌ GAGAL CREATE: " . $response->status() . " - " . $response->body() . "\n";
}

