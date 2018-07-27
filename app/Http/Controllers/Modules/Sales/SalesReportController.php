<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Companies;
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

        $kategoriler = Category::where("account_id",aid())->get();
        $tags = Tags::where("type","sales_orders")->get();
        $company_tags = Tags::where("type","companies")->get();

        $products = Product::where("account_id",aid())->get();

        $companies = Companies::where("account_id",aid())->where("type","companies")->get();


        $product_dont_category = 0;
        foreach($products as $product){


            if($product->category == null){

                return  $product->order_items()->sum("price")*$product->order_items()->sum("quantity");
            }
        }


        return view("modules.sales.sales_reports.index",compact("kategoriler","tags","companies","company_tags",'product_dont_category','products'));
    }
}
