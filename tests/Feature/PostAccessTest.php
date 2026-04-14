<?php

use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('blocks non-owners from viewing drafts by url', function () {
    $owner = User::factory()->create();
    $viewer = User::factory()->create();

    $draft = $owner->posts()->create([
        'title' => 'Draft by owner',
        'content' => 'Private content.',
        'category' => 'General',
        'status' => 'draft',
    ]);

    $this->actingAs($viewer)
        ->get(route('posts.show', $draft))
        ->assertForbidden();
});

it('allows non-owners to view published posts by url', function () {
    $owner = User::factory()->create();
    $viewer = User::factory()->create();

    $published = $owner->posts()->create([
        'title' => 'Public post',
        'content' => 'Published content.',
        'category' => 'General',
        'status' => 'published',
    ]);

    $this->actingAs($viewer)
        ->get(route('posts.show', $published))
        ->assertSuccessful()
        ->assertSee('Public post');
});

it('lists only published posts on the all posts page', function () {
    $owner = User::factory()->create();
    $viewer = User::factory()->create();

    $owner->posts()->create([
        'title' => 'Draft hidden',
        'content' => 'Draft content.',
        'category' => 'General',
        'status' => 'draft',
    ]);

    $owner->posts()->create([
        'title' => 'Published visible',
        'content' => 'Published content.',
        'category' => 'General',
        'status' => 'published',
    ]);

    $this->actingAs($viewer)
        ->get(route('posts.index'))
        ->assertSuccessful()
        ->assertSee('Published visible')
        ->assertDontSee('Draft hidden');
});
