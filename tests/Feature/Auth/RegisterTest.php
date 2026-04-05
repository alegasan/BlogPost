<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(LazilyRefreshDatabase::class);

it('registers a new user', function () {
    $payload = [
        'name' => 'Test User',
        'email' => 'test-user@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->post(route('register.store'), $payload);

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('success');

    $user = User::where('email', $payload['email'])->first();

    expect($user)->not->toBeNull();
    expect(Hash::check('password', $user->password))->toBeTrue();
});

it('requires a unique email address', function () {
    $existingUser = User::factory()->create();

    $response = $this
        ->from(route('register'))
        ->post(route('register.store'), [
            'name' => 'Test User',
            'email' => $existingUser->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

    $response->assertRedirect(route('register'));
    $response->assertSessionHasErrors('email');
});

it('throttles registration attempts', function () {
    for ($attempt = 0; $attempt < 5; $attempt++) {
        $this
            ->withServerVariables(['REMOTE_ADDR' => '10.0.0.2'])
            ->post(route('register.store'), [
                'name' => 'Test User',
                'email' => fake()->unique()->safeEmail(),
                'password' => 'password',
                'password_confirmation' => 'password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHas('success');
    }

    $this
        ->withServerVariables(['REMOTE_ADDR' => '10.0.0.2'])
        ->post(route('register.store'), [
            'name' => 'Test User',
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
        ->assertTooManyRequests();
});
