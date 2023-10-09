<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', "street_1", "street_2"];
    protected $guarded = [];

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['governorate'] ?? false, fn($query, $search) =>
            $query->where( fn($query) =>
                $query->where('governorate_id', 'like', '%' . $search . '%' ))
            );
    }
}