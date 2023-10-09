<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:sanctum', config('jetstream.auth_session'), 'verified']], function(){

    Route::group(["prefix" => "admin"], function () {

        Route::get('/', [AdminController::class, "index"])->name('dashboard');
        Route::get('/get_total_ads', [AdminController::class, "get_total_ads"])->name('admin.get_total_ads');
    
        // Users
        Route::group(["prefix" => "users"], function () {
            Route::get("/", [UserController::class, "index"])->name("admin.users.index");
            Route::get("/data", [UserController::class, "data"])->name("admin.users.data");
            Route::patch("/{user:username}/update", [UserController::class, "update"])->name("admin.users.update");
        });
    
        // Admins
        Route::group(["prefix" => "admins"], function () {
            Route::get("/", [AdminsController::class, "index"])->name("admin.admins.index");
            Route::get("/data", [AdminsController::class, "data"])->name("admin.admins.data");
            Route::patch("/{user:username}/update", [AdminsController::class, "update"])->name("admin.admins.update");
    
        });
    
        // Main Categories
        Route::group(["prefix" => "categories"], function () {
            Route::get("/", [MainCategoryController::class, "index"])->name("admin.categories.index");
            Route::get("/data", [MainCategoryController::class, "data"])->name("admin.categories.data");
            Route::get("/publish-new-main-category", [MainCategoryController::class, "create"])->name("admin.categories.create");
            Route::post("/store", [MainCategoryController::class, "store"])->name("admin.categories.store");
            Route::get("/{mainCategory:slug}/edit", [MainCategoryController::class, "edit"])->name("admin.categories.edit");
            Route::patch("/{mainCategory:slug}/update", [MainCategoryController::class, "update"])->name("admin.categories.update");
            Route::delete("/{mainCategory:slug}/destroy", [MainCategoryController::class, "destroy"])->name("admin.categories.destroy");
        });
    
        // Sub Categories
        Route::group(["prefix" => "sub-categories"], function () {
            Route::get("/", [SubCategoryController::class, "index"])->name("admin.subCategories.index");
            Route::get("/data", [SubCategoryController::class, "data"])->name("admin.subCategories.data");
            Route::get("/publish-new-sub-category", [SubCategoryController::class, "create"])->name("admin.subCategories.create");
            Route::post("/store", [SubCategoryController::class, "store"])->name("admin.subCategories.store");
            Route::get("/{subCategory:slug}/edit", [SubCategoryController::class, "edit"])->name("admin.subCategories.edit");
            Route::patch("/{subCategory:slug}/update", [SubCategoryController::class, "update"])->name("admin.subCategories.update");
            Route::delete("/{subCategory:slug}/destroy", [SubCategoryController::class, "destroy"])->name("admin.subCategories.destroy");
        });
    
        // Brands
        Route::group(["prefix" => "brands"], function () {
            Route::get("/", [BrandController::class, "index"])->name("admin.brands.index");
            Route::get("/data", [BrandController::class, "data"])->name("admin.brands.data");
            Route::get("/publish-new-brand", [BrandController::class, "create"])->name("admin.brands.create");
            Route::post("/store", [BrandController::class, "store"])->name("admin.brands.store");
            Route::get("/{brand:slug}/edit", [BrandController::class, "edit"])->name("admin.brands.edit");
            Route::patch("/{brand:slug}/update", [BrandController::class, "update"])->name("admin.brands.update");
            Route::delete("/{brand:slug}/destroy", [BrandController::class, "destroy"])->name("admin.brands.destroy");
        });
    
        // Governorates
        Route::group(["prefix" => "governorates"], function () {
            Route::get("/", [GovernorateController::class, "index"])->name("admin.governorates.index");
            Route::get("/data", [GovernorateController::class, "data"])->name("admin.governorates.data");
            Route::get("/publish-new-governorate", [GovernorateController::class, "create"])->name("admin.governorates.create");
            Route::post("/store", [GovernorateController::class, "store"])->name("admin.governorates.store");
            Route::get("/{governorate:slug}/edit", [GovernorateController::class, "edit"])->name("admin.governorates.edit");
            Route::patch("/{governorate:slug}/update", [GovernorateController::class, "update"])->name("admin.governorates.update");
            Route::delete("/{governorate:slug}/destroy", [GovernorateController::class, "destroy"])->name("admin.governorates.destroy");
        });
    
        // Cities
        Route::group(["prefix" => "cities"], function () {
            Route::get("/", [CityController::class, "index"])->name("admin.cities.index");
            Route::get("/data", [CityController::class, "data"])->name("admin.cities.data");
            Route::get("/publish-new-city", [CityController::class, "create"])->name("admin.cities.create");
            Route::post("/store", [CityController::class, "store"])->name("admin.cities.store");
            Route::get("/{city:slug}/edit", [CityController::class, "edit"])->name("admin.cities.edit");
            Route::patch("/{city:slug}/update", [CityController::class, "update"])->name("admin.cities.update");
            Route::delete("/{city:slug}/destroy", [CityController::class, "destroy"])->name("admin.cities.destroy");
        });
    
        // offers
        Route::group(["prefix" => "offers"], function () {
            Route::get("/", [OfferController::class, "index"])->name("admin.offers.index");
            Route::get("/data", [OfferController::class, "data"])->name("admin.offers.data");
            Route::get("/publish-new-offer", [OfferController::class, "create"])->name("admin.offers.create");
            Route::post("/store", [OfferController::class, "store"])->name("admin.offers.store");
            Route::get("/{offer}/edit", [OfferController::class, "edit"])->name("admin.offers.edit");
            Route::patch("/{offer}/update", [OfferController::class, "update"])->name("admin.offers.update");
            Route::delete("/{offer}/destroy", [OfferController::class, "destroy"])->name("admin.offers.destroy");
        });
    
        // Ads
        Route::group(["prefix" => "ads"], function () {
            Route::get("/", [AdController::class, "index"])->name("admin.ads.index");
            Route::post('/fetch', [AdController::class, 'fetchAds'])->name('ads.fetch');
            Route::get("/data", [AdController::class, "data"])->name("admin.ads.data");
            Route::get("/{ad:slug}/edit", [AdController::class, "edit"])->name("admin.ads.edit");
            Route::patch("/{ad:slug}/update", [AdController::class, "update"])->name("admin.ads.update");
        });
    
        // Transactions
        Route::group(["prefix" => "transactions"], function () {
            Route::get("/", [TransactionController::class, "index"])->name("admin.transactions.index");
            Route::get("/data", [TransactionController::class, "data"])->name("admin.transactions.data");
            Route::get("/{transaction:id}/edit", [TransactionController::class, "edit"])->name("admin.transactions.edit");
            Route::patch("/{user:id}/{transaction:id}/update", [TransactionController::class, "update"])->name("admin.transactions.update");
            Route::delete("/{transaction:id}/destroy", [TransactionController::class, "destroy"])->name("admin.transactions.destroy");
        });

        // Settings
        Route::group(["prefix" => "settings"], function () {
            Route::get("/", [SettingController::class, "index"])->name("admin.settings.index");
        });

    });

});