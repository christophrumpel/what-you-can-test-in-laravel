<?php


use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns correct view', function() {
    // Act & Assert
    $this->get('/')
        ->assertOk()
        ->assertViewIs('home');
});

it('lists released products', function () {
    // Arrange
    $releasedProduct = Product::factory()
        ->released()
        ->create();

    $draftProduct = Product::factory()
        ->create();

    // Act & Assert
    $this->get('/')
        ->assertOk()
        ->assertSeeText($releasedProduct->title)
        ->assertDontSeeText($draftProduct->title);
});
