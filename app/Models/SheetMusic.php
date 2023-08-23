<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheetMusic extends Model
{
    use HasFactory;
    protected $table = 'sheet_musics';
    public $fillable = [
        'name','slug', 'image', 'description', 'price', 'discount', 'discount_to'
    ];
    public static function findBySlug(string $slug)
    {
        return SheetMusic::where('slug', $slug)->first();
    }
}
