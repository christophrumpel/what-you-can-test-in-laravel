<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns all products', function () {
    // Arrange
    $product = Product::factory()->create();
    $anotherProduct = Product::factory()->create();

    // Act & Assert
    $this->post('api/products')
        ->assertOk()
        ->assertJson([
            [
                'title' => $product->title,
                'description' => $product->description,
            ],
            [
                'title' => $anotherProduct->title,
                'description' => $anotherProduct->description,
            ],
        ]);
});
