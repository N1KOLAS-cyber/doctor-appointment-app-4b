<x-mail::message>
# Reporte de Citas Diarias - {{ now()->format('d/m/Y') }}

Hola Administrador,

Este es el resumen de todas las citas agendadas programadas para el día de hoy en la clínica.

En total se atenderán: **{{ $appointments->count() }} paciente(s)**.

<x-mail::table>
| Hora | Doctor | Paciente | Motivo |
|:-----|:-------|:---------|:-------|
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | Dr(a). {{ optional($appointment->doctor->user)->name }} | {{ optional($appointment->patient->user)->name }} | {{ $appointment->reason ?? 'No especificado' }} |
@endforeach
</x-mail::table>

Si necesitas modificar alguna cita urgente, consúltalo directamente en el panel administrativo.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
