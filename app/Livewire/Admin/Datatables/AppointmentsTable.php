<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class AppointmentsTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Appointment::query()
            ->with(['patient.user', 'doctor.user']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable(),
            Column::make('Paciente', 'patient.user.name')
                ->sortable(),
            Column::make('Doctor', 'doctor.user.name')
                ->sortable(),
            Column::make('Fecha', 'date')
                ->format(fn ($value) => $value?->format('d/m/Y'))
                ->sortable(),
            Column::make('Hora', 'start_time')
                ->format(fn ($value) => $value ? substr($value, 0, 5) : '')
                ->sortable(),
            Column::make('Hora fin', 'end_time')
                ->format(fn ($value) => $value ? substr($value, 0, 5) : '')
                ->sortable(),
            Column::make('Estado', 'status')
                ->label(fn ($row) => $this->statusLabel($row->status ?? 1)),
            Column::make('Acciones')
                ->html()
                ->label(function ($row) {
                    return view('admin.appointments.actions', ['appointment' => $row])->render();
                }),
        ];
    }

    private function statusLabel(?int $status): string
    {
        $status = $status ?? Appointment::STATUS_SCHEDULED;
        return match ($status) {
            Appointment::STATUS_SCHEDULED => 'Programado',
            Appointment::STATUS_COMPLETED => 'Completado',
            Appointment::STATUS_CANCELLED => 'Cancelado',
            default => 'Programado',
        };
    }
}
