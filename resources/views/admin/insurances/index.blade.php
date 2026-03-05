<x-admin-layout title="Aseguradoras | Meditime"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Aseguradoras'
    ],
]">
<x-slot name="action">
    <a href="{{ route('admin.insurances.create') }}"
       class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nueva Aseguradora
    </a>
</x-slot>

<x-card>
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Aseguradoras</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Listado de todas las aseguradoras registradas en el sistema.</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nombre de la Empresa</th>
                    <th scope="col" class="px-6 py-3">Teléfono de Contacto</th>
                    <th scope="col" class="px-6 py-3">Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @forelse($insurances as $insurance)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $insurance->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $insurance->nombre_empresa }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $insurance->telefono_contacto }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $insurance->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No hay aseguradoras registradas
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-card>
</x-admin-layout>
