<x-admin-layout title="Pacientes | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pacientes'
    ],
]">

    <x-slot:action>
        <x-button href="{{ route('admin.patients.import.create') }}" color="blue" class="mb-2">
            <i class="fa-solid fa-file-import mr-2"></i> Importar Masivo
        </x-button>
    </x-slot:action>

    @livewire('admin.datatables.patient-table')
</x-admin-layout>
