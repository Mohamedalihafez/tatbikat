<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Governorate extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class)->where("status", "active");
    }

    public function ads()
    {
        return $this->hasMany(Ad::class)->where("status", "active");
    }
}