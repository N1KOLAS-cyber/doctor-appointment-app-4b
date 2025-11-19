<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //llamar a rolleseeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);

    }
}



