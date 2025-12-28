<?php

use App\Models\Product;

test('can list products', function () {
    Product::factory()->count(3)->create();

    $response = $this->getJson('/api/products');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'data' => [
                '*' => ['id', 'name', 'qty', 'price', 'description']
            ]
        ]);
});

test('can create product', function () {
    $data = [
        'name' => 'New Product',
        'qty' => 10,
        'price' => 99.99,
        'description' => 'Test Description'
    ];

    $response = $this->postJson('/api/products', $data);

    $response->assertStatus(201)
        ->assertJson([
            'success' => true,
            'message' => 'Product created',
            'data' => $data
        ]);

    $this->assertDatabaseHas('products', $data);
});

test('can show product', function () {
    $product = Product::factory()->create();

    $response = $this->getJson("/api/products/{$product->id}");

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'data' => [
                'id' => $product->id,
                'name' => $product->name
            ]
        ]);
});

test('can update product', function () {
    $product = Product::factory()->create();
    $updateData = ['name' => 'Updated Name'];

    $response = $this->putJson("/api/products/{$product->id}", $updateData);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Product updated',
            'data' => ['name' => 'Updated Name']
        ]);

    $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated Name']);
});

test('can delete product', function () {
    $product = Product::factory()->create();

    $response = $this->deleteJson("/api/products/{$product->id}");

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Product deleted'
        ]);

    $this->assertDatabaseMissing('products', ['id' => $product->id]);
});
