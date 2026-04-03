<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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
        $request->validated();

        Post::create([
            'title' => $request->title,
            'content' => clean($request->content),
            'category' => $request->category,
            'status' => 'published',
        ]);

        return back()->with('success', 'Post created successfully!');
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

    public function storeDraft(PostRequest $request)
    {
        $request->validated();

        Post::create([
            'title' => $request->title,
            'content' => clean($request->content),
            'category' => $request->category,
            'status' => 'draft',
        ]);

        return back()->with('success', 'Post saved as draft successfully!');
    }
}
