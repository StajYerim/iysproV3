<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Model\Finance\BankAccounts;

use App\Model\Finance\BankItems;
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
            ->editColumn("balance", function ($account) {
                return $account->balance;
            })
            ->setRowClass("row-title")
            ->make(true);
    }

    public function form($aid, $id, $type, $form_type)
    {
        $account = $form_type != "new" ? BankAccounts::find($id) : "";
        $currency = Currency::All();
        return view("modules.finance.accounts.form", compact("form_type", "type", "account", "id", "currency"));
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

        if (money_db_format($request->item["start_balance"]) > 0) {
            $account->items()->save(new BankItems([
                "type" => "start_balance",
                "date" => $request->item["start_date"],
                "amount" => $request->item["start_balance"],
                "description" => "Hesap Açılış Bakiyesi",
                "action_type" => 1
            ]));
        }

        flash()->overlay($id == 0 ? "New account added" : "Account updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $account->id];

    }

    public function show($aid, $id)
    {
        $account = BankAccounts::find($id);
        $accounts = BankAccounts::whereNotIn("id", [$id])->get();
        return view("modules.finance.accounts.show", compact("account", "accounts"));
    }

    public function items($aid, $id)
    {
        $account = BankAccounts::find($id);
        $results = array();

        $last_balance = 0;
        foreach ($account->items as $item) {
            if ($item->action_type == 0) {
                $last_balance = $last_balance - money_db_format($item->amount);
            } else {
                $last_balance = $last_balance + money_db_format($item->amount);
            }


            $results[] =
                array(
                    "type" => $item->type,
                    "date" => $item->date,
                    "description" => $item->description,
                    "action_type" => $item->action_type == 0 ? "-" : "+",
                    "amount" => $item->amount,
                    "contact" => $item->contact,
                    "last_balance" => get_money($last_balance)
                );
        }

        return $results;
    }

    public function transaction($aid, $id, Request $request)
    {
        $account = BankAccounts::find($id);
        $doc_id = null;
        switch ($request->type) {
            case 0:

                $type = 0;
                $type_name = "money_out";
                break;
            case 1:

                $type = 1;
                $type_name = "money_in";

                break;
            case 3:
                $type = 0;
                $type_name = "account_transfer";
                $doc_id = $request->bank_account_id;
                $transfer_account = BankAccounts::find($request->bank_account_id);
                $transfer_account->items()->save(new BankItems([
                    "type" => $type_name,
                    "date" => $request->date,
                    "amount" => $request->amount,
                    "description" => $request->description,
                    "action_type" => 1,
                    "doc_id" => $id
                ]));
        }

        $last_balance = $account->items()->orderBy("id", "DESC")->first();


        $detay = $account->items()->save(new BankItems([
            "type" => $type_name,
            "date" => $request->date,
            "amount" => $request->amount,
            "description" => $request->description,
            "action_type" => $type,
            "doc_id" => $doc_id
        ]));


        sleep(1);
        $detay["balance"] = $account->balance;
        $detay["last_balance"] = $last_balance == null ? $request->amount : get_money(money_db_format($last_balance->amount) + money_db_format($request->amount));
        return $detay;

    }

}
