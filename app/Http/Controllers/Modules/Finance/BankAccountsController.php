<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Bankabble;
use App\Companies;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Model\Finance\BankAccounts;

use App\Model\Finance\BankItems;
use App\Model\Finance\Cheques;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
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
        $accounts = BankAccounts::where("account_id", aid())->whereNotIn("id", [$id])->get();
        return view("modules.finance.accounts.show", compact("account", "accounts"));
    }

    public function receipt($aid, $id)
    {
        $receipt = BankItems::find($id);

        return view("modules.finance.accounts.receipt", compact("receipt"));
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
                    "id" => $item->id,
                    "type" => $item->type,
                    "company" => $item->company["company_name"],
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

    public function global_transaction($aid, Request $request)
    {

        $account = BankAccounts::find($request->bank_account_id);

        $orders = SalesOrders::find($request->doc_id);

        $detail = $account->items()->save(new BankItems([
            "type" => $request->type,
            "company_id" => $orders->company["id"],
            "date" => $request->date,
            "amount" => $request->amount,
            "description" => $request->description,
            "action_type" => 1,
            "doc_id" => null
        ]));


        Bankabble::create([
            "bank_items_id" => $detail->id,
            "bankabble_id" => $request->doc_id,
            "bankabble_type" => $request->bankabble_type,
            "amount" => $request->amount]);

        $able = Bankabble::where("bankabble_id", $request->doc_id)->where("bankabble_type", $request->bankabble_type)->sum("amount");


        $remaining = $orders->remaining;

        $action = array("id" => $detail->id, "bank_account" => $account->name, "amount" => $detail->amount, "date" => $detail->date);
        return ["message" => "success", "remaining" => $remaining, "collect_items" => $action];


    }

    public function transaction_payment($aid, Request $request)
    {

        $account = BankAccounts::find($request->bank_account_id);

        $orders = PurchaseOrders::find($request->doc_id);

        $detail = $account->items()->save(new BankItems([
            "type" => $request->type,
            "company_id" => $orders->company["id"],
            "date" => $request->date,
            "amount" => $request->amount,
            "description" => $request->description,
            "action_type" => 0,
            "doc_id" => null
        ]));


        Bankabble::create([
            "bank_items_id" => $detail->id,
            "bankabble_id" => $request->doc_id,
            "bankabble_type" => $request->bankabble_type,
            "amount" => $request->amount]);

        $able = Bankabble::where("bankabble_id", $request->doc_id)->where("bankabble_type", $request->bankabble_type)->sum("amount");


        $remaining = $orders->remaining;

        $action = array("id" => $detail->id, "bank_account" => $account->name, "amount" => $detail->amount, "date" => $detail->date);
        return ["message" => "success", "remaining" => $remaining, "collect_items" => $action];


    }

    public function transaction_company($aid, Request $request)
    {

        if ($request->type == "collect") {

            $company = Companies::find($request->doc_id);
            $account = BankAccounts::find($request->bank_account_id);

            $detail = $account->items()->save(new BankItems([
                "type" => $request->type,
                "company_id" => $company->id,
                "date" => $request->date,
                "amount" => $request->amount,
                "description" => $request->description,
                "action_type" => 1,
                "doc_id" => null
            ]));

            $tahsilat_tutari = money_db_format($detail->amount);


            foreach ($company->open_orders as $order) {

                //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit ise her halükarda
                //Faturanın toplam tutarı ödenmiş sayılacak.
                if ($tahsilat_tutari >= money_db_format($order->remaining)) {

                    Bankabble::create([
                        "bank_items_id" => $detail->id,
                        "bankabble_type" => "App\Model\Sales\SalesOrders",
                        "bankabble_id" => $order->id,
                        "amount" => $order->remaining,
                    ]);

                    $tahsilat_tutari -= money_db_format($order->remaining);

                } else {

                    //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit değil ise altındadır.
                    //Bu nedenle çek tutarı ne kadar ise o kadarı bu fatura için ödenecektir.
                    Bankabble::create([
                        "bank_items_id" => $detail->id,
                        "bankabble_type" => "App\Model\Sales\SalesOrders",
                        "bankabble_id" => $order->id,
                        "amount" => get_money($tahsilat_tutari),
                    ]);
                    break;

                }

            }

            return ["message" => "success", "remaining" => $company->balance];


        }
        else if ($request->type == "cheque_collect") {

            $company = Companies::find($request->company_id);

            $cheq = Cheques::create([
                "account_id" => aid(),
                "company_id" => $company->id,
                "type" => $request->doc_type,
                "description" => $request->description,
                "document_no" => $request->number,
                "bank_name" => $request->bank_name,
                "bank_branch" => $request->branch_name,
                "date" => $request->date,
                "payment_date" => $request->payment_date,
                "amount" => $request->amount,
                "status" => 0
            ]);

            $cek_tutari = money_db_format($cheq->amount);

            foreach ($company->open_orders as $order) {
                //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit ise her halükarda
                //Faturanın toplam tutarı ödenmiş sayılacak.

                if ($cek_tutari >= money_db_format($order->remaining)) {

                    Bankabble::create([
                        "cheques_id" => $cheq->id,
                        "bankabble_type" => "App\Model\Sales\SalesOrders",
                        "bankabble_id" => $order->id,
                        "amount" => $order->remaining,
                    ]);
                    $cek_tutari -= money_db_format($order->remaining);

                } else {
                    //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit değil ise altındadır.
                    //Bu nedenle çek tutarı ne kadar ise o kadarı bu fatura için ödenecektir.
                    Bankabble::create([
                        "cheques_id" => $cheq->id,
                        "bankabble_type" => "App\Model\Sales\SalesOrders",
                        "bankabble_id" => $order->id,
                        "amount" => get_money($cek_tutari),
                    ]);
                    break;

                }

            }

            return ["message" => "success", "remaining" => $company->balance];

        }
        else if($request->type == "payment"){
            //Firmaya yapılan ödeme
            $company = Companies::find($request->doc_id);
            $account = BankAccounts::find($request->bank_account_id);

            $detail = $account->items()->save(new BankItems([
                "type" => $request->type,
                "company_id" => $company->id,
                "date" => $request->date,
                "amount" => $request->amount,
                "description" => $request->description,
                "action_type" => 0,
                "doc_id" => null
            ]));

            $odeme_tutari = money_db_format($detail->amount);


            foreach ($company->popen_orders as $order) {

                //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit ise her halükarda
                //Faturanın toplam tutarı ödenmiş sayılacak.
                if ($odeme_tutari >= money_db_format($order->remaining)) {

                    Bankabble::create([
                        "bank_items_id" => $detail->id,
                        "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                        "bankabble_id" => $order->id,
                        "amount" => $order->remaining,
                    ]);

                    $odeme_tutari -= money_db_format($order->remaining);

                } else {

                    //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit değil ise altındadır.
                    //Bu nedenle çek tutarı ne kadar ise o kadarı bu fatura için ödenecektir.
                    Bankabble::create([
                        "bank_items_id" => $detail->id,
                        "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                        "bankabble_id" => $order->id,
                        "amount" => get_money($odeme_tutari),
                    ]);

                    break;

                }

            }

            return ["message" => "success", "remaining" => $company->balance];

        }
        else if($request->type =="cheque_payment"){


            $company = Companies::find($request->company_id);

            if($request->cheque_type  == 0){

                $cheq = Cheques::create([
                "account_id" => aid(),
                "bank_id" => $request->cheque_bank_id,
                "transfer_company_id" => $company->id,
                "type" => 0,
                "date" => $request->date,
                "payment_date" => $request->payment_date,
                "amount" => $request->amount,
                "status" => 2
            ]);

                $cek_tutari = money_db_format($cheq->amount);

                foreach ($company->popen_orders as $order) {
                    //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit ise her halükarda
                    //Faturanın toplam tutarı ödenmiş sayılacak.

                    if ($cek_tutari >= money_db_format($order->remaining)) {

                        Bankabble::create([
                            "cheques_id" => $cheq->id,
                            "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                            "bankabble_id" => $order->id,
                            "amount" => $order->remaining,
                        ]);
                        $cek_tutari -= money_db_format($order->remaining);

                    } else {
                        //Çek tutarı Faturanın son bakiyesinden yüksek veya eşit değil ise altındadır.
                        //Bu nedenle çek tutarı ne kadar ise o kadarı bu fatura için ödenecektir.
                        Bankabble::create([
                            "cheques_id" => $cheq->id,
                            "bankabble_type" => "App\Model\Purchases\PurchaseOrders",
                            "bankabble_id" => $order->id,
                            "amount" => get_money($cek_tutari),
                        ]);
                        break;

                    }

                }

                return ["message" => "success", "remaining" => $company->balance];

            }else{



            }




        }


    }

    public function transaction_cheque($aid, Request $request)
    {

        $account = BankAccounts::find($request->bank_account_id);
        $cheq = Cheques::find($request->cheque_id);

        $detail = $account->items()->save(new BankItems([
            "type" => $request->type,
            "cheque_id" => $cheq->cheque_id,
            "date" => $request->date,
            "amount" => $cheq->amount,
            "action_type" => 1,
            "doc_id" => null
        ]));

        return ["message" => "success", "detail" => $detail,"bank_name"=>$account->name];


    }

    public function receipt_destroy($aid, $id)
    {
        BankItems::destroy($id);
        flash()->overlay("Account Receipt Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "account.receipt"];
    }

}
