<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/production','middleware'=>['not.admin','permission'],'namespace' => 'Modules\Production'],function() {

    //Orders
    Route::get("/orders","OrdersController@index")->name("production.orders.index");
    Route::get("/calendar","CalendarController@index")->name("production.calendar.index");

});
