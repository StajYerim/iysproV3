<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/finance','middleware'=>'not.admin'],function() {

    Route::get("accounts","Modules\Finance\BankAccountsController@index")->name("finance.accounts.index");
    Route::get("accounts/index/list","Modules\Finance\BankAccountsController@index_list")->name("finance.accounts.index_list");
    Route::get("accounts/{id}/{type}/{form}","Modules\Finance\BankAccountsController@form")->name("finance.accounts.form");
    Route::post("accounts/{id}/store","Modules\Finance\BankAccountsController@store")->name("finance.accounts.store");
    Route::get("accounts/{id}/show","Modules\Finance\BankAccountsController@show")->name("finance.accounts.show");

});
