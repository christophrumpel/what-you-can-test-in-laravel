<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\User;

class AddProductToUserAction
{
    public function handle(User $user, Product $product): void
    {
        $user->products()->save($product);
    }
}
