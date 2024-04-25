<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SpecsFactory extends Factory
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
            'cname' => $this->faker->name,
            'ram' => $this->faker->numberBetween(100, 1000),
            'bit' => $this->faker->numberBetween(100, 1000),
            'storage' => $this->faker->numberBetween(100, 1000),
            'battery' => $this->faker->numberBetween(100, 1000)
        ];
    }
}
