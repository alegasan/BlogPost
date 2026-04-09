<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

#[Fillable(['title', 'content', 'category', 'status'])]

class Post extends Model
{
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public static function draftCount(): int
    {
        return static::status('draft')->count();
    }

    public static function publishedCount(): int
    {
        return static::status('published')->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit($this->content, 100);
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('M d, Y');
    }

    public function scopeOwnedBy(Builder $query, int $userId): Builder
    {
        return $query->where('user_id', $userId);
    }
}
