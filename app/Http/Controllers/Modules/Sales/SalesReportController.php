<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Model\Sales\SalesOrders;
use App\Model\Sales\SalesOrderItems;
use App\Model\Stock\Product\Category;
use App\Model\Stock\Product\Product;
use App\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesReportController extends Controller
{
    public function index()
    {
//        $total = SalesOrders::all()->sum('grand_totals');
//        $oran = money_db_format($total)/money_db_format($total)*100;
        $kategoriler = Category::all();
        $urunler = Product::all();
        $sales_order_items=SalesOrderItems::where("product_id",1)->get();
        $tags = Tags::where("type","sales_orders")->get();

        return view("modules.sales.sales_reports.index",compact("kategoriler","tags"));
    }
}
