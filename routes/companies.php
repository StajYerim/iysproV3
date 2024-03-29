<?php
use Illuminate\Support\Facades\Auth;

Auth::routes();


// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/companies','middleware'=>'not.admin'],function() {

    //Companies Source
    Route::any("/companies/source","Companies\CompaniesController@company_source")->name("company.source");
    Route::get("/companies/{id}/{type}","Companies\CompaniesController@quick_form")->name("company.quick.form");
    Route::post("/companies/{id}/store","Companies\CompaniesController@quick_company")->name("company.quick.store");

    Route::post("{id}/items","Companies\CompaniesController@items")->name("company.items");

    //Companies summary
    Route::get("/companies/account-summary/{id}/{type}","Companies\CompaniesController@summary_pdf")->name("company.summary.pdf");


    //Datatable lang url
    Route::get("/datatable/lang","GeneralController@datatable_lang")->name("general.datatable.lang");


});
