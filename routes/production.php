<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/production','middleware'=>['not.admin','permission'],'namespace' => 'Modules\Production'],function() {

    //Orders
    Route::get("/orders","OrdersController@index")->name("production.orders.index");

    /*Calendar*/
    Route::get("/calendar","CalendarController@index")->name("production.calendar.index");
    Route::post("/calendar/production-detail","CalendarController@detail")->name("production.calendar.detail");
    Route::post("/calendar/production-list","CalendarController@list")->name("production.calendar.list");
    Route::post("/calendar/production-save","CalendarController@save")->name("production.calendar.save");

});
