{{--lagica php para manejar errorees y controlar la penstaña activa--}}
@php
    //definimos que campos pertenecen a cada pestaña para dectetar errores
    $errorGroups =[
        'antecedentes'=>['allergies', 'chronic_conditions', 'surgical_history', 'family_history'],
        'informacion-general' => ['blood_type_id', 'observations'],
        'contacto-emergencia' => ['emergency_contact_name', 'emergency_contact_phone', 'emergency_contact_relationship']
];
    //pestaña por defecto
$initialTab = 'datos-personales';

//si hay errores , buscamos en que grupo estan para abrir esa pestaña automaticamente
foreach ($errorGroups as $tabName => $fields){
    if ($errors->hasAny($fields)){
        $initialTab = $tabName;
        break; //salimos del bucle
    }
}

@endphp
<x-admin-layout title="Roles | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pacientes',
        'href' => route('admin.patients.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">

    <form action="{{route('admin.patients.update', $patient )}}" method="POST">
        @csrf
        @method('PUT')

        <x-wire-card class="mb-8">
            {{--encabezado con foto y acciones --}}
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                <div class="flex items-center">
                    <img src="{{$patient->user->profile_photo_url }}" alt="{{$patient->user->name }}"
                         class="h-20 w-20 rounded-full object-cover object-center">
                    <div>
                        <p class="text-2xl font-bold text-gray-900 ml-4">{{ $patient->user->name }}</p>
                    </div>
                </div>
                <div class="flex space-x-3 mt-6 lg:mt-0 sm:justify-end">
                    <x-wire-button outline gray href="{{route('admin.patients.index')}}">Volver</x-wire-button>
                    <x-wire-button type="submit">
                        <i class="fa-solid fa-check"></i>
                        Guardar cambios
                    </x-wire-button>
                </div>
            </div>
        </x-wire-card>
        {{--tabs de navegacion--}}
        <x-wire-card>
            <x-tabs :active="$initialTab">
                <x-slot name="header">
                    {{--tab 1 datos personales--}}
                    <x-tab-link tab="datos-personales">
                        <i class="fa-solid fa-user me-2"></i>
                        Datos personales
                    </x-tab-link>

                    {{--tab 2 antecedentes--}}
                    @php $hasError = $errors->hasAny($errorGroups['antecedentes']); @endphp
                    <x-tab-link tab="antecedentes" :error="$hasError">
                        <i class="fa-solid fa-file-medical me-2"></i>
                        Antecedentes
                    </x-tab-link>

                    {{--tab 3 información general--}}
                    @php $hasError = $errors->hasAny($errorGroups['informacion-general']); @endphp
                    <x-tab-link tab="informacion-general" :error="$hasError">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Información general
                    </x-tab-link>

                    {{--tab 4 contacto de emergencia--}}
                    @php $hasError = $errors->hasAny($errorGroups['contacto-emergencia']); @endphp
                    <x-tab-link tab="contacto-emergencia" :error="$hasError">
                        <i class="fa-solid fa-heart me-2"></i>
                        Contacto de emergencia
                    </x-tab-link>
                </x-slot>

                {{--contenido de los tabs--}}
                <x-tab-content tab="datos-personales">
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg shadow-sm">
                        <xxdiv class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            {{--lado izquierdo la informacion--}}
                            <div class="flex items-start">
                                <div class="flex-shrink-0"></div>
                                <i class="fa-solid fa-user-gear text-blue-500 text-xl mt-1 me-2"></i>
                                <div class="ml-3">
                                    <h3 class="text-sm font-bold text-blue-800"></h3>
                                    Edición de cuenta de usuario
                                    <div class="mt-1 text-sm text-blue-600">
                                        <p class="text-blue-700">
                                            La <strong> información de acceso </strong> (Nombre, email y
                                            contraseña)
                                            debe de gestionarse desde la cuenta de usuario asociada.</p>
                                    </div>
                                </div>
                            </div>

                            {{--lado derecho boton de accion--}}
                            <div class="flex-shrink-0">
                                <x-wire-button primary sm
                                               href="{{ route('admin.users.edit', $patient->user) }}"
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
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->phone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold">Email:</span>
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->email }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold">Dirección:</span>
                            <span class="text-gray-900 text-sm ml-1">{{ $patient->user->address }}</span>
                        </div>
                    </div>
                </x-tab-content>

                {{--contenido de tab 2 antecedentes--}}
                <x-tab-content tab="antecedentes">
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-wire-textarea label="Alergias conocidas" name="allergies">
                                {{ old('allergies', $patient->allergies) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea label="Enfermedades crónicas" name="chronic_conditions">
                                {{ old('chronic_conditions', $patient->chronic_conditions) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea label="Antecedentes quirúrgicos" name="surgical_history">
                                {{ old('surgical_history', $patient->surgical_history) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea label="Antecedentes familiares" name="family_history">
                                {{ old('family_history', $patient->family_history) }}
                            </x-wire-textarea>
                        </div>
                    </div>
                </x-tab-content>
                {{--contenido de tab 3 información general--}}
                <x-tab-content tab="informacion-general">
                    <x-wire-native-select label="Tipo de sangre" class="mb-4" name="blood_type_id">
                        <option value="">Seleccione un tipo de sangre</option>
                        @foreach($bloodTypes as $bloodType)
                            <option
                                value="{{ $bloodType->id }}" @selected(old('blood_type_id', $patient->blood_type_id) == $bloodType->id)>
                                {{ $bloodType->name }}
                            </option>
                        @endforeach
                    </x-wire-native-select>
                    <x-wire-textarea label="Observaciones" name="observations">
                        {{old('observations', $patient->observations )}}
                    </x-wire-textarea>
                </x-tab-content>
                {{--contenido de tab 3 contacto de emergencia--}}
                <x-tab-content tab="contacto-emergencia">
                    <div class="space-y-4">
                        <x-wire-input label="Nombre de contacto " name="emergency_contact_name"
                                      value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}"/>
                        <x-wire-phone label="Teléfono de contacto" name="emergency_contact_phone"
                                      mask="(###) ###-####" placeholder="(999) 999-9999"
                                      value="{{ old('emergency_contact_phone', $patient->emergency_contact_phone) }}"/>
                        <x-wire-input label="Relación con el contacto   " name="emergency_contact_relationship"
                                      placeholder="Familiar,amigo, etc."
                                      value="{{ old('emergency_contact_relationship', $patient->emergency_contact_relationship) }}"/>


                    </div>
                </x-tab-content>
            </x-tabs>
        </x-wire-card>
    </form>
</x-admin-layout>
