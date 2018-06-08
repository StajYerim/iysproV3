<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/ecommerce','middleware'=>'not.admin'],function() {

    Route::get("products","Modules\Ecommerce\ProductsController@index")->name("ecommerce.products.index");
});
