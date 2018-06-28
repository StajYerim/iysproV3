<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Bankabble;
use App\Language;
use App\Model\Sales\SalesOffers;
use App\Model\Sales\SalesOrders;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        return view("modules.sales.orders.index");
    }

    public function index_list()
    {

        $orders = SalesOrders::with("company")->select("sales_orders.*")->where("account_id", aid());

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
            $order = $id == 0 ? "" : SalesOffers::find($id);
            $form_type = "update";
            $offer_id = $id;
            $order->due_date = $order->date;
            $copy = 0;

        }else{
            $order = $id == 0 ? "" : SalesOrders::find($id);
            $offer_id = null;
        }

        return view("modules.sales.orders.form", compact("form_type", "order","copy","id","offer_id"));

    }

    public function store($aid, $id, Request $request)
    {



        $order = SalesOrders::updateOrCreate(["id" => $id], [
            "sales_offer_id"=>$request->form["sales_offer_id"],
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
                    "termin_date" => $value["termin_date"],
                    "termin_show" => $value["termin_show"],
                    "total" => $value["total"],
                    "note" => isset($value["description"]) == true ? $value["description"] : ""
                ]
            );
            array_push($whereNot, $ret->id);
        }
        $order->items()->whereNotIn("id", $whereNot)->delete();


        $order->company->open_receipts_set($order->company->open_receipts,$order->company->open_cheques,$order);


        flash()->overlay($id == 0 ? "New Sales Order" : "Sales Order Updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $order->id];


    }

    public function show($aid, $id)
    {


        $order = SalesOrders::find($id);
        $langs = Language::All();

        return view("modules.sales.orders.show", compact("order","lang"));
    }

    public function pdf($aid, $id,$type)
    {


        if($type=="url"){
            $order = SalesOrders::find($id);
            $pdf = PDF::loadView('modules.sales.orders.pdf',compact("order"))->setPaper('A4');
            return $pdf->stream();
        }else{
            $order = SalesOrders::find($id);
            $pdf = PDF::loadView('modules.sales.orders.pdf',compact("order"))->setPaper('A4');
            return   $pdf->download($order->company["company_name"].' ('.$order->description.').pdf');
        }


    }

    public function destroy($aid, $id)
    {
        $sales_order = SalesOrders::find($id);

        $sales_order->delete();

        flash()->overlay("Sales Order Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "offer"];
    }


}
