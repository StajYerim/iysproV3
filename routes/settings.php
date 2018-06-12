<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/settings','middleware'=>'not.admin'],function() {

    //Settings Units
    Route::get('units', 'SettingsManager\UnitSettingsController@index')->name('settings.units.index');
    Route::post("units/update","SettingsManager\UnitSettingsController@unit_status_update")->name("settings.units.update");


    //Api Connect
    Route::get("api-list","Modules\Settings\ApiConnectController@index")->name("settings.api.index");
    Route::post("api-save","Modules\Settings\ApiConnectController@save")->name("settings.api.save");
    
  // Settings Menu
  // Controller sonradan Değiştirilecek
    Route::get("user-profile/{id}","HomeController@profil_update")->name("settings.users.profile");
    Route::get("account-profile","HomeController@account_update")->name("settings.accounts.profile");
  
  

});
