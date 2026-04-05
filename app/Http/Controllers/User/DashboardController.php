<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $stats = Cache::remember("posts.stats.{$userId}", 60, function () use ($userId) {
            $counts = Post::selectRaw('status, count(*) as total')
                ->where('user_id', $userId)
                ->groupBy('status')
                ->pluck('total', 'status');

            $recentCount = Post::status('published')
                ->where('user_id', $userId)
                ->where('created_at', '>=', now()->subHours(48))
                ->count();

            return [
                'draft' => $counts['draft'] ?? 0,
                'published' => $counts['published'] ?? 0,
                'recent' => $recentCount,
            ];
        });

        return view('pages.user.Dashboard', compact('stats'));
    }
}
