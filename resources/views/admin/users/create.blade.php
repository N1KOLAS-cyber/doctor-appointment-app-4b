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
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-300 @enderror"
                       placeholder="Ej: Juan Pérez">
                @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-300 @enderror"
                       placeholder="Ej: juan@example.com">
                @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password"
                       name="password"
                       id="password"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('password') border-red-300 @enderror"
                       placeholder="Mínimo 8 caracteres">
                @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       placeholder="Repita la contraseña">
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.users.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Cancelar
            </a>
            <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fa-solid fa-floppy-disk"></i> Guardar Usuario
            </button>
        </div>
    </form>
</x-card>
</x-admin-layout>
