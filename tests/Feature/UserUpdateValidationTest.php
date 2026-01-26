<?php

use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('cannot update user with invalid email format', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create a user to update
    $user = User::factory()->create([
        'email' => 'valid@example.com'
    ]);

    // 2) Authenticate as admin
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Administrador role
    $this->actingAs($admin, 'web');

    // 3) Attempt to update with invalid email
    $response = $this->put(route('admin.users.update', $user), [
        'name' => $user->name,
        'email' => 'notanemail', // Invalid email format
        'id_number' => $user->id_number,
        'phone' => $user->phone,
        'address' => $user->address,
        'role_id' => 1,
    ]);

    // 4) Expect validation error
    $response->assertStatus(302); // Laravel redirects back with errors
    $response->assertSessionHasErrors('email');

    // 5) Verify email was not changed in database
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'email' => 'valid@example.com' // Original email unchanged
    ]);
});

test('cannot update user with invalid phone number', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create a user to update
    $user = User::factory()->create([
        'phone' => '1234567890'
    ]);

    // 2) Authenticate as admin
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Administrador role
    $this->actingAs($admin, 'web');

    // 3) Attempt to update with invalid phone (contains letters)
    $response = $this->put(route('admin.users.update', $user), [
        'name' => $user->name,
        'email' => $user->email,
        'id_number' => $user->id_number,
        'phone' => 'abc123', // Invalid phone format
        'address' => $user->address,
        'role_id' => 1,
    ]);

    // 4) Expect validation error
    $response->assertStatus(302);
    $response->assertSessionHasErrors('phone');

    // 5) Verify phone was not changed in database
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'phone' => '1234567890' // Original phone unchanged
    ]);
});

test('cannot update user with invalid id_number format', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create a user to update
    $user = User::factory()->create([
        'id_number' => 'VALID-123'
    ]);

    // 2) Authenticate as admin
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Administrador role
    $this->actingAs($admin, 'web');

    // 3) Attempt to update with invalid id_number (too short)
    $response = $this->put(route('admin.users.update', $user), [
        'name' => $user->name,
        'email' => $user->email,
        'id_number' => 'ABC', // Too short (min:5)
        'phone' => $user->phone,
        'address' => $user->address,
        'role_id' => 1,
    ]);

    // 4) Expect validation error
    $response->assertStatus(302);
    $response->assertSessionHasErrors('id_number');

    // 5) Verify id_number was not changed in database
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'id_number' => 'VALID-123' // Original id_number unchanged
    ]);
});

test('can update user with valid data', function () {
    // 0) Seed the roles first
    $this->seed(RoleSeeder::class);

    // 1) Create a user to update
    $user = User::factory()->create();

    // 2) Authenticate as admin
    $admin = User::factory()->create();
    $admin->roles()->attach(4); // Administrador role
    $this->actingAs($admin, 'web');

    // 3) Update with valid data
    $response = $this->put(route('admin.users.update', $user), [
        'name' => 'Updated Name',
        'email' => 'newemail@example.com',
        'id_number' => 'NEW-123456',
        'phone' => '9876543210',
        'address' => 'New Address 123',
        'role_id' => 1,
    ]);

    // 4) Expect successful redirect
    $response->assertStatus(302);
    $response->assertSessionHasNoErrors();

    // 5) Verify data was updated in database
    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Updated Name',
        'email' => 'newemail@example.com',
        'id_number' => 'NEW-123456',
        'phone' => '9876543210',
        'address' => 'New Address 123',
    ]);
});
