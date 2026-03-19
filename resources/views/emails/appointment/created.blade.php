<x-mail::message>
# Tienes una nueva Cita Médica Programada

Hola,

Te enviamos este correo para confirmar que tu cita médica ha sido agendada con éxito.

**Detalles Rápidos:**
- **Fecha:** {{ $appointment->date->format('d/m/Y') }}
- **Hora:** {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}
- **Doctor(a):** Dr(a). {{ optional($appointment->doctor->user)->name }}
- **Paciente:** {{ optional($appointment->patient->user)->name }}

En los **archivos adjuntos** de este correo podrás encontrar el comprobante oficial de tu cita médica en formato PDF. Por favor, revísalo y guárdalo para tus registros.

Gracias por confiar en nuestra clínica,<br>
{{ config('app.name') }}
</x-mail::message>
