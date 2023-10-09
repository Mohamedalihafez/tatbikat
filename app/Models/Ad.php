<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["status"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("status", "like", "%" . $search . "%" ))
        );

        $query->when($filters["user_id"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("user_id", "like", "%" . $search . "%" ))
        );

        $query->when($filters["search"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("name", "like", "%" . $search . "%" ))
        );

        $query->when($filters["category"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("sub_category_id", "like", "%" . $search . "%" ))
        );

        $query->when($filters["category_governorate"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("governorate_id", "like", "%" . $search . "%" ))
        );

        $query->when($filters["certification"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("certification", "=", $search ))
        );

        $query->when($filters["last_day"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString()))
        );

        $query->when($filters["offer_name"] ?? false, fn($query, $search) => 
            $query->where( fn($query) => 
                $query->where("offer_name", "like", "%" . $search . "%" ))
        );
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
    static function fetchAds($request)
    {
        return Ad::where('id', $request->id)->update(['status' => $request->status]);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class)->where("status", "active");
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}