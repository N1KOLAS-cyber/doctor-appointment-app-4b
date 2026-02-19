<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DoctorsTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Doctor::query()
            ->with(['user', 'speciality']);
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
            Column::make('Nombre', 'user.name')
                ->sortable(),
            Column::make('Email', 'user.email')
                ->sortable(),
            Column::make('Especialidad', 'speciality.name')
                ->sortable(),
            Column::make('Licencia', 'medical_license_number')
                ->sortable(),
            Column::make('Acciones')
                ->label(function ($row) {
                    return view('admin.doctors.actions', ['doctor' => $row]);
                }),
        ];
    }
}
