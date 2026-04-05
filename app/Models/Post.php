<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

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
}
