<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Patient;
use App\Models\BloodType;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PatientsImport implements ToCollection, WithHeadingRow, WithChunkReading, ShouldQueue
{
    public function collection(Collection $rows)
    {
        // Caché de tipos de sangre para optimizar consultas
        $bloodTypes = BloodType::all()->keyBy('name');
        
        // Precargar el rol de Spatie para evitar consultas estáticas por cada usuario
        $patientRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'patient', 'guard_name' => 'web']);

        // 🔥 ¡Optimización Extrema de Concurrencia!
        // Envolver todas las inserciones del "Chunk" en una ÚNICA transacción.
        // Esto cambia el disco de escribir 2,000 veces a escribir 1 sola vez por ronda en SQLite.
        \Illuminate\Support\Facades\DB::transaction(function () use ($rows, $bloodTypes, $patientRole) {
            foreach ($rows as $row) {
                // Verificar si el correo está vacío cruzando con los datos de prueba
                if (!isset($row['correo']) || empty(trim($row['correo']))) {
                    continue;
                }

                try {
                    // Crear o actualizar el usuario usando las columnas en español
                    $user = User::firstOrCreate(
                        ['email' => trim($row['correo'])],
                        [
                            'name' => trim($row['nombre_completo']) ?? 'Usuario Importado',
                            // Como no hay ID, usamos el teléfono como password provisional
                            'password' => Hash::make(trim($row['telefono']) ?? 'password123'),
                            'phone' => trim($row['telefono']) ?? null,
                        ]
                    );

                    // Asignar rol de paciente usando el modelo nativo directamente
                    if (!$user->hasRole($patientRole->name)) {
                        $user->assignRole($patientRole);
                    }

                    // Obtener ID del tipo de sangre
                    $bloodTypeId = null;
                    if (!empty($row['tipo_sangre'])) {
                        // Buscar si existe en la base de datos (con caché local)
                        $bloodTypeModel = $bloodTypes->get(trim($row['tipo_sangre']));
                        if ($bloodTypeModel) {
                            $bloodTypeId = $bloodTypeModel->id;
                        }
                    }

                    // Como no hay campo fecha_nacimiento en la tabla original, lo guardamos en observaciones
                    $observaciones = !empty($row['fecha_nacimiento']) 
                        ? 'Fecha de Nacimiento: ' . $row['fecha_nacimiento'] 
                        : null;

                    // Crear o actualizar el perfil de paciente
                    Patient::updateOrCreate(
                        ['user_id' => $user->id],
                        [
                            'blood_type_id' => $bloodTypeId,
                            'allergies' => trim($row['alergias'] ?? ''),
                            'observations' => $observaciones,
                        ]
                    );
                } catch (\Exception $e) {
                    // Registrar el error para no detener la cola completa
                    Log::error('Error importando paciente: ' . $row['correo'] . ' - ' . $e->getMessage());
                }
            }
        });
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
