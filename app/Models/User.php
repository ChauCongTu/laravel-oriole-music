<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $fillable = [
        'name', 'email', 'password', 'phone', 'role'
    ];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
