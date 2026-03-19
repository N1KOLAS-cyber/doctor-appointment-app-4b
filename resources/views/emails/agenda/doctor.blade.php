<x-mail::message>
# Tu Agenda para hoy - {{ now()->format('d/m/Y') }}

Hola Dr(a). {{ optional($appointments->first()->doctor->user)->name }},

Esperamos que tengas un excelente día. A continuación te enviamos tu lista de pacientes programados para el día de hoy.

Atenderás a: **{{ $appointments->count() }} paciente(s)**.

<x-mail::table>
| Hora Inicio | Hora Fin | Paciente | Motivo |
|:------------|:---------|:---------|:-------|
@foreach($appointments as $appointment)
| {{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }} | {{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }} | {{ optional($appointment->patient->user)->name }} | {{ $appointment->reason ?? 'N/A' }} |
@endforeach
</x-mail::table>

Te sugerimos ingresar al sistema para ver el expediente clínico detallado de cada paciente antes de tu consulta.

Que tengas una jornada productiva,<br>
{{ config('app.name') }}
</x-mail::message>
