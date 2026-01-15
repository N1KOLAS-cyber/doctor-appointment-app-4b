<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fecha y hora específica para todos los roles: 20/10/2025 23:14
        // Usar Carbon para crear la fecha en la zona horaria de la aplicación
        $fixedDate = Carbon::create(2025, 10, 20, 23, 14, 0, config('app.timezone'));

        //definir roles en el orden correcto con sus IDs específicos
        $roles = [
            1 => 'Paciente',
            2 => 'Doctor',
            3 => 'Recepcionista',
            4 => 'Administrador',
        ];

        // Eliminar todos los roles existentes primero
        Role::query()->delete();

        // Resetear el auto-increment para que los IDs empiecen desde 1 (SQLite)
        if (DB::getDriverName() === 'sqlite') {
            DB::statement('DELETE FROM sqlite_sequence WHERE name = "roles"');
        }

        // Crear roles en el orden correcto con IDs y fecha fijos
        foreach ($roles as $id => $roleName) {
            DB::table('roles')->insert([
                'id' => $id,
                'name' => $roleName,
                'guard_name' => 'web',
                'created_at' => $fixedDate,
                'updated_at' => $fixedDate,
            ]);
        }
    }
}
