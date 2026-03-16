<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            'name'     => 'Admin',
            'password' => Hash::make('password'),
        ];

        if (Schema::hasColumn('users', 'id_number')) {
            $attributes['id_number'] = '0000001';
        }
        if (Schema::hasColumn('users', 'phone')) {
            $attributes['phone'] = '0000000000';
        }
        if (Schema::hasColumn('users', 'address')) {
            $attributes['address'] = 'Admin Address';
        }

        // Buscar o crear el usuario admin
        $admin = User::firstOrCreate(
            ['email' => 'nicolasprueba@gmail.com'],
            $attributes
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
