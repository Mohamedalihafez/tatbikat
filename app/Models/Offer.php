<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Offer extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    

    public $translatedAttributes = ['name', "description"];
    protected $guarded = [];

    public function ads()
    {
        return $this->hasMany(Ad::class)->where("status", "active");
    }
}