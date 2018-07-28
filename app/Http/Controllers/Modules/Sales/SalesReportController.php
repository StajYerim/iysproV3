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

                $product->order_items()->sum("price") * $product->order_items()->sum("quantity");
            }
        }


        return view("modules.sales.sales_reports.index",
            compact(
                "kategoriler","tags","companies","company_tags",'product_dont_category','products',"sales_orders"
            ));
    }


    public function pies_data(Request $request)
    {

        $tags = Tags::All();
        $categories = Category::where("account_id", aid())->get();
        $sales_orders_sum = SalesOrders::with('tags')->doesntHave("tags")->where("account_id", aid())->sum("grand_total");
        $customers_sum = Companies::with('tags')
            ->doesntHave("tags")
            ->where("customer", 1)
            ->where("account_id", aid())
            ->get();

        $products = Product::where("account_id", aid())->doesntHave("category")->get();
        $product_total = 0;
        foreach ($products as $product) {
            $product_total = $product->order_items()->sum("quantity") * $product->order_items()->sum("price");

            $product_total = $product_total + $product_total * ($product->order_items()->sum("vat") / 100);
        }


        $customer_total = 0;
        foreach ($customers_sum as $sum) {
            $customer_total += $sum->sales_orders()->sum("grand_total");
        }

        $labels_tag = array();
        $data_tag = array();
        $backgroundColor_tag = array();
        foreach ($tags->where("type", "sales_orders") as $tag) {
            if ($tag->sales_orders_amount != "0,00") {
                array_push($labels_tag, $tag->title);
                if ($request->vat == 1) {
                    array_push($data_tag, money_db_format($tag->sales_orders_amount));
                } else {
                    array_push($data_tag, money_db_format($tag->sales_orders_amount_safe));
                }
                array_push($backgroundColor_tag, $tag->bg_color);
            }
        }

        if (money_db_format($sales_orders_sum) != 0) {
            array_push($labels_tag, "KATEGORİSİZ");
            array_push($data_tag, money_db_format($sales_orders_sum));
            array_push($backgroundColor_tag, "#999");
        }

        $dataset["orders"]["labels"] = $labels_tag;
        $dataset["orders"]["data"] = $data_tag;
        $dataset["orders"]["bgcolor"] = $backgroundColor_tag;


        //CUSTOMER TAGS
        $labels_tag_customer = array();
        $data_tag_customer = array();
        $backgroundColor_tag_customer = array();
        foreach ($tags->where("type", "companies") as $company_tag) {
            if (money_db_format($company_tag->companies_amount) != 0) {
                array_push($labels_tag_customer, $company_tag->title);
                if ($request->vat == 1) {
                    array_push($data_tag_customer, money_db_format($company_tag->companies_amount));
                } else {
                    array_push($data_tag_customer, money_db_format($company_tag->companies_amount_safe));
                }
                array_push($backgroundColor_tag_customer, $company_tag->bg_color);
            }

        }
        if (money_db_format($customer_total)) {
            array_push($labels_tag_customer, "KATEGORİSİZ");
            array_push($data_tag_customer, money_db_format($customer_total));
            array_push($backgroundColor_tag_customer, "#999");
        }
        $dataset["customers"]["labels"] = $labels_tag_customer;
        $dataset["customers"]["data"] = $data_tag_customer;
        $dataset["customers"]["bgcolor"] = $backgroundColor_tag_customer;


        $labels_tag_product = array();
        $data_tag_product = array();
        $backgroundColor_tag_product = array();
        foreach ($categories as $category) {
            if (money_db_format($category->total_order_safe) != 0) {
                array_push($labels_tag_product, $category->name);
                if ($request->vat == 1) {
                    array_push($data_tag_product, money_db_format($category->total_order));
                } else {
                    array_push($data_tag_product, money_db_format($category->total_order_safe));
                }
                array_push($backgroundColor_tag_product, $category->color);
            }

        }
        if (money_db_format($product_total) != 0) {
            array_push($labels_tag_product, "KATEGORİSİZ");
            array_push($data_tag_product, money_db_format($product_total));
            array_push($backgroundColor_tag_product, "#999");
        }
        $dataset["products"]["labels"] = $labels_tag_product;
        $dataset["products"]["data"] = $data_tag_product;
        $dataset["products"]["bgcolor"] = $backgroundColor_tag_product;


        return $dataset;


    }
}
