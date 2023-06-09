<?php

use App\Models\Product;
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
    $this->assertDatabaseCount(Product::class, 1);
    $this->assertDatabaseHas(Product::class, [
        'title' => 'Product name',
        'description' => 'Product description',
    ]);
});

it('requires the title', function () {
    // Act
    $this->actingAs(User::factory()->create())
        ->post('product', [
            'description' => 'Product description',
        ])->assertInvalid(['title' => 'required']);
});

it('requires the description', function () {
    // Act
    $this->actingAs(User::factory()->create())
        ->post('product', [
            'title' => 'Product name',
        ])->assertInvalid(['description' => 'required']);
});

it('requires title and description tested with a dataset', function($data, $error) {
    // Act
    $this->actingAs(User::factory()->create())
        ->post('product', $data)->assertInvalid($error);
})->with([
    'title required' => [['description' => 'text'], ['title' => 'required']],
    'description required' => [['title' => 'Title'], ['description' => 'required']],
]);
