{{-- Lógica PHP para manejar errores y controlar la pestaña activa --}}
@php
    // Definimos que campos pertenecen a cada pestaña para detectar errores
    $errorGroups = [
        'informacion-profesional' => ['speciality_id', 'medical_license_number', 'biography'],
    ];

    // Pestaña por defecto
    $initialTab = 'datos-personales';

    // Si hay errores, buscamos en qué grupo están para abrir esa pestaña automáticamente
    foreach ($errorGroups as $tabName => $fields) {
        if ($errors->hasAny($fields)) {
            $initialTab = $tabName;
            break;
        }
    }
@endphp

<x-admin-layout title="Doctores | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Doctores',
        'href' => route('admin.doctors.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Encabezado con foto, nombre, licencia y botones de acción --}}
        <x-wire-card class="mb-8">
            <div class="lg:flex lg:justify-between lg:items-center">
                {{-- Lado izquierdo: avatar + nombre + licencia --}}
                <div class="flex items-center">
                    <img src="{{ $doctor->user->profile_photo_url }}"
                         alt="{{ $doctor->user->name }}"
                         class="h-20 w-20 rounded-full object-cover object-center">
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $doctor->user->name }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            Licencia: {{ $doctor->medical_license_number ?? 'N/A' }}
                        </p>
                    </div>
                </div>

                {{-- Lado derecho: botones --}}
                <div class="flex space-x-3 mt-6 lg:mt-0">
                    <x-wire-button outline gray href="{{ route('admin.doctors.index') }}">
                        Volver
                    </x-wire-button>
                    <x-wire-button type="submit">
                        <i class="fa-solid fa-check me-1"></i>
                        Guardar cambios
                    </x-wire-button>
                </div>
            </div>
        </x-wire-card>

        {{-- Tabs de navegación --}}
        <x-wire-card>
            <div x-data="{ tab: '{{ $initialTab }}' }">

                {{-- Menú de pestañas --}}
                <div class="border-b border-gray-200">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">

                        {{-- Tab 1: Datos personales (sin campos editables → nunca tiene errores) --}}
                        <li class="me-2">
                            <a href="#"
                               @click.prevent="tab = 'datos-personales'"
                               :class="{
                                   'text-blue-600 border-blue-600': tab === 'datos-personales',
                                   'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300': tab !== 'datos-personales'
                               }"
                               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors duration-200">
                                <i class="fa-solid fa-user me-2"></i>
                                Datos personales
                            </a>
                        </li>

                        {{-- Tab 2: Información profesional --}}
                        @php $hasErrorProfesional = $errors->hasAny($errorGroups['informacion-profesional']); @endphp
                        <li class="me-2">
                            <a href="#"
                               @click.prevent="tab = 'informacion-profesional'"
                               :class="{
                                   'text-red-600 border-red-600': {{ $hasErrorProfesional ? 'true' : 'false' }} &&
                                       tab !== 'informacion-profesional',
                                   'text-blue-600 border-blue-600 active': tab === 'informacion-profesional' &&
                                       !{{ $hasErrorProfesional ? 'true' : 'false' }},
                                   'text-red-600 border-red-600 active': tab === 'informacion-profesional' &&
                                       {{ $hasErrorProfesional ? 'true' : 'false' }},
                                   'border-transparent hover:text-blue-600 hover:border-gray-300': tab !== 'informacion-profesional' &&
                                       !{{ $hasErrorProfesional ? 'true' : 'false' }},
                               }"
                               class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group transition-colors duration-200
                               {{ $hasErrorProfesional ? 'text-red-600 border-red-600' : '' }}"
                               :aria-current="tab === 'informacion-profesional' ? 'page' : undefined">
                                <i class="fa-solid fa-stethoscope me-2"></i>
                                Información profesional
                                @if ($hasErrorProfesional)
                                    <i class="fa-solid fa-circle-exclamation ms-2 animate-pulse"></i>
                                @endif
                            </a>
                        </li>

                    </ul>
                </div>

                {{-- Contenido de los tabs --}}
                <div class="px-4 mt-4">

                    {{-- Contenido Tab 1: Datos personales (solo lectura) --}}
                    <div x-show="tab === 'datos-personales'">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg shadow-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                {{-- Lado izquierdo: información --}}
                                <div class="flex items-start">
                                    <i class="fa-solid fa-user-gear text-blue-500 text-xl mt-1 me-2"></i>
                                    <div class="ml-1">
                                        <p class="text-sm text-blue-700">
                                            La <strong>información de acceso</strong> (Nombre, email y contraseña)
                                            debe gestionarse desde la cuenta de usuario asociada.
                                        </p>
                                    </div>
                                </div>
                                {{-- Lado derecho: botón --}}
                                <div class="flex-shrink-0">
                                    <x-wire-button primary sm
                                                   href="{{ route('admin.users.edit', $doctor->user) }}"
                                                   target="_blank">
                                        Editar usuario
                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>
                                    </x-wire-button>
                                </div>
                            </div>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-500 font-semibold">Teléfono:</span>
                                <span class="text-gray-900 text-sm ml-1">{{ $doctor->user->phone }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500 font-semibold">Email:</span>
                                <span class="text-gray-900 text-sm ml-1">{{ $doctor->user->email }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500 font-semibold">Dirección:</span>
                                <span class="text-gray-900 text-sm ml-1">{{ $doctor->user->address }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Contenido Tab 2: Información profesional --}}
                    <div x-show="tab === 'informacion-profesional'">
                        <div class="space-y-6">

                            {{-- Especialidad --}}
                            <x-wire-native-select label="Especialidad" name="speciality_id">
                                <option value="">Seleccione una especialidad</option>
                                @foreach($specialities as $speciality)
                                    <option
                                        value="{{ $speciality->id }}"
                                        @selected(old('speciality_id', $doctor->speciality_id) == $speciality->id)>
                                        {{ $speciality->name }}
                                    </option>
                                @endforeach
                            </x-wire-native-select>

                            {{-- Número de licencia médica --}}
                            <x-wire-input
                                label="Cédula profesional (DGP)"
                                name="medical_license_number"
                                placeholder="Ej. 1234567  (6 a 8 dígitos numéricos)"
                                value="{{ old('medical_license_number', $doctor->medical_license_number) }}"
                            />

                            {{-- Biografía --}}
                            <x-wire-textarea
                                label="Biografía"
                                name="biography"
                                placeholder="Descripción profesional del doctor...">
                                {{ old('biography', $doctor->biography) }}
                            </x-wire-textarea>

                        </div>
                    </div>

                </div>
            </div>
        </x-wire-card>
    </form>

</x-admin-layout>
