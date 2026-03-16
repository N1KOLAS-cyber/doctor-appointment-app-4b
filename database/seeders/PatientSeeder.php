<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $attrs = [
                'name' => 'Paciente ' . $i,
                'password' => bcrypt('password'),
            ];
            if (Schema::hasColumn('users', 'id_number')) {
                $attrs['id_number'] = '123456' . $i;
            }
            if (Schema::hasColumn('users', 'phone')) {
                $attrs['phone'] = '555000' . $i . '00';
            }
            if (Schema::hasColumn('users', 'address')) {
                $attrs['address'] = 'Calle ' . $i . ', Ciudad';
            }

            $user = User::firstOrCreate(
                ['email' => 'paciente' . $i . '@ejemplo.com'],
                $attrs
            );

            if (!$user->hasRole('Paciente')) {
                $user->assignRole('Paciente');
            }

            if (!$user->patient) {
                $user->patient()->create([
                    'allergies' => 'Ninguna',
                    'chronic_conditions' => 'Ninguna',
                    'surgical_history' => 'Ninguna',
                    'family_history' => 'Ninguna',
                    'observations' => 'Paciente de prueba ' . $i,
                    'emergency_contact_name' => 'Contacto ' . $i,
                    'emergency_contact_phone' => '555999' . $i . '00',
                ]);
            }
        }
    }
}
