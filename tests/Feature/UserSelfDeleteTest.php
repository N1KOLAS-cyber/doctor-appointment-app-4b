<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// usar la funcion la base dedatos
uses(RefreshDatabase::class);

test('Un usuario se puede no eliminarse asi mismmo', function () {
    // 1) crear un usuario de prueba
    $user = User::factory()->create();
    // 2) simular que ese usuario ya inicio sesion
    $this->actingAs($user, 'web');

    // 3)  simular una peticion http delete (borrar un usuario)
    $response = $this->delete(route('admin.users.destroy', $user));

    //4) Eesperar que el servidor bloquee esta accion o bloque el borrado asi mimsmo
    $response->assertStatus(403);


    //5) si el usurio no se borro verifica en la db que sigue existiendo el usuario
    $this->assertDatabaseHas('users', [
        'id' => $user->id
    ]);
});
