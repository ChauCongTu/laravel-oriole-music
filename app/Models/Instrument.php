<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instrument extends Model
{
    use HasFactory;
    public $fillable = [
        'catalog_id', 'type_id', 'design_id', 'brand_id', 'name', 'slug', 'image', 'description', 'type', 'price', 'discount', 'discount_to'
    ];
    public static function findBySlug(string $slug)
    {
        return Instrument::where('slug', $slug)->first();
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(InstrumentType::class, 'type_id');
    }
    public function design(): BelongsTo
    {
        return $this->belongsTo(InstrumentDesign::class, 'design_id');
    }
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function catalogue(): BelongsTo
    {
        return $this->belongsTo(Catalogue::class, 'catalog_id');
    }
    public static function filter($type, $brand_id, $type_id, $design_id)
    {
        $query = Instrument::query();

        if ($type != null) {
            $query->where('catalog_id', Catalogue::findBySlug($type)->id);
        }

        if ($brand_id != null) {
            $query->where('brand_id', $brand_id);
        }

        if ($type_id != null) {
            $query->where('type_id', $type_id);
        }

        if ($design_id != null) {
            $query->where('design_id', $design_id);
        }

        return $query->orderBy('id', 'DESC')->paginate(8);
    }
}
