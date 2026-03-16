<x-admin-layout title="Horarios | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Horarios',
    ],
]">
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Gestor de horarios</h1>
        <button type="button" class="inline-flex items-center justify-center rounded-lg bg-purple-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-800">
            Guardar horario
        </button>
    </div>

    <x-wire-card>
        <p class="text-gray-600 dark:text-gray-400 mb-4">
            Doctor: {{ $doctor->user->name ?? 'N/A' }}. Seleccione las franjas de 15 minutos disponibles por día.
        </p>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-4 py-3">DÍA/HORA</th>
                        <th scope="col" class="px-4 py-3">LUNES</th>
                        <th scope="col" class="px-4 py-3">MARTES</th>
                        <th scope="col" class="px-4 py-3">MIÉRCOLES</th>
                        <th scope="col" class="px-4 py-3">JUEVES</th>
                        <th scope="col" class="px-4 py-3">VIERNES</th>
                        <th scope="col" class="px-4 py-3">SÁBADO</th>
                        <th scope="col" class="px-4 py-3">DOMINGO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'] as $hour)
                        {{-- Fila "Todos" para la hora --}}
                        <tr class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                            <td class="px-4 py-2 font-medium text-gray-900 dark:text-white">{{ $hour }}:00</td>
                            @foreach(['LUNES', 'MARTES', 'MIÉRCOLES', 'JUEVES', 'VIERNES', 'SÁBADO', 'DOMINGO'] as $day)
                                <td class="px-4 py-2">
                                    <label class="inline-flex items-center gap-1">
                                        <input type="checkbox" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700" disabled>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">Todos</span>
                                    </label>
                                </td>
                            @endforeach
                        </tr>
                        @foreach([['00','15'], ['15','30'], ['30','45'], ['45','00']] as $slot)
                            @php
                                $start = $slot[0];
                                $end = $slot[1];
                                $endH = $end === '00' ? sprintf('%02d', (int)$hour + 1) : $hour;
                                $endM = $end === '00' ? '00' : $end;
                            @endphp
                            <tr class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                                <td class="px-4 py-1.5 text-gray-600 dark:text-gray-400 text-xs">{{ $hour }}:{{ $start }} - {{ $endH }}:{{ $endM }}</td>
                                @for ($d = 0; $d < 7; $d++)
                                    <td class="px-4 py-1.5">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-700" disabled>
                                        </label>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-wire-card>
</x-admin-layout>
