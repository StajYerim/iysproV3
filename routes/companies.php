<?php
use Illuminate\Support\Facades\Auth;

Auth::routes();


// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/sales','middleware'=>'not.admin'],function() {

    //Companies
    Route::get("customers","Companies\CompaniesController@customer")->name("sales.companies.customer");
    Route::get("customer/{id}","Companies\CompaniesController@show")->name("sales.companies.show");
    Route::get("customers/data","Companies\CompaniesController@customer_data")->name("sales.companies.customer.data");
    Route::get("{option}/{id}/{type}","Companies\CompaniesController@form")->name("sales.companies.form");
    Route::post("{id}/store","Companies\CompaniesController@store")->name("sales.companies.store");
    Route::post("{id}/destroy","Companies\CompaniesController@destroy")->name("sales.companies.destroy");


    //Companies Source
    Route::any("/companies/source","Companies\CompaniesController@company_source")->name("company.source");
    Route::get("/companies/{id}/{type}","Companies\CompaniesController@quick_form")->name("company.quick.form");
    Route::post("/sales/{id}/store","Companies\CompaniesController@quick_company")->name("company.quick.store");


});
