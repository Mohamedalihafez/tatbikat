<?php

namespace App\Http\Controllers\Ad;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ad\AdRequest;
use App\Http\Requests\Ad\OffersRequest;
use App\Models\Ad;
use App\Models\City;
use App\Models\Governorate;
use App\Models\MainCategory;
use App\Models\Offer;
use App\Models\Picture;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SellController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("ad.sell", [
            "mainCategories" => MainCategory::where("status", "active")->get(),
            "title" => "Buy and Sell anywhere in Egypt"
        ]);
    }

    public function create(MainCategory $mainCategory, SubCategory $subCategory)
    {
        return view("ad.post", [
            "title" => "Buy and Sell anywhere in Egypt",
            "mainCategory" => $mainCategory,
            "subCategory" => $subCategory,
            "governorates" => Governorate::where("status", "active")->get(),
            "cities" => City::where("status", "active")->get(),
        ]);
    }

    public function store(AdRequest $request)
    {
        $validated = $request->validated();
        $validated["user_id"] = Auth::user()->id;
        
        if($validated["thumbnail"]){
            $file_extension = request('thumbnail')->getClientOriginalExtension();
            $file_name = rand(0, 99999999999) . '.' . $file_extension;
            Image::make(request("thumbnail"))->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('upload_files/ads/' . $file_name));
            
            $validated["thumbnail"] = $file_name;
        }
        $ad = Ad::create(collect($validated)->except(['thumbnails'])->toArray());
        
        if($validated["thumbnails"])
        {
            $thumbnails = $validated["thumbnails"];
            foreach($thumbnails as $thumbnail)
            {
                $file_extension = $thumbnail->getClientOriginalExtension();
                $file_name = rand(0, 99999999999) . '.' . $file_extension;
                Image::make($thumbnail)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('upload_files/ads/'. $file_name));

                Picture::create([
                    "ad_id" => $ad->id,
                    "thumbnail" => $file_name
                ]);
            }
        }
        return redirect()->route("ad.post.offers", $ad->slug);
    }

    public function offers(Ad $ad)
    {
        return view("ad.offers", [
            "title" => "offers",
            "ad" => $ad,
            "offers" => Offer::get(),
        ]);
    }

    public function offers_update(OffersRequest $request, Ad $ad)
    {
        $validated = $request->validated();
        $user = User::firstWhere("id", auth()->user()->id);
        $offer = Offer::firstWhere("id", $validated["offer_id"]);

        $validated["offer_name"] = $offer->name;

        if($ad->offer_id) {
            if($ad->offer_id == $validated["offer_id"]){
                return redirect()->route("users.my-ads");
            }elseif($user->wallet_balance >= $offer->price){
                $user->withdraw($offer->price);
                $ad->update($validated);
                return redirect()->route("users.my-ads");
            }else{
                return redirect()->back()->with("status", __("offer.No enough money in your wallet, please charge your wallet and try again"));
            }
        }else{
            if($user->wallet_balance >= $offer->price) {
                $user->withdraw($offer->price);
                $ad->update($validated);
                return redirect()->route("users.my-ads");
            }else {
                return redirect()->back()->with("status", __("offer.No enough money in your wallet, please charge your wallet and try again"));
            }
        }
        
    }
}