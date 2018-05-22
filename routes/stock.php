<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/stocks','middleware'=>'not.admin'],function() {

    //Stock Routes
    Route::get('services-and-products', 'Stock\StockController@index')->name('stock.index');
    Route::post("{id}/store","Stock\StockController@product_store")->name("stock.product.store");
    Route::get("products/index_list","Stock\StockController@index_list")->name("stock.index_list");
    Route::get("products/category","Stock\StockController@category")->name("stock.product.category");
    Route::get("{id}/{type}","Stock\StockController@form")->name("stock.product.form");
    Route::post("/product/image/upload","Stock\StockController@image_upload")->name("stock.image.upload");
    Route::post("/product/image/delete","Stock\StockController@image_delete")->name("stock.image.delete");

    //Stock Search
    Route::any("/product/source","Stock\StockController@product_source")->name("stock.product.source");
    Route::get("/product/{id}/show","Stock\StockController@show")->name("stock.product.show");
    Route::delete("/product/{id}/destroy","Stock\StockController@destroy")->name("stock.product.destroy");
    Route::post("/product/new/category","Stock\StockController@new_category")->name("stock.product.new_category");
    Route::post("/product/language/","Stock\StockController@language")->name("stock.product.language");

    //Movements
    Route::get("movements","Stock\MovementsController@index")->name("stock.movements.index");
    Route::get("movements/{id}/show","Stock\MovementsController@show")->name("stock.movements.show");
    Route::get("movements/{id}/{type}/{process}","Stock\MovementsController@form")->name("stock.movements.form");
    Route::post("movements/{id}/store","Stock\MovementsController@store")->name("stock.movements.store");
    Route::get("movements//index_list","Stock\MovementsController@index_list")->name("stock.movements.index_list");
    Route::delete("movements/{id}/destroy","Stock\MovementsController@destroy")->name("stock.movements.destroy");
});
