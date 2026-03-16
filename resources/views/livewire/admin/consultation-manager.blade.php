@php
    $patient = $this->appointment->patient;
    $patient->load('bloodType');
    $errorGroups = [
        'consulta' => ['diagnosis', 'treatment', 'notes'],
        'receta' => [],
    ];
    $initialTab = 'consulta';
    foreach ($this->medications as $i => $m) {
        $bag = $this->getErrorBag();
        if ($bag->first('medications.'.$i.'.medication') || $bag->first('medications.'.$i.'.dose') || $bag->first('medications.'.$i.'.frequency_duration')) {
            $initialTab = 'receta';
            break;
        }
    }
@endphp

<div>
    {{-- Encabezado: paciente y botones --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Consulta</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-1">{{ $patient->user->name ?? 'N/A' }}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">DNI: {{ $patient->user->id_number ?? 'N/A' }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button" wire:click="$set('showHistoryModal', true)"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-purple-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700">
                <i class="fa-solid fa-file-medical"></i>
                Ver Historia
            </button>
            <button type="button" wire:click="openPreviousConsultationsModal"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-purple-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700">
                <i class="fa-solid fa-history"></i>
                Consultas Anteriores
            </button>
        </div>
    </div>

    {{-- Tabs: Consulta y Receta --}}
    <x-wire-card>
        <div x-data="{ tab: '{{ $initialTab }}' }">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                    <li class="me-2">
                        <a href="#" @click.prevent="tab = 'consulta'"
                           :class="tab === 'consulta' ? 'text-blue-600 border-blue-600' : 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300'"
                           class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg">
                            <i class="fa-solid fa-stethoscope me-2"></i>
                            Consulta
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#" @click.prevent="tab = 'receta'"
                           :class="tab === 'receta' ? 'text-blue-600 border-blue-600' : 'text-gray-500 border-transparent hover:text-gray-600 hover:border-gray-300'"
                           class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg">
                            <i class="fa-solid fa-pills me-2"></i>
                            Receta
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-0 mt-4">
                {{-- Pestaña Consulta --}}
                <div x-show="tab === 'consulta'" x-cloak>
                    <div class="space-y-4">
                        <div>
                            <label for="diagnosis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Diagnóstico</label>
                            <textarea id="diagnosis" wire:model="diagnosis" rows="4"
                                      placeholder="Describa el diagnóstico del paciente aquí..."
                                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('diagnosis') border-red-500 @enderror"></textarea>
                            @error('diagnosis')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="treatment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tratamiento</label>
                            <textarea id="treatment" wire:model="treatment" rows="4"
                                      placeholder="Describa el tratamiento recomendado aquí..."
                                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white @error('treatment') border-red-500 @enderror"></textarea>
                            @error('treatment')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Notas</label>
                            <textarea id="notes" wire:model="notes" rows="3"
                                      placeholder="Agregue notas adicionales sobre la consulta..."
                                      class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"></textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Pestaña Receta --}}
                <div x-show="tab === 'receta'" x-cloak>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Medicamento</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Dosis</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Frecuencia / Duración</th>
                                    <th class="px-4 py-2 w-12"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($this->medications as $index => $med)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="px-4 py-2">
                                            <input type="text" wire:model="medications.{{ $index }}.medication" placeholder="Ej: Amoxicilina 500mg"
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm @error('medications.'.$index.'.medication') border-red-500 @enderror">
                                            @error('medications.'.$index.'.medication')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" wire:model="medications.{{ $index }}.dose" placeholder="Ej: 1 cada 8 horas"
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm @error('medications.'.$index.'.dose') border-red-500 @enderror">
                                            @error('medications.'.$index.'.dose')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <input type="text" wire:model="medications.{{ $index }}.frequency_duration" placeholder="Ej: cada 8 horas por 7 días"
                                                   class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-gray-900 focus:border-purple-500 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm @error('medications.'.$index.'.frequency_duration') border-red-500 @enderror">
                                            @error('medications.'.$index.'.frequency_duration')
                                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                            @enderror
                                        </td>
                                        <td class="px-4 py-2">
                                            <button type="button" wire:click="removeMedication({{ $index }})"
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" wire:click="addMedication"
                            class="mt-4 inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700">
                        <i class="fa-solid fa-plus"></i>
                        Añadir Medicamento
                    </button>
                </div>
            </div>
        </div>
    </x-wire-card>

    <div class="mt-6 flex justify-end">
        <button type="button" wire:click="saveConsultation"
                class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
            <i class="fa-solid fa-save"></i>
            Guardar Consulta
        </button>
    </div>

    {{-- Modal Ver Historia (Historia médica del paciente) --}}
    @if($showHistoryModal ?? false)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="fixed inset-0 bg-gray-500/75 dark:bg-gray-900/80" wire:click="$set('showHistoryModal', false)"></div>
                <div class="relative z-10 w-full max-w-lg rounded-lg bg-white dark:bg-gray-800 shadow-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Historia médica del paciente</h3>
                        <button type="button" wire:click="$set('showHistoryModal', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <i class="fa-solid fa-times text-xl"></i>
                        </button>
                    </div>
                    <dl class="space-y-2 text-sm">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tipo de sangre:</dt>
                            <dd class="text-gray-900 dark:text-white">{{ $patient->bloodType->name ?? 'No registrado' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Alergias:</dt>
                            <dd class="text-gray-900 dark:text-white">{{ $patient->allergies ?: 'No registradas' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Enfermedades crónicas:</dt>
                            <dd class="text-gray-900 dark:text-white">{{ $patient->chronic_conditions ?: 'No registradas' }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Antecedentes quirúrgicos:</dt>
                            <dd class="text-gray-900 dark:text-white">{{ $patient->surgical_history ?: 'No registrados' }}</dd>
                        </div>
                    </dl>
                    <div class="mt-4">
                        <a href="{{ route('admin.patients.edit', $patient) }}#antecedentes"
                           class="text-blue-600 hover:underline dark:text-blue-400">Ver / Editar Historia Médica</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal Consultas Anteriores --}}
    @if($showPreviousConsultationsModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-modal="true">
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="fixed inset-0 bg-gray-500/75 dark:bg-gray-900/80" wire:click="closePreviousConsultationsModal"></div>
                <div class="relative z-10 w-full max-w-2xl max-h-[90vh] overflow-hidden flex flex-col rounded-lg bg-white dark:bg-gray-800 shadow-xl">
                    <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Consultas Anteriores</h3>
                        <button type="button" wire:click="closePreviousConsultationsModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <i class="fa-solid fa-times text-xl"></i>
                        </button>
                    </div>
                    <div class="p-6 overflow-y-auto flex-1 space-y-4">
                        @forelse($this->previousConsultations as $consultation)
                            @php
                                $apt = $consultation->appointment;
                                $doctor = $apt->doctor->user->name ?? 'N/A';
                                $date = $consultation->created_at->format('d/m/Y');
                                $time = $consultation->created_at->format('H:i');
                            @endphp
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                    <i class="fa-solid fa-calendar me-1"></i>
                                    {{ $date }} a las {{ $time }}
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">Atendido por: Dr(a). {{ $doctor }}</p>
                                <p class="text-sm"><span class="font-medium text-gray-700 dark:text-gray-300">Diagnóstico:</span> {{ Str::limit($consultation->diagnosis, 80) }}</p>
                                <p class="text-sm mt-1"><span class="font-medium text-gray-700 dark:text-gray-300">Tratamiento:</span> {{ Str::limit($consultation->treatment, 80) }}</p>
                                @if($consultation->notes)
                                    <p class="text-sm mt-1"><span class="font-medium text-gray-700 dark:text-gray-300">Notas:</span> {{ Str::limit($consultation->notes, 60) }}</p>
                                @endif
                                <div class="mt-2">
                                    <a href="{{ route('admin.appointments.consultation', $apt) }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Consultar Detalle</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400">No hay consultas anteriores para este paciente.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
