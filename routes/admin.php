<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;

// Dashboard principal
Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

// Gestión de Roles
Route::resource('roles', RoleController::class);

// Gestión de Usuarios
Route::resource('users', UserController::class);

// Gestión de pacientes
Route::resource('patients', PatientController::class);

// Gestión de doctores
Route::resource('doctors', DoctorController::class);

// Horarios del doctor (debe ir después del resource para que {doctor} sea el modelo)
Route::get('doctors/{doctor}/schedules', function (\App\Models\Doctor $doctor) {
    return view('admin.doctors.schedules', compact('doctor'));
})->name('doctors.schedules');

// Vista de consulta (atender cita) — antes del resource para que no se confunda con {id}
Route::get('appointments/{appointment}/consultation', function (Appointment $appointment) {
    return view('admin.appointments.consultation', compact('appointment'));
})->name('appointments.consultation');

// Gestión de citas
Route::resource('appointments', AppointmentController::class);

// Gestión de aseguradoras
Route::resource('insurances', InsuranceController::class)->only([
    'index',
    'create',
    'store',
]);
