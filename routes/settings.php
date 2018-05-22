<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/settings','middleware'=>'not.admin'],function() {

    //Settings Units
    Route::get('units', 'SettingsManager\UnitSettingsController@index')->name('settings.units.index');
    Route::post("units/update","SettingsManager\UnitSettingsController@unit_status_update")->name("settings.units.update");
});
