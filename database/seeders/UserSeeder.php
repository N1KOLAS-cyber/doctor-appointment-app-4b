<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'email_verified_at' => now(), // Verificar el email para permitir login
            'password' => Hash::make('nicolas1234'),
            'id_number' => '123456789',
            'phone' => '123456789',
            'address' => 'calle 123, colonia 456 ',

        ])->assignRole('doctor');

    }
}

