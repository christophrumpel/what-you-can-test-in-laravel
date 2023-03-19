<?php


use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lists products', function () {
    // Arrange
    $firstProduct = Product::factory()->create();
    $secondProduct = Product::factory()->create();

    // Act & Assert
    $this->get('/')
        ->assertOk()
        ->assertSeeText([
            $firstProduct->title,
            $secondProduct->title,
        ]);
});
