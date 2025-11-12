<?php

namespace App\Livewire\Admin\DataTables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            Column::make("Correo", "email")
                ->sortable()
                ->searchable(),
            Column::make("Fecha", "created_at")
                ->sortable()
                ->format(function ($value) {
                    return $value->format('d/m/Y H:i');
                }),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.users.actions',
                        ['user' => $row]);
                })
        ];
    }
}

