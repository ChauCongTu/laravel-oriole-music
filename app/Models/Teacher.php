<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $fillable = [
        'avatar', 'name', 'description'
    ];
    public static function findName($name) {
        if ($name) {
            return Teacher::where('name', $name)->first();
        }
        return null;
    }
}
