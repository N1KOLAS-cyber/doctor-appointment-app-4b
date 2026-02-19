<x-admin-layout title="Doctores | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Doctores'
    ],
]">
    @livewire('admin.datatables.doctors-table')
</x-admin-layout>
