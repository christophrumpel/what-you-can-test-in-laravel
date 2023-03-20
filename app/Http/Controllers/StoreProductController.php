<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreProductController extends Controller
{
    public function __invoke(Request $request): Response
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Product::create(array_merge($validated, ['user_id' => $request->user()->id]));

        return response()->noContent();
    }
}
