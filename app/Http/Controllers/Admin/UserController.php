<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'id_number' => 'required|string|min:5|max:20|regex:/^[A-Za-z0-9\-]+$/|unique:users',
            'phone' => 'required|digits_between:7,15',
            'address' => 'required|string|min:3|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        $userData = $data;
        unset($userData['role_id']);

        $user = User::create($userData);

        $user->roles()->attach($data['role_id']);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario creado',
            'text' => 'El usuario ha sido creado exitosamente',
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'id_number' => 'required|string|min:5|max:20|regex:/^[A-Za-z0-9\-]+$/|unique:users,id_number,' . $user->id,
            'phone' => 'required|digits_between:7,15',
            'address' => 'required|string|min:3|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        $userData = $data;
        unset($userData['role_id']);

        $user->update($userData);

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        $user->roles()->sync($data['role_id']);

        return redirect()->route('admin.users.edit', $user->id)
            ->with('success', 'User updated successfully.')
            ->with('swal', [
                'icon' => 'success',
                'title' => 'Usuario actualizado',
                'text' => 'El usuario ha sido actualizado exitosamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        // 1. Check if authenticated user is an administrator
        $currentUser = auth()->user();
        $isAdmin = $currentUser->roles()->where('id', 4)->exists();
        
        if (!$isAdmin) {
            abort(403, 'Only administrators can delete users');
        }
        
        // 2. Prevent user from deleting themselves
        if (auth()->id() === $user->id) {
            abort(403, 'no tiene permisos para eliminar tu pripia cuenta');
        }
        // Prevenir eliminación del usuario administrador por defecto
        if ($user->email === 'nicolasprueba@gmail.com') {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error al eliminar usuario',
                'text' => 'No se puede eliminar el usuario administrador por defecto.'
            ]);

            return redirect()->route('admin.users.index')
                ->with('error', 'No se puede eliminar el usuario administrador por defecto.');
        }

        //Eliminar roles asociados a un usuario
        $user->roles()->detach();

        //Eliminar el usuario
        $user->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario eliminado correctamente',
            'text' => 'El usuario ha sido eliminado exitosamente'
        ]);

        return redirect()->route('admin.users.index');
    }
}
