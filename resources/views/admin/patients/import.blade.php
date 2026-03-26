<x-admin-layout title="Importar Pacientes | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pacientes',
        'href' => route('admin.patients.index')
    ],
    [
        'name' => 'Importar'
    ],
]">
    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Carga Masiva de Pacientes</h2>

        <div class="mb-8 p-4 bg-blue-50 border-l-4 border-blue-500 text-blue-800 rounded-r-lg">
            <p class="font-bold flex items-center">
                <i class="fa-solid fa-circle-info mr-2"></i> Información Importante
            </p>
            <p class="mt-2 text-sm">
                Sube un archivo en formato Excel o CSV. Debido a que el archivo puede ser extremadamente grande, el proceso se ejecutará automáticamente mediante <strong>Colas (Background Jobs)</strong>. No interrumpirá tu sistema y recibirás a los pacientes gradualmente a medida que se procesen.
            </p>
        </div>
        
        <form action="{{ route('admin.patients.import.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <div class="flex items-center justify-center w-full">
                    <label for="file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-300 ease-in-out group">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fa-solid fa-cloud-arrow-up text-5xl text-gray-400 mb-4 group-hover:text-blue-500 transition-colors duration-300"></i>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Haz clic para buscar archivo</span> o arrástralo y suéltalo aquí</p>
                            <p class="text-xs text-gray-400">Archivos permitidos: .CSV o .XLSX (Límite sugerido 10MB)</p>
                        </div>
                        <input id="file" name="file" type="file" class="hidden" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required onchange="document.getElementById('fileName').innerHTML = '<i class=\'fa-solid fa-file-excel mr-2\'></i> Archivo listo para importar: <span class=\'font-bold\'>' + this.files[0].name + '</span>'" />
                    </label>
                </div>
                <p id="fileName" class="text-center mt-4 text-sm font-medium text-blue-600 transition-all"></p>
                
                @error('file')
                    <p class="text-center mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror

                <div class="mt-6">
                    <p class="text-sm text-gray-500 text-center">
                        Columnas sugeridas en tu hoja: <span class="font-mono bg-gray-100 px-1 py-0.5 rounded text-gray-700">nombre_completo, correo, telefono, fecha_nacimiento, tipo_sangre, alergias</span><br>
                        <span class="text-xs italic">(La primera fila debe indicar el encabezado)</span>
                    </p>
                </div>
            </div>
            
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 mt-8">
                <x-button href="{{ route('admin.patients.index') }}" color="secondary" outline>
                    Cancelar
                </x-button>
                <x-button type="submit" color="blue">
                    <i class="fa-solid fa-bolt mr-2"></i> Iniciar procesamiento en background
                </x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
