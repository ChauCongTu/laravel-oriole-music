<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InstrumentType extends Model
{
    use HasFactory;
    public $fillable = [
        'name', 'slug'
    ];
    public function instruments(): HasMany {
        return $this->hasMany(Instrument::class);
    }
    public static function findBySlug(string $slug){
        return InstrumentType::where('slug', $slug)->first();
    }
}
