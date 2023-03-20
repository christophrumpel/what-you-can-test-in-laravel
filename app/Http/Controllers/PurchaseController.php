<?php

namespace App\Http\Controllers;

use App\Actions\AddProductToUserAction;
use App\Models\Product;
use App\Models\User;

class PurchaseController extends Controller
{
    public function __invoke(User $user, Product $product): void
    {
        app(AddProductToUserAction::class)->handle($user, $product);

        // Send purchase success email, etc.
    }
}
