<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/ecommerce','middleware'=>'not.admin'],function() {

    Route::get("products","Modules\Ecommerce\ProductsController@index")->name("ecommerce.products.index");
    Route::get("products/index_list","Modules\Ecommerce\ProductsController@index_list")->name("ecommerce.products.index_list");
    Route::post("products","Modules\Ecommerce\ProductsController@addProduct")->name("ecommerce.products.add_product");

    // N11 Categories
    Route::get("categories/{category?}","Modules\Ecommerce\ProductsController@categories")->name("ecommerce.products.categories");
});
