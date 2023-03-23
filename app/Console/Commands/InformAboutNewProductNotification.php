<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use App\Notifications\NewProductNotification;
use Illuminate\Console\Command;

class InformAboutNewProductNotification extends Command
{
    protected $signature = 'tweet:about-product {productId} {userId}';

    protected $description = 'Tweet about product.';

    public function handle(): void
    {
        $product = Product::findOrFail($this->argument('productId'));
        $user = User::findOrFail($this->argument('userId'));

        $user->notify(new NewProductNotification($product));
    }
}
