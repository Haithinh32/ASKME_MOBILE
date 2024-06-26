<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'password' => 'abc',
        // ]);
        \App\Models\Contact::factory(1)->create();
        \App\Models\Brands::factory(5)->create();
        \App\Models\Specs::factory(100)->create();
        \App\Models\Products::factory(100)->create();
    }
}
