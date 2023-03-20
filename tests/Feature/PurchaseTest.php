<?php

use App\Actions\AddProductToUserAction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('calls add-product-to-user action', function () {
    // Assert
    $this->mock(AddProductToUserAction::class)
        ->shouldReceive('handle')
        ->atLeast()->once();

    // Arrange
    $product = Product::factory()->create();
    $user = User::factory()->create();

    // Act
    $this->post("purchase/$user->id/$product->id");
});
