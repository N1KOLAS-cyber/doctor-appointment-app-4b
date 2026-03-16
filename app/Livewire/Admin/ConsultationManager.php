<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\ConsultationMedication;
use Livewire\Component;

class ConsultationManager extends Component
{
    public Appointment $appointment;

    public $diagnosis = '';
    public $treatment = '';
    public $notes = '';

    /** @var array<int, array{medication: string, dose: string, frequency_duration: string}> */
    public $medications = [];

    public $showPreviousConsultationsModal = false;
    public $showHistoryModal = false;

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment->load(['patient.user', 'doctor.user']);
        $consultation = $appointment->consultation;
        if ($consultation) {
            $this->diagnosis = $consultation->diagnosis;
            $this->treatment = $consultation->treatment;
            $this->notes = $consultation->notes ?? '';
            $this->medications = $consultation->medications->map(fn ($m) => [
                'medication' => $m->medication,
                'dose' => $m->dose,
                'frequency_duration' => $m->frequency_duration,
            ])->toArray();
        } else {
            $this->medications = [['medication' => '', 'dose' => '', 'frequency_duration' => '']];
        }
    }

    public function addMedication()
    {
        $this->medications[] = ['medication' => '', 'dose' => '', 'frequency_duration' => ''];
    }

    public function removeMedication(int $index)
    {
        array_splice($this->medications, $index, 1);
        if (empty($this->medications)) {
            $this->medications = [['medication' => '', 'dose' => '', 'frequency_duration' => '']];
        }
    }

    public function saveConsultation()
    {
        $this->validate([
            'diagnosis' => 'required|string|max:65535',
            'treatment' => 'required|string|max:65535',
            'notes' => 'nullable|string|max:65535',
        ], [
            'diagnosis.required' => 'El diagnóstico es obligatorio.',
            'treatment.required' => 'El tratamiento es obligatorio.',
        ]);

        $validMedications = [];
        foreach ($this->medications as $i => $m) {
            $med = trim($m['medication'] ?? '');
            $dose = trim($m['dose'] ?? '');
            $freq = trim($m['frequency_duration'] ?? '');
            if ($med !== '' || $dose !== '' || $freq !== '') {
                if ($med === '') {
                    $this->addError("medications.{$i}.medication", 'El nombre del medicamento es obligatorio.');
                    return;
                }
                if ($dose === '') {
                    $this->addError("medications.{$i}.dose", 'La dosis es obligatoria.');
                    return;
                }
                if ($freq === '') {
                    $this->addError("medications.{$i}.frequency_duration", 'La frecuencia/duración es obligatoria.');
                    return;
                }
                $validMedications[] = ['medication' => $med, 'dose' => $dose, 'frequency_duration' => $freq];
            }
        }

        $consultation = $this->appointment->consultation ?? new Consultation(['appointment_id' => $this->appointment->id]);
        $consultation->diagnosis = $this->diagnosis;
        $consultation->treatment = $this->treatment;
        $consultation->notes = $this->notes ?: null;
        $consultation->save();

        $consultation->medications()->delete();
        foreach ($validMedications as $m) {
            $consultation->medications()->create([
                'medication' => $m['medication'],
                'dose' => $m['dose'],
                'frequency_duration' => $m['frequency_duration'],
            ]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Consulta guardada',
            'text' => 'La consulta se ha guardado correctamente.',
        ]);

        return $this->redirect(route('admin.appointments.consultation', $this->appointment), navigate: true);
    }

    public function getPreviousConsultationsProperty()
    {
        return Consultation::query()
            ->whereHas('appointment', fn ($q) => $q->where('patient_id', $this->appointment->patient_id))
            ->with(['appointment.doctor.user'])
            ->orderByDesc('created_at')
            ->get();
    }

    public function openPreviousConsultationsModal()
    {
        $this->showPreviousConsultationsModal = true;
    }

    public function closePreviousConsultationsModal()
    {
        $this->showPreviousConsultationsModal = false;
    }

    public function render()
    {
        return view('livewire.admin.consultation-manager');
    }
}
