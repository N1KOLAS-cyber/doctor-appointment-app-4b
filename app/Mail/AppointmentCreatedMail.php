<?php

namespace App\Mail;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
        // Cargamos las relaciones para asegurar que funcionen en la vista
        $this->appointment->loadMissing(['patient.user', 'doctor.user', 'doctor.speciality']);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmación de Cita Médica - Comprobante PDF',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.appointment.created',
        );
    }

    /**
     * Get the attachments for the message.
     * Aquí es donde generamos el PDF en memoria y lo adjuntamos usando DomPDF.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Generar el PDF desde una vista Blade
        $pdf = Pdf::loadView('pdf.appointment-receipt', ['appointment' => $this->appointment]);

        return [
            Attachment::fromData(fn () => $pdf->output(), 'comprobante_cita_' . $this->appointment->id . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
