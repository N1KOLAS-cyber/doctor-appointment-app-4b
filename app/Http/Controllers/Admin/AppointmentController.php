<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration' => 'nullable|integer|min:1|max:480',
            'reason' => 'required|string|max:65535',
            'status' => 'nullable|integer|in:1,2,3',
        ], [
            'date.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
            'end_time.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
            'reason.required' => 'El motivo de la cita es obligatorio.',
        ]);

        $data['duration'] = $data['duration'] ?? 15;
        $data['status'] = $data['status'] ?? Appointment::STATUS_SCHEDULED;

        Appointment::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Cita registrada',
            'text' => 'La cita se ha registrado correctamente.',
        ]);

        return redirect()->route('admin.appointments.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $patients = Patient::with('user')->orderBy('id')->get();
        $doctors = Doctor::with('user', 'speciality')->orderBy('id')->get();
        return view('admin.appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'duration' => 'nullable|integer|min:1|max:480',
            'reason' => 'required|string|max:65535',
            'status' => 'nullable|integer|in:1,2,3',
        ], [
            'date.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
            'end_time.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
            'reason.required' => 'El motivo de la cita es obligatorio.',
        ]);

        $data['duration'] = $data['duration'] ?? $appointment->duration;
        $appointment->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Cita actualizada',
            'text' => 'La cita se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.appointments.index');
    }
}
