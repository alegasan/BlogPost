<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class MyPostController extends Controller
{
    public function index()
    {

        $MyPosts = auth()
            ->user()
            ->posts()
            ->status('published')
            ->latest()
            ->paginate(10);

        return view('pages.user.myPost.Index', compact('MyPosts'));
    }
}
