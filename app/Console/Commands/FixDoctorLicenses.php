<?php

namespace App\Console\Commands;

use App\Models\Doctor;
use Illuminate\Console\Command;

class FixDoctorLicenses extends Command
{
    protected $signature = 'doctors:fix-licenses';
    protected $description = 'Actualiza las cédulas de doctores que no tengan el formato numérico correcto (6-8 dígitos)';

    public function handle(): void
    {
        $doctors = Doctor::all();
        $updated = 0;

        foreach ($doctors as $doctor) {
            if (!preg_match('/^\d{6,8}$/', $doctor->medical_license_number ?? '')) {
                $newLicense = (string) rand(1000000, 9999999);
                $doctor->update(['medical_license_number' => $newLicense]);
                $this->line("Doctor ID {$doctor->id} → cédula actualizada a: {$newLicense}");
                $updated++;
            }
        }

        $this->info("✅ {$updated} doctor(es) actualizado(s).");
    }
}
