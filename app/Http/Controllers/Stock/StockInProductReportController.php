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
        $purchase_price = 0;
        $sales_price= 0;

        foreach(Product::where("account_id",aid())->get() as $product)
        {
            if($product->stock_count != 0 && $product->stock_count > 0)
            {
                $purchase_price +=   money_db_format($product->buying_price);
                $sales_price +=   money_db_format($product->list_price);
            }


        }



        $potantial_price = $sales_price - $purchase_price;
        $products = Product::with("purchase_currency","sales_currency","porder","stock_receipts","named", "category")->select("products.*")->where("account_id", aid())->get();

        return view("modules.stock.stock_in_report.index",compact('sales_price','purchase_price','potantial_price','products'));
    }
}
