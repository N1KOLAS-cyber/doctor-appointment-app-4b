<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Nicolas Gamboa',
            'email' => 'nicolasprueba@gmail.com',
            'password' => bcrypt('nicolas1234'),
            'id_number' => '123456789',
            'phone' => '123456789',
            'address' => 'calle 123, colonia 456 ',

        ])->assignRole('doctor');

    }
}

