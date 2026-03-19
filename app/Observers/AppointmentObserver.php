<?php

namespace App\Observers;

use App\Models\Appointment;
use App\Mail\AppointmentCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     * Este código se ejecuta automáticamente SÓLO al crear una nueva cita.
     */
    public function created(Appointment $appointment): void
    {
        // Nos aseguramos de traer las relaciones de user para evitar queries n+1 o fallos
        $appointment->loadMissing(['patient.user', 'doctor.user']);

        try {
            // 1. Enviar correo al Paciente
            $patientEmail = optional($appointment->patient->user)->email;
            if ($patientEmail) {
                // Queue: Poner el correo en cola es una buena práctica para que
                // la página cargue rápido al crear la cita, pero si no tienes Redis
                // se enviará sincrónicamente (dependiendo de QUEUE_CONNECTION).
                Mail::to($patientEmail)->queue(new AppointmentCreatedMail($appointment));
            }

            // 2. Enviar correo al Doctor
            $doctorEmail = optional($appointment->doctor->user)->email;
            if ($doctorEmail && $doctorEmail !== $patientEmail) { // Prevenir doble envío si son el mismo test
                Mail::to($doctorEmail)->queue(new AppointmentCreatedMail($appointment));
            }
            
        } catch (\Exception $e) {
            // Si algo falla enviando el correo, registramos el error pero NO 
            // detenemos el flujo de creación de la cita del usuario en pantalla.
            Log::error('Error enviando el comprobante PDF de la cita: ' . $e->getMessage());
        }
    }

    /**
     * Handle the Appointment "updated" event.
     */
    public function updated(Appointment $appointment): void
    {
        // Posible lógica a futuro: enviar notificación de cambio de cita
    }

    /**
     * Handle the Appointment "deleted" event.
     */
    public function deleted(Appointment $appointment): void
    {
        // Posible lógica a futuro: enviar notificación de cancelación automática
    }

    /**
     * Handle the Appointment "restored" event.
     */
    public function restored(Appointment $appointment): void
    {
        //
    }

    /**
     * Handle the Appointment "force deleted" event.
     */
    public function forceDeleted(Appointment $appointment): void
    {
        //
    }
}
