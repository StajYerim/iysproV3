<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Model\Finance\BankAccounts;
use App\Model\Finance\BankItems;
use App\Model\Finance\Expenses;
use App\Taggable;
use App\Tags;
use phpDocumentor\Reflection\DocBlock\Tag;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpensesController extends Controller
{
    public function index()
    {
        $accounts = BankAccounts::where("account_id",aid())->get();
        $tags = Tags::where("type", "expenses")->get();
        return view("modules.finance.expenses.index", compact("accounts", "tags"));
    }

    public function index_list()
    {

        $expenses = Expenses::with("tags", "bank_item", "bank_item.bank_account")->select("expenses.*")->where("account_id", aid());

        return Datatables::of($expenses)
            ->editColumn("balance", function ($expense) {
                return $expense->balance;
            })
            ->editColumn("date", function ($expense) {
                return $expense->bank_item["date"];
            })
            ->setRowClass("row-title")
            ->make(true);
    }

    public function store($aid, $id, Request $request)
    {


        $expense = Expenses::updateOrCreate(["id" => $request->id],
            [
                "name" => $request->name,
                "description" => $request->description,
                "date" => $request->date,
                "amount" => $request->amount,
                "bank_account_id" => $request->bank_account_id
            ]
        );

        Taggable::where("taggable_type","App\Model\Finance\Expenses")->where("taggable_id",$expense->id)->delete();

        if ($request->tagsd) {

            foreach ($request->tagsd as $tag) {
                $tag = Tags::firstOrCreate(["account_id"=>aid(),"type"=>"expenses","title"=>$tag["text"]], ["type" => "expenses", "bg_color" => rand_color()]);
                $expense->tags()->save($tag);

            }
        }

        if ($request->amount > 0) {
            BankItems::updateOrcreate(["id"=>$expense->bank_item["id"]],[
                "bank_account_id" => $request->bank_account_id,
                "type" => "expenses",
                "date" => $request->date,
                "doc_id" => $expense->id,
                "amount" => $request->amount,
                "description" => "GİDER FİŞİ ÖDEMESİ",
                "action_type" => 0,

            ]);
        }

        flash()->overlay("Expense Add", 'Success')->success();

        return ["message" => "success", 'type' => "expense"];

    }

    public function row_info($aid, Request $request)
    {

        $expenses = Expenses::find($request->id);

        $data["data"] = $expenses;

        if ($expenses->tags != "[]"){
            foreach ($expenses->tags as $tag) {
                $tagd[] = Array("id"=>$tag->id,"text" => $tag->title, "style" => "background-color:" . $tag->bg_color . "");

            }
        $data["data"]["tagsd"] = $tagd;
    }




        return $data["data"];

    }
}
