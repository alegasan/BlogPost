<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Stevebauman\Purify\Facades\Purify;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $allPosts = auth()
            ->user()
            ->posts()
            ->status('published')
            ->latest()
            ->paginate(10);

        return view('pages.user.postPage.Index', compact('allPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        auth()->user()->posts()->create([
            'title' => $validated['title'],
            'content' => Purify::clean($validated['content']),
            'category' => $validated['category'],
            'status' => $validated['status'],
        ]);

        Cache::forget('posts.stats.'.auth()->id());

        $message = $validated['status'] === 'published'
            ? 'Post published successfully!'
            : 'Post saved as draft!';

        return back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): void
    {
        //
    }
}
