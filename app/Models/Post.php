<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePopular(Builder $query, string $time): Builder
    {
        return $query->where('created_at', '>=', date('Y-m-d H:i:s', strtotime($time)))
            ->withCount('comments')
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->orderBy('comments_count', 'desc');
    }

}
