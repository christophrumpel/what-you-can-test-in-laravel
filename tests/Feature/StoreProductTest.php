<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('stores a product', function () {
    // Act
    $this->actingAs(User::factory()->create())
        ->post('product', [
        'title' => 'Product name',
        'description' => 'Product description',
    ])->assertSuccessful();

    // Assert
    $this->assertDatabaseHas('products', [
        'title' => 'Product name',
        'description' => 'Product description',
    ]);
});
