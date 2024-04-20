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
            'email' => "+001-28272300, 2466, 2469",
            'phone_num' => "webmaster@cellinfo.com",
        ];
    }
}
