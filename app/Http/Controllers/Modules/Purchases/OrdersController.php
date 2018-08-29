<?php

namespace App\Http\Controllers\Modules\Purchases;

//use App\Model\Purchases\PurchaseOffers;
use App\Bankabble;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Stock\Stock;
use App\Taggable;
use App\Tags;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        return view("modules.purchases.orders.index");
    }

    public function index_list()
    {

        $orders = PurchaseOrders::with("company","tags")->select("purchase_orders.*")->where("account_id", aid());

        return Datatables::of($orders)
            ->setRowAttr([
                'onclick' => function ($orders) {
                    return "product_update($orders->id)";
                },
            ])
            ->editColumn("date",function($orders){
                return $orders->date."<br>".$orders->due_date;
            })
            ->editColumn('company.company_name',function($orders){
                $tags_span = "";
                foreach($orders->tags as $tag) {
                    $tags_span .= "<span class='badge' style='background-color:".$tag["bg_color"]."' > ".$tag["title"]."</span >";
                }
             return   $orders->company["company_name"]." ".$tags_span."<br>".$orders->description;
            })
            ->editColumn("grand_total",function($orders){
                return $orders->grand_total."<br>".get_money(money_db_format($orders->grand_total)-money_db_format($orders->remaining));
            })
            ->editColumn("sub_total",function($orders){
             return   $orders->payment_label;
            })
            ->rawColumns(["grand_total", "status","company.company_name","date","sub_total"])
            ->setRowClass("row-title")
            ->make(true);
    }


    public function form($aid, $id, $type)
    {
        $form_type = $type;

        if($form_type == "offers"){
//            $order = $id == 0 ? "" : PurchaseOffers::find($id);
//            $order->due_date = $order->date;
            $order = $id == 0 ? "" : PurchaseOrders::find($id);
            $form_type = "update";
            $offer_id = $id;

            $copy = 0;

        }else{

            $order = $id == 0 ? "" : PurchaseOrders::find($id);
            $offer_id = null;
        }
        $tags = Tags::where("account_id",aid())->where("type", "purchases_orders")->get();
        return view("modules.purchases.orders.form", compact("form_type", "order","copy","id","offer_id","tags"));

    }


    public function store($aid, $id, Request $request)
    {

        //Satınalma oluştur
        $order = PurchaseOrders::updateOrCreate(["id" => $id], [
//            "sales_offer_id"=>$request->form["sales_offer_id"],
            "description" => $request->form["description"],
            "company_id" => $request->form["company_id"]["id"],
            "date" => $request->form["date"],
            "due_date" => $request->form["due_date"],
            "currency" => $request->form["currency"],
            "currency_value" => $request->form["currency_value"],
            "sub_total" => $request->form["sub_total"],
            "vat_total" => $request->form["vat_total"],
            "grand_total" => $request->form["grand_total"]
        ]);


        Taggable::where("taggable_type","App\Model\Purchases\PurchaseOrders")->where("taggable_id",$order->id)->delete();

        if ($request->form["tagsd"]) {

            foreach ($request->form["tagsd"] as $tag) {
                $tag = Tags::firstOrCreate(["account_id"=>aid(),"type"=>"purchases_orders","title"=>$tag["text"]], ["type" => "purchases_orders", "bg_color" => rand_color()]);
                $order->tags()->save($tag);

            }
        }

        //Giriş irsaliyesi fişi ->
        $movement = Stock::updateOrcreate(["doc_id"=>$order->id,"status"=>0],
            [
                "description" => $order->description,
                "receipt_id"=>2,
                "purchase_order_id"=>$order->id,
                "doc_id"=>$order->id,
                "status"=>0,
                "date"=>$order->date,
                "account_id"=>aid(),
                "company_id"=>$order->company_id
            ]
        );

        $whereNot = Array();
        $whereNots = Array();
        foreach ($request->items as $key => $value) {

            $ret = $order->items()->updateOrCreate(
                ["id" => $value["id"]],
                [
                    "product_id" => $value["product_id"],
                    "quantity" => $value["quantity"],
                    "unit_id" => $value["unit"],
                    "price" => $value["amount"],
                    "vat" => $value["vat"],
                    "total" => $value["total"],
                    "note" => isset($value["description"]) == true ? $value["description"] : ""
                ]
            );


            $set = $movement->items()->updateOrCreate(
                ["purchase_order_item_id" => $ret->id],
                [
                    "product_id" => $value["product_id"],
                    "purchase_order_item_id" => $ret->id,
                    "quantity" => $value["quantity"],
                    "unit_id" => $value["unit"],
                    "notes" => isset($value["description"]) == true ? $value["description"] : ""
                ]
            );

            array_push($whereNot, $ret->id);
            array_push($whereNots, $set->id);
        }

        $order->items()->whereNotIn("id", $whereNot)->delete();
        $movement->items()->whereNotIn("id", $whereNots)->delete();



        Bankabble::where("bankabble_id", $order->id)->where("bankabble_type", "App\Model\Purchases\PurchaseOrders")->delete();


        $order->company->open_receipts_payment_set($order->company->popen_receipts,$order->company->popen_cheques,$order);


        flash()->overlay($id == 0 ? "New Sales Order" : "Purchase Order Updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $order->id];


    }


    public function show($aid, $id)
    {
        $order = PurchaseOrders::find($id);

        return view("modules.purchases.orders.show", compact("order"));
    }

    public function destroy($aid, $id)
    {
        $sales_order = PurchaseOrders::find($id);

        $sales_order->delete();

        flash()->overlay("Purchase Order Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "order"];
    }
}
