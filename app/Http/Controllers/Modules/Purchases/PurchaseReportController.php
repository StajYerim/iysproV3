<?php

namespace App\Http\Controllers\Modules\Purchases;

use App\Companies;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Stock\Product\Category;
use App\Model\Stock\Product\Product;
use App\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PurchaseReportController extends Controller
{
    /*Sales report index*/
    public function index()
    {
        return view("modules.purchases.purchases_reports.index");
    }

    /*Sales report pies data and list*/
    public function pies_data(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start)->format("Y-m-d");
        $end = Carbon::createFromFormat('Y-m-d', $request->end)->format("Y-m-d");

        //Müşteri Etiketleri
        $customer_tags = Tags::has("companies.purchase_orders.items")
            ->whereHas("companies.purchase_orders", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->get();


        //Müşteri Etiketsizlerin Fiyatı
           $customers_sum = Companies::with('tags')
            ->doesntHave("tags")
            ->whereHas("purchase_orders", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->where("supplier", 1)
            ->where("account_id", aid())
            ->get();

        $customer_total = 0;
        foreach ($customers_sum as $sum) {
            if ($request->vat == 1) {
                $customer_total += $sum->purchase_orders()->sum("exchange_total");
            } else {
                $customer_total += $sum->purchase_orders()->sum("exchange_sub_total");
            }
        }

        //Fatura Etiketleri
        $order_tags = Tags::has("purchase_orders.items")
            ->whereHas("purchase_orders", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->get();

        // Fatura Etiketsizlerin -> Fiyatları
        if ($request->vat == 1) {
            $sales_orders_sum = PurchaseOrders::with('tags')
                ->doesntHave("tags")
                ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
                ->where("account_id", aid())
                ->sum("exchange_total");
        } else {
            $sales_orders_sum = PurchaseOrders::with('tags')
                ->doesntHave("tags")
                ->where("account_id", aid())
                ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
                ->sum("exchange_sub_total");
        }

        //Ürün Kategorileri
        $categories = Category::with("products.porder_items")
            ->has("products.porder_items.order")
            ->whereHas("products.porder_items.order", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->where("account_id", aid())
            ->get();

        //Ürün Kategorisiz Fiyatları
          $products = Product::where("account_id", aid())
            ->doesntHave("category")
            ->whereHas("porder_items.order", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->withCount([
                'porder_items as total' => function ($query) {
                    $query->select(DB::raw("SUM(total) as total"));
                }
            ])
            ->withCount([
                'porder_items as not_kdv' => function ($query) {
                    $query->select(DB::raw("SUM(quantity*price) as total"));
                }
            ])
            ->get();

        $product_total = 0;

        foreach ($products as $product) {
            if ($request->vat == 1) {
                $product_total += ($product->total);
            } else {
                $product_total += ($product->not_kdv);
            }
        }


        //Purchase ORDERS
        $labels_tag = array();
        $data_tag = array();
        $backgroundColor_tag = array();
        foreach ($order_tags as $tag) {
            if ($tag->purchase_orders_amount != "0,00") {
                array_push($labels_tag, $tag->title);
                if ($request->vat == 1) {
                    array_push($data_tag, (double)money_db_format($tag->purchase_orders_amount));
                } else {
                    array_push($data_tag, (double)money_db_format($tag->purchase_orders_amount_safe));
                }
                array_push($backgroundColor_tag, $tag->bg_color);
            }
        }

        if (money_db_format($sales_orders_sum) != 0) {
            array_push($labels_tag, "KATEGORİSİZ");
            array_push($data_tag, (double)$sales_orders_sum);
            array_push($backgroundColor_tag, "#999");
        }

        $dataset["orders"]["labels"] = $labels_tag;
        $dataset["orders"]["data"] = $data_tag;
        $dataset["orders"]["bgcolor"] = $backgroundColor_tag;
        //SALES ORDERS

        //CUSTOMER TAGS
        $labels_tag_customer = array();
        $data_tag_customer = array();
        $backgroundColor_tag_customer = array();
        foreach ($customer_tags as $company_tag) {
            if (money_db_format($company_tag->companies_purchase_amount) != 0) {
                array_push($labels_tag_customer, $company_tag->title);
                if ($request->vat == 1) {
                    array_push($data_tag_customer, (double)($company_tag->companies_purchase_amount));
                } else {
                    array_push($data_tag_customer, (double)($company_tag->companies_purchase_amount_safe));
                }
                array_push($backgroundColor_tag_customer, $company_tag->bg_color);
            }

        }

        if (money_db_format($customer_total)) {
            array_push($labels_tag_customer, "KATEGORİSİZ");
            array_push($data_tag_customer, (double)($customer_total));
            array_push($backgroundColor_tag_customer, "#999");
        }

        $dataset["customers"]["labels"] = $labels_tag_customer;
        $dataset["customers"]["data"] = $data_tag_customer;
        $dataset["customers"]["bgcolor"] = $backgroundColor_tag_customer;
        //CUSTOMER TAGS

        //CATEGORY PRODUCT
        $labels_tag_product = array();
        $data_tag_product = array();
        $backgroundColor_tag_product = array();
        foreach ($categories as $category) {

            array_push($labels_tag_product, $category->name);
            if ($request->vat == 1) {
                array_push($data_tag_product,(double) money_db_format($category->total_purchase_order));
            } else {
                array_push($data_tag_product, (double)money_db_format($category->total_purchase_order_safe));
            }
            array_push($backgroundColor_tag_product, $category->color);

        }

        if (money_db_format($product_total) != 0) {
            array_push($labels_tag_product, "KATEGORİSİZ");
            array_push($data_tag_product, (double)$product_total);
            array_push($backgroundColor_tag_product, "#999");
        }

        $dataset["products"]["labels"] = $labels_tag_product;
        $dataset["products"]["data"] = $data_tag_product;
        $dataset["products"]["bgcolor"] = $backgroundColor_tag_product;

        // CATEGORY PRODUCT

        //SALES ORDER LİST
        $sales_order_list = PurchaseOrders::with("company")->where("account_id", aid())
            ->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end])
            ->get();

        $dataset["sales_order_list"] = $sales_order_list;

        // CUSTOMER LİST
        $dataset["customer_order_list"] = $sales_order_list->groupBy("company_id");


        //Product List
        $product_list = Product::with("named")->with("unit")->withCount([
            'porder_items as total_quantity' => function ($query) {
                $query->select(DB::raw("SUM(quantity) as quantity"));
            }
        ])
            ->withCount([
                'porder_items as total_amount' => function ($query) {
                    $query->select(DB::raw("SUM(total) as total_amount"));
                }
            ])
            ->has("porder_items")
            ->whereHas("porder_items.order", function ($query) use ($start, $end) {
                $query->whereBetween(DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start, $end]);
            })
            ->get();

        $dataset["product_list"] = $product_list;

        return $dataset;


    }
}
