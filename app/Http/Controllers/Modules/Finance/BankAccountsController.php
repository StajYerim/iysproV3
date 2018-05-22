<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Http\Controllers\Controller;
use App\Model\Finance\BankAccounts;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    public function index()
    {
        return view("modules.finance.accounts.index");
    }

    public function index_list()
    {

        $accounts = BankAccounts::select("bank_accounts.*")->where("account_id", aid());

        return Datatables::of($accounts)
            ->setRowAttr([
                'onclick' => function ($account) {
                    return "product_update($account->id)";
                },
            ])
            ->setRowClass("row-title")
            ->make(true);
    }

    public function form($aid, $id, $type, $form_type)
    {
        $account = $form_type != "new" ? BankAccounts::find($id) : "";
        return view("modules.finance.accounts.form", compact("form_type", "type", "account"));
    }

    public function store($aid, $id, Request $request)
    {

        $account = BankAccounts::updateOrCreate(["id" => $id],
            [
                "name" => $request->name,
                "currency" => $request->currency,
                "bank_name" => $request->bank_name,
                "bank_branch" => $request->bank_branch,
                "bank_no" => $request->bank_no,
                "bank_iban" => $request->bank_iban,
                "type" => $request->type,
                "cheque" => $request->cheque
            ]
        );

        flash()->overlay($id == 0 ? "New account added" : "Account updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $account->id];

    }

    public function show($aid, $id)
    {
        $account = BankAccounts::find($id);
        return view("modules.finance.accounts.show",compact("account"));
    }

}
