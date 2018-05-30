<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/sales','middleware'=>'not.admin'],function() {

    //Companies
    Route::get("customers","Companies\CompaniesController@customer")->name("sales.companies.customer");
    Route::get("customer/{id}","Companies\CompaniesController@show")->name("sales.companies.show");
    Route::get("customers/data","Companies\CompaniesController@customer_data")->name("sales.companies.customer.data");
    Route::get("customer/{option}/{id}/{type}","Companies\CompaniesController@form")->name("sales.companies.form");
    Route::post("customer/{id}/store","Companies\CompaniesController@store")->name("sales.companies.store");
    Route::post("customer/{id}/destroy","Companies\CompaniesController@destroy")->name("sales.companies.destroy");

    //Sales Offers
    Route::get('offers', 'Modules\Sales\OffersController@index')->name('sales.offers.index');
    Route::get("offers/index_list","Modules\Sales\OffersController@index_list")->name("sales.offers.index_list");
    Route::get("offers/form/{id}/{type}","Modules\Sales\OffersController@form")->name("sales.offers.form");
    Route::post("{id}/store","Modules\Sales\OffersController@store")->name("sales.offers.store");
    Route::get("offers/{id}/show","Modules\Sales\OffersController@show")->name("sales.offers.show");
    Route::delete("offers/{id}/destroy","Modules\Sales\OffersController@destroy")->name("sales.offers.destroy");
    Route::post("offers/{id}/status-send","Modules\Sales\OffersController@status_send")->name("sales.offers.status_send");

});
