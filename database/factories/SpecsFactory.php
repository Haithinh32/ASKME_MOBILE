<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


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
            'ram' => $this->faker->numberBetween(4,16),
            'disk' => $this->faker->numberBetween(32,256),
            'battery' => $this->faker->numberBetween(5,60),
        ];
    }
}
