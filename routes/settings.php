<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix'=>'{company_id}/settings','middleware'=>'not.admin'],function() {

    Route::group(["namespace" => "Modules\Settings"],function(){
        Route::get("/","HomeController@index")->name("settings.home");
        Route::get("/general","GeneralController@index")->name("general");
        Route::get("/offer","OfferController@index")->name("offer");
        Route::get("/sales","SalesController@index")->name("sales");
        Route::get("/purchase","PurchaseController@index")->name("purchase");
        Route::get("/product","ProductController@index")->name("product");
        Route::get("/account","AccountController@index")->name("account");
        Route::get("/user","UserController@index")->name("user");
        Route::get("/print","PrintController@index")->name("print");
        Route::get("/planning","PlanningController@index")->name("planning");
        Route::get("/store","StoreController@index")->name("store");
        Route::get("/email","EmailController@index")->name("email");
        Route::get("/categoryandtags","CategoryAndTagsController@index")->name("categoryandtags");
        Route::get("/invoice","InvoiceController@index")->name("invoice");
        Route::get("/company-profile","CompanyProfileController@index")->name("company_profile");
        Route::post("/company-profile","CompanyProfileController@update")->name("company_profile.update");
    });


    // Settings Units
    Route::get('units', 'SettingsManager\UnitSettingsController@index')->name('settings.units.index');
    Route::post("units/update","SettingsManager\UnitSettingsController@unit_status_update")->name("settings.units.update");


    // Api Connect
    Route::get("api-list","Modules\Settings\ApiConnectController@index")->name("settings.api.index");
    Route::post("api-save","Modules\Settings\ApiConnectController@save")->name("settings.api.save");

    // Settings Menu
    Route::get("user-profile","HomeController@profil_update")->name("settings.users.profile");
    Route::get("account-profile","HomeController@account_update")->name("settings.accounts.profile");
    Route::post("user-profile/save","HomeController@profil_update_save")->name("settings.users.profile.save");
    Route::post("user-profile/password/save","HomeController@profil_password_save")->name("settings.users.profile.password.save");


});
