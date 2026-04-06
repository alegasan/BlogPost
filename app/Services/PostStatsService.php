<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostStatsService
{
    /**
     * @return array{draft:int, published:int, recent:int}
     */
    public function forUser(?int $userId): array
    {
        if ($userId === null) {
            return $this->emptyStats();
        }

        return Cache::remember("posts.stats.{$userId}", 60, function () use ($userId) {
            $counts = Post::selectRaw('status, count(*) as total')
                ->where('user_id', $userId)
                ->groupBy('status')
                ->pluck('total', 'status');

            $recentCount = Post::status('published')
                ->where('user_id', $userId)
                ->where('created_at', '>=', now()->subHours(48))
                ->count();

            return [
                'draft' => (int) ($counts['draft'] ?? 0),
                'published' => (int) ($counts['published'] ?? 0),
                'recent' => $recentCount,
            ];
        });
    }

    /**
     * @return array{draft:int, published:int, recent:int}
     */
    public function emptyStats(): array
    {
        return [
            'draft' => 0,
            'published' => 0,
            'recent' => 0,
        ];
    }
}
