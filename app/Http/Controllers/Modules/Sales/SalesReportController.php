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

        $company_tags = Tags::where("type","sales_orders")->where("type","companies")->get();

        $products = Product::where("account_id",aid())->get();

        $companies = Companies::where("account_id",aid())->where("customer",1)->get();

        $sales_orders = SalesOrders::where("account_id",aid())->get();

        $product_dont_category = 0;

        foreach($products as $product){


            if($product->category == null){

                return  $product->order_items()->sum("price")*$product->order_items()->sum("quantity");
            }
        }


        return view("modules.sales.sales_reports.index",
            compact(
                "kategoriler","tags","companies","company_tags",'product_dont_category','products',"sales_orders"
            ));
    }


    public function pies_data()
    {

        $tags = Tags::where("type", "sales_orders")->get();
        $company_tags = Tags::where("type","companies")->where("type","companies")->get();
        $categories = Category::where("account_id",aid())->get();


        $labels_tag = array();
        $data_tag = array();
        $backgroundColor_tag = array();
        foreach ($tags as $tag) {
            if ($tag->sales_orders_amount != "0,00") {
                array_push($labels_tag, $tag->title);
                array_push($data_tag, money_db_format($tag->sales_orders_amount));
                array_push($backgroundColor_tag, $tag->bg_color);
            }
        }

        $dataset["orders"]["labels"] = $labels_tag;
        $dataset["orders"]["data"] = $data_tag;
        $dataset["orders"]["bgcolor"] = $backgroundColor_tag;


        $labels_tag_customer = array();
        $data_tag_customer = array();
        $backgroundColor_tag_customer = array();
        foreach($company_tags as $company_tag)
        {
            array_push($labels_tag_customer, $company_tag->title);
            array_push($data_tag_customer, money_db_format($company_tag->companies_amount));
            array_push($backgroundColor_tag_customer, $company_tag->bg_color);


        }

        $dataset["customers"]["labels"] = $labels_tag_customer;
        $dataset["customers"]["data"] = $data_tag_customer;
        $dataset["customers"]["bgcolor"] = $backgroundColor_tag_customer;


        $labels_tag_product = array();
        $data_tag_product = array();
        $backgroundColor_tag_product = array();
        foreach($categories as $category)
        {
            if($category->totalOrder != "0"){
            array_push($labels_tag_product, $category->name);
            array_push($data_tag_product, money_db_format($category->totalOrder));
            array_push($backgroundColor_tag_product, $category->color);
            }

        }

        $dataset["products"]["labels"] = $labels_tag_product;
        $dataset["products"]["data"] = $data_tag_product;
        $dataset["products"]["bgcolor"] = $backgroundColor_tag_product;




        return $dataset;


    }
}
