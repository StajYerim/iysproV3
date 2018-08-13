<?php

namespace App\Http\Controllers\Modules\Production;

use App\Model\Sales\SalesOrders;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {

        return view('modules.production.orders.index');
    }

    public function index_list()
    {

        $orders = SalesOrders::with("company")->select("sales_orders.*")->where("account_id", aid())->get();

        return Datatables::of($orders)
            ->setRowAttr([
                'onclick' => function ($orders) {
                    return "product_update($orders->id)";
                },
            ])->editColumn('company_area',function($orders){
                $tags_span = "";
                foreach($orders->tags as $tag) {
                    $tags_span .= "<span class='badge' style='background-color:".$tag["bg_color"]."' > ".$tag["title"]."</span >";
                }
                return $orders["company"]["company_name"]." ".$tags_span."<br>".$orders->description;
            })
            ->editColumn('date',function($orders){
                return $orders->date."<br>".$orders->due_date;
            })
            ->editColumn('grand_total',function($orders){

                return $orders->grand_total."<br>".get_money(money_db_format($orders->grand_total)-money_db_format($orders->remaining));
            })
            ->editColumn('sub_total',function($orders){

                return $orders->order_planning["status_label"];

            })
            ->rawColumns(["grand_total", "status","company_area",'sub_total',"date"])
            ->setRowClass("row-title")
            ->make(true);
    }
}
