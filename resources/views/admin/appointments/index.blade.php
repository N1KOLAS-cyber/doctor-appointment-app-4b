<x-admin-layout title="Citas | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Citas',
    ],
]">
    <x-slot name="action">
        <x-button color="blue" href="{{ route('admin.appointments.create') }}">
            <i class="fa-solid fa-plus mr-1"></i> Nuevo
        </x-button>
    </x-slot>
    @livewire('admin.datatables.appointments-table')
</x-admin-layout>
