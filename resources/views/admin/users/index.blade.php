<x-admin-layout title="Usuarios | Meditime"
                :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
    ]
]">
    {{-- 🔹 Botón principal --}}
    <x-slot name="action">
        <x-button color="blue" href="{{ route('admin.users.create') }}">
            <i class="fa-solid fa-plus mr-1"></i> Nuevo Usuario
        </x-button>
    </x-slot>
    {{-- Tabla de usuarios --}}
    <div class="py-8">
        @livewire('admin.datatables.user-table')
    </div>
</x-admin-layout>
