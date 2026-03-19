<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Cita Médica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #2563eb;
            margin: 0;
        }
        .details-container {
            width: 100%;
            margin-bottom: 20px;
        }
        .details-box {
            background-color: #f3f4f6;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .box-title {
            font-weight: bold;
            color: #1f2937;
            border-bottom: 1px solid #d1d5db;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
        }
        td {
            padding: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 0.8em;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Clínica Médica</h1>
        <p>Comprobante Oficial de Cita</p>
    </div>

    <div class="details-box">
        <div class="box-title">Detalles de la Cita #{{ $appointment->id }}</div>
        <table>
            <tr>
                <td width="30%"><strong>Fecha:</strong></td>
                <td>{{ $appointment->date->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td><strong>Hora de Inicio:</strong></td>
                <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Hora de Fin:</strong></td>
                <td>{{ \Carbon\Carbon::parse($appointment->end_time)->format('H:i') }}</td>
            </tr>
            <tr>
                <td><strong>Motivo:</strong></td>
                <td>{{ $appointment->reason ?? 'No especificado' }}</td>
            </tr>
        </table>
    </div>

    <div class="details-box">
        <div class="box-title">Información del Paciente</div>
        <table>
            <tr>
                <td width="30%"><strong>Paciente:</strong></td>
                <td>{{ optional($appointment->patient->user)->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Correo:</strong></td>
                <td>{{ optional($appointment->patient->user)->email ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <div class="details-box">
        <div class="box-title">Información del Doctor</div>
        <table>
            <tr>
                <td width="30%"><strong>Doctor:</strong></td>
                <td>Dr(a). {{ optional($appointment->doctor->user)->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Especialidad:</strong></td>
                <td>{{ optional($appointment->doctor->speciality)->name ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Este documento es un comprobante generado automáticamente.</p>
        <p>Generado el: {{ now()->format('d/m/Y H:i A') }}</p>
    </div>

</body>
</html>
