<?php

use App\Actions\ImportProductAction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('import product', function() {
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
