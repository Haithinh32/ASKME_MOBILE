<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'pname' => $this->faker->name,
            'price' => $this->faker->numberBetween(100, 1000),
            'description' => $this->faker->paragraph,
            'brandId' => $this->faker->numberBetween(1, 5),
            'specId' => $this->faker->numberBetween(1, 3),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
