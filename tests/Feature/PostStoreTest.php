<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('creates a post with a valid payload', function (string $status) {
    $user = User::factory()->create();

    $payload = [
        'title' => 'A fresh start',
        'category' => 'General',
        'content' => 'Drafting a new post body.',
        'status' => $status,
    ];

    $this->actingAs($user)
        ->from(route('Dashboard'))
        ->post(route('posts.store'), $payload)
        ->assertRedirect(route('Dashboard'))
        ->assertSessionHas('success');

    $post = Post::where('user_id', $user->id)
        ->where('title', $payload['title'])
        ->first();

    expect($post)->not->toBeNull();
    expect($post->status)->toBe($status);
})->with([
    'draft',
    'published',
]);

it('validates post payload inputs', function (string $field, mixed $value, string $errorKey) {
    $user = User::factory()->create();

    $payload = [
        'title' => 'A valid title',
        'category' => 'General',
        'content' => 'Valid content body.',
        'status' => 'draft',
    ];

    $payload[$field] = $value;

    $this->actingAs($user)
        ->from(route('Dashboard'))
        ->post(route('posts.store'), $payload)
        ->assertRedirect(route('Dashboard'))
        ->assertSessionHasErrors($errorKey);

    expect(Post::count())->toBe(0);
})->with([
    'title required' => ['title', '', 'title'],
    'title max' => ['title', str_repeat('a', 256), 'title'],
    'category required' => ['category', '', 'category'],
    'category max' => ['category', str_repeat('b', 256), 'category'],
    'content required' => ['content', '', 'content'],
    'content max' => ['content', str_repeat('c', 65536), 'content'],
    'status required' => ['status', '', 'status'],
    'status in' => ['status', 'archived', 'status'],
]);
