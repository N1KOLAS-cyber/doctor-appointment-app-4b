<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 pacientes de prueba
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => 'Paciente ' . $i,
                'email' => 'paciente' . $i . '@ejemplo.com',
                'password' => bcrypt('password'),
                'id_number' => '123456' . $i,
                'phone' => '555000' . $i . '00',
                'address' => 'Calle ' . $i . ', Ciudad',
            ]);
            
            $user->assignRole('Paciente');
            
            // Crear el registro de paciente
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
