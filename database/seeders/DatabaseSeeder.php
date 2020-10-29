<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'ichiroadris',
            'email' => 'ichiroadris@gmail.com',
        ]);
        // \App\Models\User::factory(10)->create();

        // factory(\App\User::class)->create(['name' => 'ichiroadris' ,'email' => 'admin@tutory.tech', 'role' => 1]);
    }
}
