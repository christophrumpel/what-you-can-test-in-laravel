<?php

use App\Http\Controllers\PageArchiveController;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Pennant\Feature;

uses(RefreshDatabase::class);

it('shows archived products', function () {
    // Arrange
    $product = Product::factory()->create();
    $archivedProduct = Product::factory()->archived()->create();

    // Act & Assert
    $this->get(action(PageArchiveController::class))
        ->assertSeeText($archivedProduct->title)
        ->assertDontSeeText($product->title);
});

it('returns 404 when archive feature disabled', function() {
	// Arrange
    Feature::define('archive', false);

	// Act & Assert
    $this->get(action(PageArchiveController::class))
        ->assertNotFound();
});
