<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
        ];
    }

    public function released(): self
    {
        return $this->state(fn () => ['released' => true]);
    }
}
