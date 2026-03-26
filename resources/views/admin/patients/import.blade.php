<x-admin-layout title="Importar Pacientes | Simify" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Pacientes',
        'href' => route('patients.index')
    ],
    [
        'name' => 'Importar'
    ],
]">
    <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Carga Masiva de Pacientes</h2>

        <div class="mb-6 p-4 bg-indigo-50 border-l-4 border-indigo-500 text-indigo-700">
            <p class="font-bold flex items-center">
                <i class="fa-solid fa-circle-info mr-2"></i> Información Importante
            </p>
            <p class="mt-1 text-sm">
                Sube un archivo en formato Excel o CSV. Debido a que el archivo puede ser grande, el proceso se ejecutará en segundo plano para no interrumpir tu trabajo. Recibirás a los pacientes gradualmente a medida que se procesen.
            </p>
        </div>
        
        <form action="{{ route('patients.import.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="file">Seleccionar archivo Excel/CSV</label>
                <div class="flex items-center space-x-4">
                    <input class="block w-full max-w-lg text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" id="file" name="file" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                </div>
                @error('file')
                    <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500">
                    Las columnas esperadas son: <strong>name, email, id_number, phone, address, allergies, chronic_conditions...</strong> (La primera fila debe ser el encabezado).
                </p>
            </div>
            
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> Importar en segundo plano
                </button>
                <a href="{{ route('patients.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm transition-colors">Volver a lista</a>
            </div>
        </form>
    </div>
</x-admin-layout>
