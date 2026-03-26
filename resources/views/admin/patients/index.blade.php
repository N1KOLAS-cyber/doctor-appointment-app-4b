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
        <a href="{{ route('patients.import.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
            <i class="fa-solid fa-file-import mr-2"></i> Importar Masivo
        </a>
    </x-slot:action>

    @livewire('admin.datatables.patient-table')
</x-admin-layout>
