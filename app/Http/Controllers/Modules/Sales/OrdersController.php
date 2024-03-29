<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Bankabble;
use App\Companies;
use App\Language;
use App\Mail\Share\Sales\Order;
use App\Mail\Share\Sales\Transfer;
use App\Mail\Share\Sales\Waybill;
use App\Model\Production\Production;
use App\Model\Sales\OrderWaybill;
use App\Model\Sales\SalesOffers;
use App\Model\Sales\SalesOrders;
use App\Model\Sales\SalesOrderInvoice;
use App\Model\Sales\SalesOrderItems;
use App\Model\Sales\SalesTransferInfo;
use App\Model\Sales\WaybillItems;
use App\Model\Stock\Stock;
use App\Model\Stock\StockItems;
use App\Taggable;
use App\Tags;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index()
    {
        return view("modules.sales.orders.index");
    }

    public function index_list()
    {

        $orders = SalesOrders::with("company")->select("sales_orders.*")->where("account_id", aid())->get();

        return Datatables::of($orders)
            ->setRowAttr([
                'onclick' => function ($orders) {
                    return "product_update($orders->id)";
                },
            ])->editColumn('company_area',function($orders){
                $tags_span = "";
                foreach($orders->tags as $tag) {
                    $tags_span .= "<span class='badge' style='background-color:".$tag["bg_color"]."' > ".$tag["title"]."</span >";
                }
                return $orders["company"]["company_name"]." ".$tags_span."<br>".$orders->description;
            })
            ->editColumn('date',function($orders){
                return $orders->date."<br>".$orders->due_date;
            })
            ->editColumn('grand_total',function($orders){

                return $orders->grand_total." <span class='fa fa-" . strtolower($orders->currency) . "'></span><br>".get_money(money_db_format($orders->grand_total)-money_db_format($orders->remaining))." <span class='fa fa-" . strtolower($orders->currency) . "'></span>";
            })
            ->editColumn('sub_total',function($orders){

                return $orders->status_label."<br>".$orders->collect_label;

            })
            ->rawColumns(["grand_total", "status","company_area",'sub_total',"date"])
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
        $tags = Tags::where("account_id",aid())->where("type", "sales_orders")->get();
        return view("modules.sales.orders.form", compact("form_type", "order","copy","id","offer_id","tags"));

    }

    public function store($aid, $id, Request $request)
    {

        $order = SalesOrders::updateOrCreate(["id" => $id], [
            "sales_offer_id"=>$request->form["sales_offer_id"],
            "description" => $request->form["description"],
            "company_id" => $request->form["company_id"]["id"],
            "date" => $request->form["date"],
            "exchange_total" => $request->form["currency"] == "TRY" ? money_db_format($request->form["grand_total"]):(money_db_format($request->form["grand_total"])*money_db_format($request->form["currency_value"])),
            "exchange_sub_total" => $request->form["currency"] == "TRY" ? money_db_format($request->form["sub_total"]):(money_db_format($request->form["sub_total"])*money_db_format($request->form["currency_value"])),
            "due_date" => $request->form["due_date"],
            "discount_type" => $request->form["discount_type"],
            "discount_value" => $request->form["discount_value"],
            "termin_date" => $request->form["termin_date"] == null ? date_tr():$request->form["termin_date"],
            "currency" => $request->form["currency"],
            "currency_value" => $request->form["currency_value"],
            "sub_total" => $request->form["sub_total"],
            "vat_total" => $request->form["vat_total"],
            "grand_total" => $request->form["grand_total"]
        ]);

        Companies::find($request->form["company_id"]["id"])->update(["customer"=>1]);


        Taggable::where("taggable_type","App\Model\Sales\SalesOrders")->where("taggable_id",$order->id)->delete();

        if ($request->form["tagsd"]) {

            foreach ($request->form["tagsd"] as $tag) {

                $tag = Tags::firstOrCreate(
                    ["account_id"=>aid(),"type"=>"sales_orders","title"=>$tag["text"]],
                    ["type" => "sales_orders", "bg_color" => rand_color()]);
                $order->tags()->save($tag);
            }
        }


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

        Bankabble::where("bankabble_id", $order->id)->where("bankabble_type", "App\Model\Sales\SalesOrders")->delete();

        $order->company->open_receipts_set($order->company->open_receipts,$order->company->open_cheques,$order);

        flash()->overlay($id == 0 ? "New Sales Order" : "Sales Order Updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $order->id];


    }

    public function show($aid, $id)
    {
        $order = SalesOrders::find($id);
        $langs = Language::All();

        return view("modules.sales.orders.show", compact("order","langs"));
    }

    public function pdf($aid, $id,$type,$lang)
    {
        if($type=="url"){
            $order = SalesOrders::find($id);
            $pdf = PDF::loadView('modules.sales.orders.pdf',compact("order","lang"))->setPaper('A4');
            return $pdf->stream();
        }else{
            $order = SalesOrders::find($id);
            $pdf = PDF::loadView('modules.sales.orders.pdf',compact("order","lang"))->setPaper('A4');
            return   $pdf->download($order->company["company_name"].' ('.$order->description.').pdf');
        }
    }

    public function destroy($aid, $id)
    {
        $sales_order = SalesOrders::find($id);

        $sales_order->delete();

        Stock::where("sales_order_id",$id)->delete();

        flash()->overlay("Sales Order Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "offer"];
    }

    public function waybill_add($aid, Request $request)
    {
        $order = SalesOrders::find($request->id);

        //Add waybill movements
        $waybill = Stock::create(
            [
                "description" => $request->description,
                "number" => $request->number,
                "dispatch_date" => $request->dispatch_date,
                "sales_order_id" => $order->id,
                "receipt_id" => 3,
                "doc_id" => $order->id,
                "status" => 1,
                "date" => $request->edit_date,
                "account_id" => aid(),
                "company_id" => $order->company_id
            ]
        );

        foreach ($request->items as $item) {
            $sitem = SalesOrderItems::find($item["id"]);
            if ($item["selected"] == true) {
                StockItems::create([
                    "stock_id" => $waybill->id,
                    "product_id" => $sitem->product["id"],
                    "unit_id" => $sitem->unit_id,
                    "quantity" => $sitem->quantity,
                    "sales_order_item_id" => $sitem->id,
                    "notes" => ""
                ]);
            }
        }


//
//        //Add waybill
//        $waybill = OrderWaybill::create([
//            "order_id" => $order->id,
//            "description" => $request->description,
//            "dispatch_date" => $request->dispatch_date,
//            "edit_date" => $request->edit_date,
//            "number" => $request->number
//        ]);
//
//
//
//        foreach ($request->items as $item) {
//
//
//            if ($item["selected"] == true) {
//                WaybillItems::create([
//                    "waybill_id" => $waybill["id"],
//                    "order_item_id"=>$item["id"]
//                ]);
//            }
//        }
//
//       $owner = auth()->user()->memberOfAccount["id"];
//        $user = User::where("account_id",$owner)->where("role_id",2)->get();
//        $mail =  Mail::to($user["email"])->send(new Waybill($waybill));
//
        return $waybill->id;
    }

    public function waybill_print($aid,$id)
    {

        $waybill = Stock::find($id);

        $pdf = PDF::loadView('modules.sales.orders.waybill', compact("waybill"))->setPaper('A4');
        return $pdf->stream($waybill->number == null ? $waybill->id:$waybill->number);
    }

    public function waybill_delete($aid,$id){
        Stock::destroy($id);
    }

    public function invoice_add($aid, $id, Request $request)
    {
        $order = SalesOrders::find($id);

        $invoice = SalesOrderInvoice::updateOrCreate(["id"=>$request->id],[
            "sales_order_id" => $order->id,
            "seri" => $request->seri,
            "number" => $request->number,
            "date" => $request->date,
            "clock" => $request->clock,
            "due_date" => $request->due_date,
            "description" => $request->description
        ]);
        if($invoice){
            return $order->id;
        }
    }

    public function invoice_print($aid, $id)
    {
        $order = SalesOrders::find($id);
        $invoice = $order->invoice;

        $pdf = PDF::loadView('modules.sales.orders.invoice', compact("invoice"))->setPaper('A4');
        return $pdf->stream($invoice->number == null ? $invoice->id : $invoice->number);
    }

    public function invoice_delete($aid,$id){
        $order = SalesOrders::find($id);
        $order->invoice()->delete();

        return "delete";
    }

    public function transfer_list($aid, $id)
    {
            $order = SalesOrders::find($id);
            return $order->transfers;
    }

    public function transfer_add($aid, $id,Request $request)
    {
        $transfer = SalesTransferInfo::create(
            [
                "sales_order_id" => $id,
                "transfer_company" => $request->transfer_company,
                "transfer_number" => $request->transfer_no,
                "customer_email" => $request->customer_mail,
                "not"=>$request->not

            ]);

        $order = SalesOrders::find($id);
        if($order->company->address["email"] == null && $transfer->customer_email){

            $order->company->address->update(["email"=>$transfer->customer_email]);
        }

        if($request->mail_check && $transfer->customer_email){
            $mail =  Mail::to($transfer->customer_email)->send(new Transfer($transfer,$request->products));
        }

        if ($transfer) {
            return $transfer;
        } else {
            return "error";
        }
    }

    public function transfer_delete(Request $request){
        $transfer = SalesTransferInfo::destroy($request->id);
        if(!$transfer){
            return "error";
        }
    }

    /*Order send product planning*/
    public function order_send_planning($aid,Request $request){

        Production::create(["status"=>0,"account_id"=>aid(),"sales_order_id"=>$request->order_id,"priority"=>0,"day"=>0]);

    }

}
