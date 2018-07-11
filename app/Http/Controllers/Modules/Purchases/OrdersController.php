<?php

namespace App\Http\Controllers\Modules\Purchases;

//use App\Model\Purchases\PurchaseOffers;
use App\Model\Purchases\PurchaseOrders;
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

        $orders = PurchaseOrders::with("company")->select("purchase_orders.*")->where("account_id", aid());

        return Datatables::of($orders)
            ->setRowAttr([
                'onclick' => function ($orders) {
                    return "product_update($orders->id)";
                },
            ])
            ->editColumn('sub_total',function($orders){
                if($orders->remaining == "0,00"){
                    return "ÖDENDİ";
                }else if($orders->remaining == $orders->grand_total){
                    return "ÖDENMEDİ";
                }else{
                    return "KISMİ ÖDENDİ";
                }
            })
            ->rawColumns(["grand_total", "status"])
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

        return view("modules.purchases.orders.form", compact("form_type", "order","copy","id","offer_id"));

    }


    public function store($aid, $id, Request $request)
    {



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


        $whereNot = Array();
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
            array_push($whereNot, $ret->id);
        }
        $order->items()->whereNotIn("id", $whereNot)->delete();


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