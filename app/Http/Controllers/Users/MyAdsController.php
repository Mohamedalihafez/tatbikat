<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\WalletRequest;
use App\Models\Ad;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAdsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function myAds()
    {
        return view("user.my_ads", [
            "ads_count" => Ad::where("user_id", Auth::user()->id)->count(),
            "ads_active_count" => Ad::where("user_id", Auth::user()->id)->where("status", "active")->count(),
            "ads_inactive_count" => Ad::where("user_id", Auth::user()->id)->where("status", "inactive")->count(),
            "ads_pending_count" => Ad::where("user_id", Auth::user()->id)->where("status", "pending")->count(),
            "ads_moderated_count" => Ad::where("user_id", Auth::user()->id)->where("status", "moderated")->count(),
            
            "ads" => Ad::where("user_id", Auth::user()->id)->filter(
                        request(["active", "inactive", "pending", "moderated"])
                    )->latest()->paginate(15),
        ]);
    }

    public function filter_ads(Request $request)
    {
        if($request->ajax()){
            return view("user.filter_ads", [
                "ads" => Ad::where("user_id", Auth::user()->id)->filter(
                        request(["status", "user_id", "search", "category"])
                    )->latest()->paginate(15),
            ]);
        }
    }

    public function favorites()
    {
        $user = User::firstWhere("id", Auth::user()->id);
        return view("user.favorites", [
            "favorite_ads" => $user->favorites()->latest()->get(),
        ]);
    }

    public function wallet()
    {
        return view("user.wallet", []);
    }

    public function wallet_store(WalletRequest $request)
    {
        $validated = $request->validated();
        $validated["user_id"] = auth()->user()->id;

        Transaction::create($validated);
        return redirect()->back()->with("status", __("wallet.successfully sent, the information will be verified and the amount in the wallet will be transferred soon"));
    }
}