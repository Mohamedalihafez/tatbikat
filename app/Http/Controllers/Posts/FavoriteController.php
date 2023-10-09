<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function favorite(Request $request)
    {
        if($request->ajax()){
            Wishlist::create([
                "user_id" => Auth::user()->id,
                "ad_id" => $request->ad_id
            ]);
        }
    }

    public function favorite_delete(Request $request)
    {
        if($request->ajax()){
            Wishlist::firstWhere("ad_id", $request->ad_id)->delete();
        }
    }

}