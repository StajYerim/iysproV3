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
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    public function index()
    {
        $accounts = BankAccounts::where("account_id",aid())->get();
        $tags = Tags::where("account_id",aid())->where("type", "expenses")->get();
        return view("modules.finance.expenses.index", compact("accounts", "tags"));
    }

    public function index_list()
    {

        $expenses = Expenses::with("tags")->select(["expenses.*"])->where("account_id", aid())->get();

        return Datatables::of($expenses)
            ->editColumn("company_id", function ($expense) {
                return $expense->supplier["company_name"];
            })
            ->editColumn("date", function ($expense) {
                return $expense->date;
            })
            ->setRowAttr(['onclick' => function ($expense) {
                return 'update(' . $expense->id . ')';
            }])
            ->editColumn("bank_item", function ($expense) {
                return $expense->bank_item["bank_account"]["name"];
            })
            ->editColumn("date", function ($expense) {
                return $expense->date . "<br>" . $expense->payment_date;
            })
            ->addColumn("payment_status", function ($expense) {
                if ($expense->payment_status) {
                    return '<span class="label label-success">ÖDENDİ</span><br>'.$expense->amount." <i class='fa fa-try'></i>";
                } else {
                    return '<span class="label label-danger">ÖDENMEDİ</span><br>'.$expense->amount." <i class='fa fa-try'></i>";
                }
            })
            ->setRowClass("row-title")
            ->rawColumns(["date", "payment_status"])
            ->make(true);
    }

    public function store($aid, $id, Request $request)
    {

        $model = new Expenses();
        $validator = Validator::make($request->all(), $model->rules);

        if ($validator->fails()) {
            return view("validate_error")->withErrors($validator);
        }


        $expense = Expenses::updateOrCreate(["id" => $request->id],
            [
                "company_id" => $request->company_id["id"],
                "description" => $request->description,
                "date" => $request->date,
                "payment_date" => $request->payment_date,
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

        if ($request->pay_status == 1) {
            BankItems::updateOrcreate(["id"=>$expense->bank_item["id"]],[
                "bank_account_id" => $request->bank_account_id,
                "type" => "expenses",
                "date" => $request->payment_date,
                "doc_id" => $expense->id,
                "amount" => $request->amount,
                "description" => $request->description,
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
        $data["data"]["supplier"] = $expenses->supplier;

        if ($expenses->tags != "[]"){
            foreach ($expenses->tags as $tag) {
                $tagd[] = Array("id"=>$tag->id,"text" => $tag->title, "style" => "background-color:" . $tag->bg_color . "");

            }
        $data["data"]["tagsd"] = $tagd;
    }




        return $data["data"];

    }

    function payment_delete($aid, Request $request)
    {
     return   $delete = BankItems::where(["doc_id" => $request->id, "type" => "expenses"])->delete();
    }

    function expenses_delete($aid, Request $request)
    {
            Expenses::find($request->id)->delete();
        return   $delete = BankItems::where(["doc_id" => $request->id, "type" => "expenses"])->delete();
    }
}
