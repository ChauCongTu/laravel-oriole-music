<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'slug', 'image', 'description', 'price', 'discount', 'discount_to'
    ];
    public static function findBySlug(string $slug)
    {
        return Service::where('slug', $slug)->first();
    }
}
