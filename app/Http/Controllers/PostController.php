<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Stevebauman\Purify\Facades\Purify;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $validated = $request->validated();
        Post::create([
            'title' => $validated['title'],
            'content' => Purify::clean($validated['content']),
            'category' => $validated['category'],
            'status' => $validated['status'],
        ]);

        Cache::forget('posts.stats');

        $message = $validated['status'] === 'published'
            ? 'Post published successfully!'
            : 'Post saved as draft!';

        return back()->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
