<?php

namespace App\Services;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;

class PostSearchService
{
   
    public function search(string $query, int $perPage = 10): LengthAwarePaginator
    {
        return Post::query()
            ->ownedBy(auth()->id())
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}