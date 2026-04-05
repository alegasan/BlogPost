<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('refreshes draft count after saving a draft', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $user->posts()->create([
        'title' => 'First draft',
        'content' => 'Initial draft content.',
        'category' => 'General',
        'status' => 'draft',
    ]);

    $otherUser->posts()->create([
        'title' => 'Other user draft',
        'content' => 'Other content.',
        'category' => 'General',
        'status' => 'draft',
    ]);

    $this->actingAs($user)
        ->get(route('Dashboard'))
        ->assertSuccessful()
        ->assertSee('Drafts: 1');

    $payload = [
        'title' => 'Second draft',
        'category' => 'General',
        'content' => 'Draft body.',
        'status' => 'draft',
    ];

    $this->from(route('Dashboard'))
        ->post(route('posts.store'), $payload)
        ->assertRedirect(route('Dashboard'));

    $this->get(route('Dashboard'))
        ->assertSuccessful()
        ->assertSee('Drafts: 2');
});
