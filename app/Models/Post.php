<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    public $fillable = [
        'image', 'cat_id', 'user_id', 'video', 'title', 'slug', 'content', 'posted_time'
    ];
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }
    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function findBySlug(string $slug)
    {
        return Post::where('slug', $slug)->first();
    }
}
