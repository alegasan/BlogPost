<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\PostSearchService;
use Illuminate\Http\Request;

class MyPostController extends Controller
{
    public function index()
    {

        $MyPosts = auth()
            ->user()
            ->posts()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('pages.user.myPost.Index', compact('MyPosts'));
    }

    public function search(Request $request, PostSearchService $searchService)
    {
        return response()->json(
            $searchService->search($request->string('query'))
        );
    }
}
