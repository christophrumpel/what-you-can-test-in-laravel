<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsApiController extends Controller
{
    public function __invoke()
    {
        return Product::all();
    }
}
