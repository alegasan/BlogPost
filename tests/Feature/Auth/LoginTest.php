<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('logs in with valid credentials', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('Dashboard'));
    $this->assertAuthenticatedAs($user);
});

it('rejects invalid credentials', function () {
    $user = User::factory()->create();

    $response = $this
        ->from(route('login'))
        ->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);

    $response->assertRedirect(route('login'));
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

it('throttles login attempts', function () {
    $payload = [
        'email' => 'missing@example.com',
        'password' => 'password',
    ];

    for ($attempt = 0; $attempt < 5; $attempt++) {
        $this
            ->withServerVariables(['REMOTE_ADDR' => '10.0.0.1'])
            ->post(route('login.store'), $payload)
            ->assertRedirect(route('login'));
    }

    $this
        ->withServerVariables(['REMOTE_ADDR' => '10.0.0.1'])
        ->post(route('login.store'), $payload)
        ->assertTooManyRequests();
});
