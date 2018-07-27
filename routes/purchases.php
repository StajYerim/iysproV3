<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/purchases','middleware'=>'not.admin'],function() {




    //Companies
    Route::get("suppliers","Companies\CompaniesController@supplier")->name("purchases.companies.supplier");
    Route::get("supplier/{id}/show","Companies\CompaniesController@show")->name("purchases.companies.show");
    Route::get("supplier/data/{type}","Companies\CompaniesController@supplier_data")->name("purchases.companies.supplier.data");
    Route::get("form/{option}/{id}/{type}","Companies\CompaniesController@form")->name("purchases.companies.form");
    Route::post("supplier/{id}/store","Companies\CompaniesController@store")->name("purchases.companies.store");
    Route::post("supplier/{id}/destroy","Companies\CompaniesController@destroy")->name("purchases.companies.destroy");

//    //Sales Offers
//    Route::get('offers', 'Modules\Sales\OffersController@index')->name('sales.offers.index');
//    Route::get("offers/index_list","Modules\Sales\OffersController@index_list")->name("sales.offers.index_list");
//    Route::get("offers/form/{id}/{type}","Modules\Sales\OffersController@form")->name("sales.offers.form");
//    Route::post("{id}/store","Modules\Sales\OffersController@store")->name("sales.offers.store");
//    Route::get("offers/{id}/show","Modules\Sales\OffersController@show")->name("sales.offers.show");
//    Route::delete("offers/{id}/destroy","Modules\Sales\OffersController@destroy")->name("sales.offers.destroy");
//    Route::post("offers/{id}/status-send","Modules\Sales\OffersController@status_send")->name("sales.offers.status_send");
//
    //Purchases Orders
    Route::get('orders', 'Modules\Purchases\OrdersController@index')->name('purchases.orders.index');
    Route::get('orders/index_list', 'Modules\Purchases\OrdersController@index_list')->name('purchases.orders.index_list');
    Route::get("orders/form/{id}/{type}","Modules\Purchases\OrdersController@form")->name("purchases.orders.form");
    Route::post("orders/{id}/store","Modules\Purchases\OrdersController@store")->name("purchases.orders.store");
    Route::get("orders/{id}/show","Modules\Purchases\OrdersController@show")->name("purchases.orders.show");
    Route::delete("orders/{id}/destroy","Modules\Purchases\OrdersController@destroy")->name("purchases.orders.destroy");

    //Purcahase Payment Report
    Route::get("/reports/payment-reports","Modules\Purchases\PaymentReportController@index")->name("purchases.payment_report.index");
});
