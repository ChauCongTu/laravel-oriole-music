<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $fillable = [
        'title', 'summary', 'image', 'link'
    ];
    public static function getLastestBanners($limit = 1) {
        return Banner::orderBy('id', 'DESC')->limit($limit)->first();
    }
}
