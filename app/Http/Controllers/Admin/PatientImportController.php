<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ImportPatientsJob;
use Illuminate\Support\Facades\Storage;

class PatientImportController extends Controller
{
    public function create()
    {
        return view('admin.patients.import');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:10240', // Hasta 10MB
        ]);

        if ($request->hasFile('file')) {
            // Guardar en Storage private
            $file = $request->file('file');
            $path = $file->storeAs('imports', 'patients_import_' . time() . '.' . $file->extension(), 'local');

            // Preparar path relativo sin el 'app/' para que se alinee con local storage (o usar 'private/')
            // Al usar 'local' y storeAs, guarda en storage/app/private/imports/ si 'local' root es storage/app/private en L11+
            // Despachar a segundo plano
            ImportPatientsJob::dispatch($path);

            session()->flash('swal', [
                'icon' => 'info',
                'title' => 'Importación en progreso',
                'text' => 'El archivo se está procesando en segundo plano. Los pacientes aparecerán pronto.'
            ]);

            return redirect()->route('admin.patients.index');
        }

        return back()->withErrors(['file' => 'No se cargó el archivo correctamente.']);
    }
}
