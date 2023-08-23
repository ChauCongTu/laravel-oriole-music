<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $fillable = [
        'name','slug', 'image', 'content', 'description', 'teacher', 'price', 'discount', 'discount_to'
    ];
    public static function findBySlug(string $slug)
    {
        return Course::where('slug', $slug)->first();
    }
}
