<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/sales','middleware'=>['not.admin','permission']],function() {

    //Companies
    Route::get("customers","Companies\CompaniesController@customer")->name("sales.companies.customer");
    Route::get("customer/{id}/show","Companies\CompaniesController@show")->name("sales.companies.show");
    Route::get("customers/data/{type}","Companies\CompaniesController@customer_data")->name("sales.companies.customer.data");
    Route::get("/form/{option}/{id}/{type}","Companies\CompaniesController@form")->name("sales.companies.form");
    Route::post("customer/{id}/store","Companies\CompaniesController@store")->name("sales.companies.store");
    Route::post("customer/{id}/destroy","Companies\CompaniesController@destroy")->name("sales.companies.destroy");

    //Sales Offers
    Route::get('offers', 'Modules\Sales\OffersController@index')->name('sales.offers.index');
    Route::get("offers/index_list","Modules\Sales\OffersController@index_list")->name("sales.offers.index_list");
    Route::get("offers/form/{id}/{type}","Modules\Sales\OffersController@form")->name("sales.offers.form");
    Route::post("offers/{id}/store","Modules\Sales\OffersController@store")->name("sales.offers.store");
    Route::get("offers/{id}/show","Modules\Sales\OffersController@show")->name("sales.offers.show");
    Route::delete("offers/{id}/destroy","Modules\Sales\OffersController@destroy")->name("sales.offers.destroy");
    Route::post("offers/{id}/status-send","Modules\Sales\OffersController@status_send")->name("sales.offers.status_send");
    Route::get("offers/{id}/pdf/{type}/{lang}","Modules\Sales\OffersController@pdf")->name("sales.offers.pdf");

    //Sales Orders
    Route::get('orders', 'Modules\Sales\OrdersController@index')->name('sales.orders.index');
    Route::get('orders/index_list', 'Modules\Sales\OrdersController@index_list')->name('sales.orders.index_list');
    Route::get("orders/form/{id}/{type}","Modules\Sales\OrdersController@form")->name("sales.orders.form");
    Route::post("orders/{id}/store","Modules\Sales\OrdersController@store")->name("sales.orders.store");
    Route::get("orders/{id}/show","Modules\Sales\OrdersController@show")->name("sales.orders.show");
    Route::delete("orders/{id}/destroy","Modules\Sales\OrdersController@destroy")->name("sales.orders.destroy");
    Route::get("orders/{id}/pdf/{type}/{lang}","Modules\Sales\OrdersController@pdf")->name("sales.orders.pdf");

    //Sales Orders -> Waybill
    Route::post("orders/waybill-add","Modules\Sales\OrdersController@waybill_add")->name("sales.waybill.add");
    Route::get("orders/waybill-print/{id}","Modules\Sales\OrdersController@waybill_print")->name("sales.waybill.print");
    Route::post("orders/waybill-delete/{id}","Modules\Sales\OrdersController@waybill_delete")->name("sales.waybill.delete");

    //Sales Orders -> Invoice
    Route::post("orders/invoice-add/{id}","Modules\Sales\OrdersController@invoice_add")->name("sales.invoice.add");
    Route::get("orders/invoice-print/{id}","Modules\Sales\OrdersController@invoice_print")->name("sales.invoice.print");
    Route::post("orders/invoice-delete/{id}","Modules\Sales\OrdersController@invoice_delete")->name("sales.invoice.delete");

    //Sales Order -> Transfers
    Route::get("/orders/transfer/{id}/list","Modules\Sales\OrdersController@transfer_list")->name("sales.transfer.list");
    Route::post("/orders/transfer/{id}/add","Modules\Sales\OrdersController@transfer_add")->name("sales.transfer.add");
    Route::post("/orders/transfer/delete","Modules\Sales\OrdersController@transfer_delete")->name("sales.transfer.delete");


    //Sales Orders -> Sales Report
    Route::get("/reports/sales-report","Modules\Sales\SalesReportController@index")->name("sales.sales_report.index");
    Route::post("/reports/payment-pies/data","Modules\Sales\SalesReportController@pies_data")->name("sales.pies.data");

    //Sales Orders-> Collect Reports
    Route::get("/reports/collect-reports","Modules\Sales\CollectReportController@index")->name("sales.collect_report.index");
    Route::get("/reports/collect-reports/pdf/{type}/{lang}","Modules\Sales\CollectReportController@pdf")->name("sales.collect_report.pdf");

    //Sales Planning
    Route::post("/orders/planning-order-send","Modules\Sales\OrdersController@order_send_planning")->name("sales.planning.send");
});
