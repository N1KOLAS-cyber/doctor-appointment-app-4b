<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('cannot create user with duplicate email', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create first user with a specific email
    $firstUser = User::factory()->create([
        'email' => 'duplicate@example.com'
    ]);

    // 2) Authenticate as admin to have permission to create users
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Attach admin role (role_id 4 is Administrador)
    $this->actingAs($admin, 'web');

    // 3) Attempt to create a second user with the same email
    $response = $this->post(route('admin.users.store'), [
        'name' => 'Second User',
        'email' => 'duplicate@example.com', // Same email as firstUser
        'password' => 'password123',
        'password_confirmation' => 'password123',
        'id_number' => 'ID-67890',
        'phone' => '1234567890',
        'address' => '456 Another St',
        'role_id' => 2,
    ]);

    // 4) Expect validation error (302 redirect with session errors - Laravel's default web behavior)
    $response->assertStatus(302);
    $response->assertSessionHasErrors('email');

    // 5) Verify only one user with this email exists in database
    $this->assertEquals(1, User::where('email', 'duplicate@example.com')->count());
});
