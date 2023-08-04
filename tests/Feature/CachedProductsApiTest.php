<?php

use App\Http\Controllers\CachedProductsApiController;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

uses(RefreshDatabase::class);

it('calls cache remember method', function () {
    // Assert
    Cache::shouldReceive('remember')
        ->once()
        ->with('products', 60, Closure::class)
        ->andReturn(Product::all());

    // Act
    $this->post(action(CachedProductsApiController::class));
});
