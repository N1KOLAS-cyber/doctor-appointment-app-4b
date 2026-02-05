<?php

namespace App\Livewire\Admin\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    //para personalizar
    // protected $model = User::class;

    //define el modelo y su consulta
    public function builder(): Builder
    {
        return User::query()
            ->with('roles');
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Número de id", "id_number")
                ->sortable(),
            Column::make("Teléfono", "phone")
                ->sortable(),
            Column::make("Rol", "roles")
                ->label(function ($row) {
                    $roles = [
                        1 => 'Paciente',
                        2 => 'Doctor',
                        3 => 'Recepcionista',
                        4 => 'Administrador',
                    ];
                    return $roles[$row->roles->first()?->id] ?? $row->roles->first()?->name ?? 'Sin Rol';
                }),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.users.actions',
                        ['user' => $row]);
                })
        ];
    }
}

