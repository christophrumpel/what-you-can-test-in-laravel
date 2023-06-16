<?php

use App\Console\Commands\InformAboutNewProductCommand;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewProductNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('sends notification about new product', function () {
    // Arrange
    Notification::fake();
    $user = User::factory()->create();
    $product = Product::factory()->create();

    // Act
    $this->artisan(InformAboutNewProductCommand::class, [
        'productId' => $product->id,
        'userId' => $user->id,
    ]);

    // Assert
    Notification::assertSentTo(
        [$user], NewProductNotification::class
    );
});

it('fails if product not given', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $this->artisan(InformAboutNewProductCommand::class, [
        'productId' => 99,
        'userId' => $user->id,
    ]);
})->throws(ModelNotFoundException::class);

it('fails if user not given', function () {
    // Arrange
    $product = Product::factory()->create();

    // Act
    $this->artisan(InformAboutNewProductCommand::class, [
        'productId' => $product->id,
        'userId' => 99,
    ]);
})->throws(ModelNotFoundException::class);
