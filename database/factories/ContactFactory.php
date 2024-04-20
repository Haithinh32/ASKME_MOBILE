<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => "A-65, ACME Co., Street no 12, New York",
            'gmail' => "webmaster@cellinfo.com",
            'phone_num' => "+001-28272300, 2466, 2469",
        ];
    }
}
