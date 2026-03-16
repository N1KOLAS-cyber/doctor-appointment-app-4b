<div class="space-y-6">
    {{-- Errores de validación al confirmar --}}
    @if ($errors->any())
        <div class="rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
            <p class="text-sm font-medium text-red-800 dark:text-red-200 mb-2">Complete los siguientes pasos para guardar la cita:</p>
            <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Buscar disponibilidad --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Buscar disponibilidad</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Encuentra el horario perfecto para tu cita.</p>
        <div class="flex flex-wrap items-end gap-4">
            <div class="min-w-[140px]">
                <label for="searchDate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha</label>
                <input type="date" id="searchDate" wire:model="searchDate"
                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                @error('searchDate')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="min-w-[160px]">
                <label for="searchStartTime" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hora inicio</label>
                <input type="time" id="searchStartTime" wire:model="searchStartTime"
                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                @error('searchStartTime')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="min-w-[160px]">
                <label for="searchEndTime" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hora fin</label>
                <input type="time" id="searchEndTime" wire:model="searchEndTime"
                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                @error('searchEndTime')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="min-w-[180px]">
                <label for="specialityId" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Especialidad (opcional)</label>
                <select id="specialityId" wire:model="specialityId"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    <option value="">Todas</option>
                    @foreach($specialities as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <p class="mt-3 text-sm text-gray-600 dark:text-gray-400">Haz clic en el botón para ver los doctores disponibles según la fecha y horario que elegiste.</p>
        <div class="mt-3">
            <button type="button" wire:click="searchAvailability"
                    class="inline-flex items-center justify-center gap-2 rounded-lg px-5 py-3 text-sm font-semibold text-white shadow-md hover:opacity-90 focus:ring-4 focus:ring-purple-300"
                    style="color: #ffffff !important; background-color: #9333ea !important;">
                <i class="fa-solid fa-search" aria-hidden="true"></i>
                <span>Buscar disponibilidad</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Doctores disponibles --}}
        <div class="lg:col-span-2 space-y-4">
            @if($hasSearched)
                @if(count($availableDoctors) > 0)
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Doctores disponibles</p>
                    <div class="grid sm:grid-cols-2 gap-4">
                        @foreach($availableDoctors as $doctor)
                            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300 text-sm font-semibold">
                                        {{ strtoupper(substr($doctor->user->name ?? 'D', 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-white">Dr. {{ $doctor->user->name ?? 'N/A' }}</p>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $doctor->speciality->name ?? 'Sin especialidad' }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end">
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Horarios disponibles:</p>
                                    <button type="button"
                                            wire:click="selectDoctor({{ $doctor->id }})"
                                            class="rounded-lg px-4 py-2 text-sm font-semibold text-white shadow {{ $selectedDoctorId === $doctor->id ? 'ring-2 ring-purple-400 ring-offset-2' : '' }}"
                                            style="color: #ffffff !important; background-color: #9333ea !important;">
                                        <span>{{ strlen($searchStartTime ?? '') === 5 ? ($searchStartTime ?? '08:00') . ':00' : ($searchStartTime ?? '08:00:00') }}</span>
                                        <span class="ml-1">— Elegir</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400">No hay doctores disponibles con los criterios seleccionados.</p>
                @endif
            @endif
        </div>

        {{-- Resumen y confirmación --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Resumen de la cita</h3>
                @if($this->selectedDoctor)
                    <dl class="space-y-2 text-sm mb-4">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Doctor</dt>
                            <dd class="font-medium text-gray-900 dark:text-white">Dr. {{ $this->selectedDoctor->user->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Fecha</dt>
                            <dd class="font-medium text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($searchDate)->format('Y-m-d') }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Horario</dt>
                            <dd class="font-medium text-gray-900 dark:text-white">{{ $searchStartTime }} - {{ $searchEndTime }}</dd>
                        </div>
                        @php
                            $start = \Carbon\Carbon::createFromFormat('H:i', $searchStartTime);
                            $end = \Carbon\Carbon::createFromFormat('H:i', $searchEndTime);
                            $mins = $start->diffInMinutes($end) ?: 15;
                        @endphp
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Duración</dt>
                            <dd class="font-medium text-gray-900 dark:text-white">{{ $mins }} minutos</dd>
                        </div>
                    </dl>
                @else
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">Busca disponibilidad y selecciona un doctor.</p>
                @endif

                <div class="space-y-4">
                    <div>
                        <label for="patientId" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Paciente</label>
                        <select id="patientId" wire:model="patientId"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">Seleccione un paciente</option>
                            @foreach($patients as $p)
                                <option value="{{ $p->id }}">{{ $p->user->name ?? 'N/A' }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Motivo de la cita</label>
                        <textarea id="reason" wire:model="reason" rows="3" placeholder="Ej: Chequeo de medicamentos"
                                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"></textarea>
                        @error('reason')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Para guardar la cita, selecciona un doctor en la lista (clic en el horario) y luego haz clic en el botón de abajo.
                    </p>
                    <button type="button" wire:click="confirmAppointment" wire:loading.attr="disabled"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-purple-600 px-4 py-3 text-sm font-semibold text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 shadow-md disabled:opacity-70" style="color: #fff !important; background-color: #9333ea !important;">
                        <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                        <span>Confirmar y guardar cita</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
