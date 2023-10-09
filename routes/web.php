<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ad\SellController;
use App\Http\Controllers\Auth\AuthGoogle;
use App\Http\Controllers\Posts\FavoriteController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\MyAdsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::get('/', [Controller::class, "index"])->name("index");
    Route::get('/ads/{subCategory:slug}', [Controller::class, "filter_by_category"])->name("home.category");
    Route::get('/home/search', [Controller::class, "filter_ads_home"])->name("home.search");
    Route::get('/home/offer_name', [Controller::class, "filter_offer_home"])->name("home.offer_name");
    Route::get('/filter', [Controller::class, "filter"])->name("filter");


    // Sell Routes
    Route::group(["prefix" => "sell"], function() {
        Route::get("/", [SellController::class, "index"])->name("ad.sell");
        Route::post("/post/store", [SellController::class, "store"])->name("ad.post.store");
        Route::get("/{mainCategory:slug}/{subCategory:slug}", [SellController::class, "create"])->name("ad.post");
        Route::get("/post/get-cities", [SellController::class, "getCities"])->name("ad.post.getCities");
        Route::get("/post/{ad:slug}/offer", [SellController::class, "offers"])->name("ad.post.offers");
        Route::patch("/post/{ad:slug}/offer/update", [SellController::class, "offers_update"])->name("ad.post.offers.update");
    });

    // Posts
    Route::get("/posts/{ad:slug}", [PostController::class, "get_ad"])->name("posts.show");

    Route::group(["middleware" => "auth"], function () {
        Route::get("/posts/{ad:slug}/edit", [PostController::class, "edit"])->name("posts.edit");
        Route::patch("/posts/{ad:slug}/update", [PostController::class, "update"])->name("posts.update");
        Route::delete("/posts/{ad:slug}/destroy", [PostController::class, "destroy"])->name("posts.destroy");

        // Favorite Routes
        Route::post("posts/favorite", [FavoriteController::class, "favorite"])->name("posts.favorite");
        Route::post("posts/favorite/delete", [FavoriteController::class, "favorite_delete"])->name("posts.favorite.delete");
    });

    // Users Routes
    Route::group(["prefix" => "user"], function() {
        Route::get("/my-ads", [MyAdsController::class, "myAds"])->name("users.my-ads");
        Route::get("/favorites", [MyAdsController::class, "favorites"])->name("users.favorites");
        Route::get("/filter_ads", [MyAdsController::class, "filter_ads"])->name("users.my_ads.filter");
        Route::get("/wallet", [MyAdsController::class, "wallet"])->name("users.wallet");
        Route::post("/wallet", [MyAdsController::class, "wallet_store"])->name("users.wallet.store");
    });

    Route::get("auth/google", [AuthGoogle::class, "redirectToGoogle"])->name("auth.google");
    Route::get("auth/google/callback", [AuthGoogle::class, "handleGoogleCallback"]);

});