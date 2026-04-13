<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Stevebauman\Purify\Facades\Purify;

class PostController extends Controller
{
    public function index(): View
    {
        $allPosts = Post::query()->where('status', 'published')->latest()->paginate(10);

        return view('pages.user.postPage.Index', compact('allPosts'));
    }

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

    public function show(Post $post): View
    {
        return view('pages.user.postPage.Show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('pages.user.postPage.Edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        $post->update([
            'title' => $validated['title'],
            'content' => Purify::clean($validated['content']),
            'category' => $validated['category'],
            'status' => $validated['status'],
        ]);

        Cache::forget('posts.stats.'.auth()->id());

        $message = $validated['status'] === 'published'
            ? 'Post updated successfully!'
            : 'Post saved as draft!';

        return back()->with('success', $message);
    }

    public function destroy(Post $post): RedirectResponse
    {

        $ownerId = $post->user_id;
        $post->delete();
        Cache::forget('posts.stats.'.$ownerId);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
