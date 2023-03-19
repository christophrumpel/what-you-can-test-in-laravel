<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has products', function () {
    // Arrange
    $user = User::factory()
        ->has(Product::factory())
        ->create();

    // Act
    $products = $user->products;

    // Assert
    expect($products)
        ->toBeInstanceOf(Collection::class)
        ->first()->toBeInstanceOf(Product::class);
});

it('only returns released products for query scope', function () {
    // Arrange
    Product::factory()->released()->create();
    Product::factory()->create();

    // Act && Assert
    expect(Product::released()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
