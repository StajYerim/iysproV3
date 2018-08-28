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

    /*Sales report pies data and list*/
    public function pies_data(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start)->format("Y-m-d");
        $end = Carbon::createFromFormat('Y-m-d', $request->end)->format("Y-m-d");



        //Fatura Etiketleri
        $order_tags = Tags::has("expenses_tags")->where("account_id",aid())
            ->whereHas("expenses_tags", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->get();

        // Fatura Etiketsizlerin -> Fiyatları

            $sales_orders_sum = Expenses::with('tags')
                ->doesntHave("tags")
                ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
                ->where("account_id", aid())
                ->sum("amount");



        //SALES ORDERS
        $labels_tag = array();
        $data_tag = array();
        $backgroundColor_tag = array();
        foreach ($order_tags as $tag) {
            if ($tag->expenses_tags[0]["amount"] != "0,00") {
                array_push($labels_tag, $tag->title);

                    array_push($data_tag, (double)money_db_format($tag->expenses_tags[0]["amount"]));

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
        //SALES ORDERS



        //SALES ORDER LİST
        $sales_order_list = Expenses::where("account_id", aid())
            ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
            ->get();

        $dataset["expenses_list"] = $sales_order_list;


        return $dataset;


    }
}
