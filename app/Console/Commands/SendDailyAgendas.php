<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use App\Models\User;
use App\Mail\DailyAdminAgendaMail;
use App\Mail\DailyDoctorAgendaMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailyAgendas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-agendas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía automáticamente el listado de citas diario a médicos y al administrador';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today();
        
        // 1. Todas las citas de hoy en orden cronológico
        $appointments = Appointment::with(['doctor.user', 'patient.user'])
                            ->whereDate('date', $today)
                            ->orderBy('start_time', 'asc')
                            ->get();

        if ($appointments->isEmpty()) {
            $this->info('No hay citas agendadas para hoy. No se enviaron correos.');
            return;
        }

        // 2. Enviar correo al Administrador (Todos en general)
        // Usamos Spatie permission que tienes instalado para encontrar al Admin,
        // o como respaldo rápido usamos al usuario número 1 (tu cuenta fundadora).
        try {
            $admins = User::role(['admin', 'Admin', 'Administrador'])->get();
        } catch (\Exception $e) {
            $admins = collect();
        }

        if ($admins->isEmpty()) {
            $admins = User::where('id', 1)->get();
        }

        foreach ($admins as $admin) {
            if ($admin->email) {
                Mail::to($admin->email)->queue(new DailyAdminAgendaMail($appointments));
            }
        }
        $this->info('Se colocó en cola el correo para Administrador(es).');

        // 3. Agrupar citas por ID de doctor e iterar 
        $groupedByDoctor = $appointments->groupBy('doctor_id');

        foreach ($groupedByDoctor as $doctorId => $doctorAppointments) {
            $doctor = $doctorAppointments->first()->doctor;
            
            if ($doctor && $doctor->user && $doctor->user->email) {
                // Enviar la lista de *sus* propios pacientes nada más
                Mail::to($doctor->user->email)->queue(new DailyDoctorAgendaMail($doctorAppointments));
            }
        }
        
        $this->info('Se colocaron en cola los ' . $groupedByDoctor->count() . ' reportes individuales para los doctores.');
    }
}
