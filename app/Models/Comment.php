<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'email', 'content', 'reply_id', 'post_id'
    ];
    public function post(): BelongsTo {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function child(): HasMany {
        return $this->hasMany(Comment::class);
    }
    public function parent(): BelongsTo {
        return $this->belongsTo(Comment::class, 'reply_is');
    }
}
