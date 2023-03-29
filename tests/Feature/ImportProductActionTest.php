<?php

use App\Actions\ImportProductAction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('imports a product', function () {
    // Arrange
    Http::fake([
        'https://christoph-rumpel.com/import' => Http::response([
            'title' => 'My new product',
            'description' => 'This is a description',
        ]),
    ]);
    $user = User::factory()->create();

    // Act
    (new ImportProductAction)->handle($user);

    // Assert
    $this->assertDatabaseHas(Product::class, [
        'title' => 'My new product',
        'description' => 'This is a description',
    ]);
});

it('make the right call', function () {
    // Arrange
    Http::fake();
    $user = User::factory()->create();

    // Act
    (new ImportProductAction)->handle($user);

    // Assert
    Http::assertSent(function ($request) {
        return $request->url() === 'https://christoph-rumpel.com/import'
            && $request['accessToken'] === '123456';
    });
});
