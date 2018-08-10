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

        $products = Product::with("purchase_currency","sales_currency","porder","stock_receipts","named", "category")->select("products.*")->where("account_id", aid())->get();
        return view("modules.stock.stock_in_report.index",compact('sales_price','purchase_price','potantial_price','products'));
    }
}
