<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class CachedProductsApiController extends Controller
{
    public function __invoke()
    {
        return Cache::remember('products', 60, function () {
            return Product::all();
        });
    }
}
