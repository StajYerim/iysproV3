<?php

namespace App\Http\Controllers\Stock;

use App\Model\Stock\Product\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockInProductReportController extends Controller
{
    public function index()
    {
        $purchase_price  = Product::select('products.buying_price')->where('account_id',aid())->sum('buying_price');
        $sales_price     = Product::select('products.list_price')->where('account_id',aid())->sum('list_price');
        $potantial_price = $sales_price - $purchase_price;
        return view("modules.stock.stock_in_report.index",compact('sales_price','purchase_price','potantial_price'));
    }

    public function index_list()
    {
        $products = Product::with("stock_receipts","named", "category")->select("products.*")->where("account_id", aid());


        return Datatables::of($products)
            ->setRowAttr([
                'onclick' => function ($product) {
                    return "product_update($product->id)";
                },
            ])
            ->editColumn("named.name",function($product){
                return $product->named["name"]." <span class='badge' style='background-color:".$product->category["color"]."'>".$product->category["name"]."</span><span class='badge' style='background-color:success'>".$product->type_name."</span>";

            })
            ->editColumn("inventory_tracking",function($product){

                if($product->type_id == 1 or $product->type_id == 4){
                    return $product->stock_count."/- ".$product->unit["short_name"];
                }else{
                    return $product->stock_count."/".$product->order_count." ".$product->unit["short_name"];
                }

            })
            ->rawColumns(["id","named.name"])
            ->setRowClass("row-title")
            ->make(true);
    }
}
