<x-admin-layout title="Nueva Aseguradora | Meditime"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Aseguradoras',
        'href' => route('admin.insurances.index'),
    ],
    [
        'name' => 'Nueva Aseguradora',
    ]
]">
<x-card>
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Registrar Aseguradora</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Complete el formulario para agregar una nueva aseguradora al directorio del sistema.</p>
    </div>

    <form action="{{ route('admin.insurances.store') }}" method="POST" class="px-4 py-5 sm:p-6">
        @csrf

        <div class="space-y-6">
            {{-- Nombre de la empresa --}}
            <div>
                <x-label for="nombre_empresa" value="Nombre de la Empresa *" />
                <x-input 
                    id="nombre_empresa" 
                    name="nombre_empresa" 
                    type="text" 
                    class="mt-1 block w-full" 
                    :value="old('nombre_empresa')"
                    placeholder="Ej: Seguros La Protectora S.A."
                    required 
                />
                @error('nombre_empresa')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Teléfono de contacto --}}
            <div>
                <x-label for="telefono_contacto" value="Teléfono de Contacto *" />
                <x-input 
                    id="telefono_contacto" 
                    name="telefono_contacto" 
                    type="text" 
                    class="mt-1 block w-full" 
                    :value="old('telefono_contacto')"
                    placeholder="Ej: +506 2222-3333"
                    required 
                />
                @error('telefono_contacto')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Descripción / Notas adicionales --}}
            <div>
                <x-label for="notas_adicionales" value="Descripción Detallada / Notas Adicionales" />
                <textarea 
                    id="notas_adicionales" 
                    name="notas_adicionales" 
                    rows="6"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Información adicional sobre la aseguradora: cobertura, contactos alternativos, horarios de atención, etc."
                >{{ old('notas_adicionales') }}</textarea>
                @error('notas_adicionales')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Botones de acción --}}
        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.insurances.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancelar
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Guardar Aseguradora
            </button>
        </div>
    </form>
</x-card>
</x-admin-layout>
