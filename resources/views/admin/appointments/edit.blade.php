<x-admin-layout title="Editar cita | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Citas',
        'href' => route('admin.appointments.index'),
    ],
    [
        'name' => 'Editar',
    ],
]">
    <form action="{{ route('admin.appointments.update', $appointment) }}" method="POST">
        @csrf
        @method('PUT')
        <x-wire-card class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="patient_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Paciente</label>
                    <select name="patient_id" id="patient_id" required
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}" @selected(old('patient_id', $appointment->patient_id) == $p->id)>
                                {{ $p->user->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Doctor</label>
                    <select name="doctor_id" id="doctor_id" required
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @foreach($doctors as $d)
                            <option value="{{ $d->id }}" @selected(old('doctor_id', $appointment->doctor_id) == $d->id)>
                                Dr. {{ $d->user->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $appointment->date->format('Y-m-d')) }}" required
                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hora inicio</label>
                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', substr($appointment->start_time, 0, 5)) }}" required
                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('start_time')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hora fin</label>
                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', substr($appointment->end_time, 0, 5)) }}" required
                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    @error('end_time')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                    <select name="status" id="status"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        <option value="1" @selected(old('status', $appointment->status) == 1)>Programado</option>
                        <option value="2" @selected(old('status', $appointment->status) == 2)>Completado</option>
                        <option value="3" @selected(old('status', $appointment->status) == 3)>Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Motivo de la cita</label>
                <textarea name="reason" id="reason" rows="3" required
                          class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('reason', $appointment->reason) }}</textarea>
                @error('reason')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-6 flex justify-end gap-2">
                <x-wire-button outline gray href="{{ route('admin.appointments.index') }}">Volver</x-wire-button>
                <x-wire-button type="submit">
                    <i class="fa-solid fa-check me-1"></i>
                    Guardar cambios
                </x-wire-button>
            </div>
        </x-wire-card>
    </form>
</x-admin-layout>
