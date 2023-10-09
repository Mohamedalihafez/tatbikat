<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\City;
use App\Models\Offer;
use App\Models\SubCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Return home page with ads and offer_ads
    public function index()
    {
        return view("index", [
            "ads" => Ad::where("status", "active")->where("offer_id", "=", null)->latest()->paginate(15),
            "offer_ads" => Ad::where("status", "active")->where("offer_id", "!=", null)->paginate(8),
        ]);
    }

    // 
    public function filter_by_category(SubCategory $subCategory)
    {
        return view("index", [
            "ads" => Ad::where("status", "active")->where("offer_id", "=", null)->where("sub_category_id", $subCategory->id)->latest()->paginate(15),
            "offer_ads" => Ad::where("status", "active")->where("offer_id", "!=", null)->paginate(8),
        ]);
    }

    // 
    public function filter_ads_home()
    {
        if(request()->ajax()){
            return view("filter_ads", [
                "ads" => Ad::where("status", "active")->where("offer_id", "=", null)->latest()->filter(
                    request(["search", "category_governorate", "certification", "last_day"])
                )->paginate(15)
            ]);
        }
    }

    // 
    public function filter_offer_home()
    {
        if(request()->ajax()){
            return view("filter_offers", [
                "ads" => Ad::where("status", "active")->where("offer_id", "!=", null)->latest()->filter(
                    request(["offer_name"])
                )->paginate(8)
            ]);
        }
    }

    // 
    public function filter(Request $request)
    {
        if($request->ajax()){
            return view("ad.cities", [
                "cities" => City::latest()->filter(
                    request(['governorate'])
                )->get(),
            ]);
        }
    }
}