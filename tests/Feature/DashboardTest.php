<?php

use App\Models\User;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('guests are redirected to the login page', function () {
    $response = $this->get('/admin/dashboard');
    $response->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $user = User::factory()->create();
    $user->forceFill([
        'is_admin' => true,
    ]);
    $this->actingAs($user);

    $response = $this->get('/admin/dashboard');
    $response->assertStatus(200);
});
