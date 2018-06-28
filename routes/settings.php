<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix'=>'{company_id}/settings','middleware'=>'not.admin'],function() {

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
