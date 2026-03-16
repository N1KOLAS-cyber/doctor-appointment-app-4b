<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Speciality;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $searchDate = '';
    public $searchStartTime = '08:00';
    public $searchEndTime = '08:15';
    public $specialityId = '';
    public $selectedDoctorId = null;
    public $patientId = '';
    public $reason = '';

    public $availableDoctors = [];
    public $hasSearched = false;

    protected function rules()
    {
        $rules = [
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'reason' => 'required|string|max:65535',
        ];
        return $rules;
    }

    public function mount()
    {
        $this->searchDate = now()->format('Y-m-d');
    }

    public function searchAvailability()
    {
        $this->validate([
            'searchDate' => 'required|date|after_or_equal:today',
            'searchStartTime' => 'required|date_format:H:i',
            'searchEndTime' => 'required|date_format:H:i|after:searchStartTime',
        ], [
            'searchDate.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
            'searchEndTime.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
        ]);

        $query = Doctor::query()->with(['user', 'speciality']);

        if ($this->specialityId) {
            $query->where('speciality_id', $this->specialityId);
        }

        $this->availableDoctors = $query->orderBy('id')->get();
        $this->hasSearched = true;
    }

    public function selectDoctor($doctorId)
    {
        $this->selectedDoctorId = (int) $doctorId;
    }

    public function getSelectedDoctorProperty()
    {
        if (! $this->selectedDoctorId) {
            return null;
        }
        return Doctor::with('user', 'speciality')->find($this->selectedDoctorId);
    }

    public function confirmAppointment()
    {
        $this->validate([
            'patientId' => 'required|exists:patients,id',
            'selectedDoctorId' => 'required|exists:doctors,id',
            'searchDate' => 'required|date|after_or_equal:today',
            'searchStartTime' => 'required',
            'searchEndTime' => 'required',
            'reason' => 'required|string|max:65535',
        ], [
            'patientId.required' => 'Debe seleccionar un paciente.',
            'patientId.exists' => 'El paciente seleccionado no es válido.',
            'selectedDoctorId.required' => 'Debe buscar disponibilidad y seleccionar un doctor (clic en el horario del doctor).',
            'selectedDoctorId.exists' => 'El doctor seleccionado no es válido.',
            'reason.required' => 'El motivo de la cita es obligatorio.',
            'searchDate.after_or_equal' => 'La fecha debe ser hoy o una fecha futura.',
        ]);

        $startTime = strlen($this->searchStartTime) === 5 ? $this->searchStartTime : substr($this->searchStartTime, 0, 5);
        $endTime = strlen($this->searchEndTime) === 5 ? $this->searchEndTime : substr($this->searchEndTime, 0, 5);
        if ($endTime <= $startTime) {
            $this->addError('searchEndTime', 'La hora de fin debe ser posterior a la hora de inicio.');
            return;
        }

        $start = \Carbon\Carbon::createFromFormat('H:i', $startTime);
        $end = \Carbon\Carbon::createFromFormat('H:i', $endTime);
        $duration = (int) $start->diffInMinutes($end) ?: 15;

        Appointment::create([
            'patient_id' => (int) $this->patientId,
            'doctor_id' => $this->selectedDoctorId,
            'date' => $this->searchDate,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'duration' => $duration,
            'reason' => $this->reason,
            'status' => Appointment::STATUS_SCHEDULED,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Cita registrada',
            'text' => 'La cita se ha registrado correctamente.',
        ]);

        return redirect()->route('admin.appointments.index');
    }

    public function render()
    {
        return view('livewire.admin.create-appointment', [
            'patients' => Patient::with('user')->orderBy('id')->get(),
            'specialities' => Speciality::orderBy('name')->get(),
        ]);
    }
}
