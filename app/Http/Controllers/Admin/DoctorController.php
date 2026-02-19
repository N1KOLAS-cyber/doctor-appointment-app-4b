<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specialities = Speciality::orderBy('name')->get();
        return view('admin.doctors.edit', compact('doctor', 'specialities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate([
            'speciality_id' => 'nullable|exists:specialities,id',
            // Cédula profesional (DGP México): solo dígitos, entre 6 y 8 caracteres
            'medical_license_number' => ['nullable', 'string', 'regex:/^\d{6,8}$/'],
            'biography' => 'nullable|string|max:255|min:100',
        ], [
            'medical_license_number.regex' => 'La cédula profesional debe contener entre 6 y 8 dígitos numéricos .',
            'biography.max' => 'El campo no debe ser mayor que 255 caracteres.',
            'biography.min' => 'El campo debe tener al menos 100 caracteres.',
        ]);

        $doctor->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Doctor actualizado',
            'text' => '¡Doctor actualizado exitosamente!'
        ]);

        return redirect()->route('admin.doctors.edit', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
