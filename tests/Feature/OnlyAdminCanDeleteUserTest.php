<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('non-admin user cannot delete other users', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create a non-admin user (regular user - Paciente)
    $regularUser = User::factory()->create();
    $regularUser->roles()->attach(1); // Attach Paciente role (role_id 1)

    // 2) Create a target user to be deleted
    $targetUser = User::factory()->create();

    // 3) Authenticate as the regular user
    $this->actingAs($regularUser, 'web');

    // 4) Attempt to delete the target user
    $response = $this->delete(route('admin.users.destroy', $targetUser));

    // 5) Expect forbidden response (403)
    $response->assertStatus(403);

    // 6) Verify the target user still exists in database
    $this->assertDatabaseHas('users', [
        'id' => $targetUser->id
    ]);
});

test('admin user can delete other users', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create an admin user
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Attach admin role (role_id 4 is Administrador)

    // 2) Create a target user to be deleted
    $targetUser = User::factory()->create();
    $targetUser->roles()->attach(1); // Paciente role

    // 3) Authenticate as the admin
    $this->actingAs($admin, 'web');

    // 4) Attempt to delete the target user
    $response = $this->delete(route('admin.users.destroy', $targetUser));

    // 5) Expect successful redirect (302)
    $response->assertStatus(302);

    // 6) Verify the target user was deleted from database
    $this->assertDatabaseMissing('users', [
        'id' => $targetUser->id
    ]);
});
