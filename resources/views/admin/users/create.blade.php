<x-admin-layout title="Usuarios | Meditime"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.users.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
]">
<x-card>
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Crear Nuevo Usuario</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Complete el formulario para crear un nuevo usuario en el
            sistema.</p>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST" class="px-4 py-5 sm:p-6">
        @csrf
        <div class="space-y-6">
            <x-wire-input name="name" label="Nombre" required :value="old('name')" placeholder="Ej: Juan Pérez" autocomplete="name"/>

            <x-wire-input name="email" label="Correo Electrónico" type="email" required :value="old('email')" placeholder="Ej: juan@example.com" autocomplete="email"/>

            <x-wire-input name="password" label="Contraseña" type="password" required placeholder="Mínimo 8 caracteres"/>

            <x-wire-input name="password_confirmation" label="Confirmar Contraseña" type="password" required placeholder="Repita la contraseña"/>

            <x-wire-input name="id_number" label="Número de ID" :value="old('id_number')" placeholder="Ej: 123456789"/>

            <x-wire-input name="phone" label="Teléfono" :value="old('phone')" placeholder="Ej: 123456789"/>

            <x-wire-input name="address" label="Dirección" :value="old('address')" placeholder="Ej: Calle 123"/>

            <div>
                <label for="role_id" class="block text-sm font-medium text-gray-700">Rol</label>
                <select id="role_id" name="role_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="">Seleccione un rol</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.users.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancelar
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Guardar Usuario
            </button>
        </div>
    </form>
</x-card>
</x-admin-layout>
