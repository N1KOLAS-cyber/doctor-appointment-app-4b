<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar o crear el usuario admin
        $admin = User::firstOrCreate(
            ['email' => 'nicolasprueba@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'id_number' => 'ADMIN-001',
                'phone' => '0000000000',
                'address' => 'Admin Address',
            ]
        );

        // Asignar el rol de Administrador (ID 4)
        if (!$admin->hasRole('Administrador')) {
            $admin->assignRole('Administrador');
            $this->command->info('Rol Administrador asignado a: ' . $admin->email);
        } else {
            $this->command->info('El usuario ya tiene el rol Administrador: ' . $admin->email);
        }
    }
}
