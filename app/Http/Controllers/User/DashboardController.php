<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $allPosts = auth()
            ->user()
            ->posts()
            ->status('published')
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.user.Dashboard', compact('allPosts'));
    }
}
