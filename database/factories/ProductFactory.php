<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
        ];
    }

    public function released(): self
    {
        return $this->state(fn () => ['released' => true]);
    }

    public function archived(): self
    {
        return $this->state(fn () => ['archived' => true]);
    }
}
