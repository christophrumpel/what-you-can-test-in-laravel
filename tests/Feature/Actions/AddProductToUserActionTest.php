<?php

use App\Actions\AddProductToUserAction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('adds product to user', function () {
    // Arrange
    $product = Product::factory()->create();
    $user = User::factory()->create();

    // Act
    (new AddProductToUserAction())->handle($user, $product);

    // Assert
    expect($user->products)
        ->toHaveCount(1)
        ->first()->id->toEqual($product->id);
});
