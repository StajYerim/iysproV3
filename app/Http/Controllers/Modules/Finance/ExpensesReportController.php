<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Model\Finance\Expenses;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExpensesReportController extends Controller
{
    /*Sales report index*/
    public function index()
    {
        return view("modules.finance.expenses_reports.index");
    }


    public function pies_data(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start)->format("Y-m-d");
        $end = Carbon::createFromFormat('Y-m-d', $request->end)->format("Y-m-d");




        $order_tags = Tags::has("expenses_tags")->where("account_id",aid())
            ->whereHas("expenses_tags", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->get();


            $sales_orders_sum = Expenses::with('tags')
                ->doesntHave("tags")
                ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
                ->where("account_id", aid())
                ->sum("amount");




        $labels_tag = array();
        $data_tag = array();
        $backgroundColor_tag = array();
        foreach ($order_tags as $tag) {
            if ($tag->expenses_tags()->sum("amount") != "0,00") {
                array_push($labels_tag, $tag->title);

                    array_push($data_tag, (double)($tag->expenses_tags()->sum("amount")));

                array_push($backgroundColor_tag, $tag->bg_color);
            }
        }

        if (money_db_format($sales_orders_sum) != 0) {
            array_push($labels_tag, "KATEGORİSİZ");
            array_push($data_tag, (double)$sales_orders_sum);
            array_push($backgroundColor_tag, "#999");
        }

        $dataset["expenses"]["labels"] = $labels_tag;
        $dataset["expenses"]["data"] = $data_tag;
        $dataset["expenses"]["bgcolor"] = $backgroundColor_tag;





        $sales_order_list = Expenses::where("account_id", aid())
            ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
            ->get();

        $dataset["expenses_list"] = $sales_order_list;

        return $dataset;

    }
}
