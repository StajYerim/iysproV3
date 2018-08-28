<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// If user is authenticated and he is not admin
Route::group(['prefix'=>'{company_id}/finance','middleware'=>'not.admin'],function() {

    //Accounts
    Route::get("accounts","Modules\Finance\BankAccountsController@index")->name("finance.accounts.index");
    Route::get("accounts/index/list","Modules\Finance\BankAccountsController@index_list")->name("finance.accounts.index_list");
    Route::get("accounts/{id}/{type}/{form}","Modules\Finance\BankAccountsController@form")->name("finance.accounts.form");
    Route::post("accounts/{id}/store","Modules\Finance\BankAccountsController@store")->name("finance.accounts.store");
    Route::get("accounts/{id}/show","Modules\Finance\BankAccountsController@show")->name("finance.accounts.show");
    Route::get("accounts/{id}/receipt","Modules\Finance\BankAccountsController@receipt")->name("finance.accounts.receipt");
    Route::delete("accounts/{id}/receipt-destroy","Modules\Finance\BankAccountsController@receipt_destroy")->name("finance.accounts.receipt.destroy");

    //Accounts->Transactions
    Route::post("accounts/{id}/items","Modules\Finance\BankAccountsController@items")->name("finance.accounts.items");
    Route::post("accounts/{id}/transaction","Modules\Finance\BankAccountsController@transaction")->name("finance.accounts.transaction");//Accounts to Account
    Route::post("accounts/global-transaction","Modules\Finance\BankAccountsController@global_transaction")->name("finance.accounts.global_transaction");//Orders Transaction
    Route::post("accounts/transaction-payment","Modules\Finance\BankAccountsController@transaction_payment")->name("finance.accounts.transaction_payment");//Orders Transaction
    Route::post("accounts/transaction-company","Modules\Finance\BankAccountsController@transaction_company")->name("finance.accounts.transaction_company");//Company Transaction
    Route::post("accounts/transaction-cheque","Modules\Finance\BankAccountsController@transaction_cheque")->name("finance.accounts.cheque");


    //Expenses
    Route::get("expenses","Modules\Finance\ExpensesController@index")->name("finance.expenses.index");
    Route::get("expenses/index/list","Modules\Finance\ExpensesController@index_list")->name("finance.expenses.index_list");
    Route::post("expenses/{id}/store","Modules\Finance\ExpensesController@store")->name("finance.expenses.store");
    Route::get("expenses/info","Modules\Finance\ExpensesController@row_info")->name("finance.expenses.info");
    Route::post("expenses/payment/delete","Modules\Finance\ExpensesController@payment_delete")->name("finance.expenses.payment.delete");

    //Cheques
    Route::get("cheques","Modules\Finance\ChequesController@index")->name("finance.cheques.index");
    Route::get("cheques/index/list","Modules\Finance\ChequesController@index_list")->name("finance.cheques.index_list");
    Route::get("cheques/{id}/show","Modules\Finance\ChequesController@show")->name("finance.cheques.show");
    Route::delete("cheques/{id}/destroy","Modules\Finance\ChequesController@destroy")->name("finance.cheques.destroy");

    //Vat Reports
    Route::get("vat-report","Modules\Finance\VatReportController@index")->name("finance.vat_report.index");
    Route::post("vat-report","Modules\Finance\VatReportController@month")->name("finance.vat_report.month");

    //Expenses Reports
    Route::get("/reports/expenses-report","Modules\Finance\ExpensesReportController@index")->name("finance.expenses_report.index");
    Route::post("/reports/expenses-pies/data","Modules\Finance\ExpensesReportController@pies_data")->name("finance.expenses_pies.data");

});
