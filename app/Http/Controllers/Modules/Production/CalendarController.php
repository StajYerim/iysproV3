<?php

namespace App\Http\Controllers\Modules\Production;

use App\Model\Production\Production;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class CalendarController extends Controller
{
    public function index()
    {

        return view('modules.production.calendar.index');
    }

    public function detail($aid, Request $request)
    {
        $production = Production::where("id", $request->production_id)->with("order.items.product.named","order.company","order.items.unit")->first();
        return $production;
    }

    public function list($aid)
    {
        $production = Production::with("order.company")->get();
        return $production;
    }

    public function save($aid, Request $request)
    {
       $production = Production::find($request->production_id);

       $production->update(["status"=>$request->status,"start_date"=>$request->start_date,"day"=>$request->day]);

       return "ok";
    }

    public function calendar_list($aid){
        $productions_process = Production::where("status", [1])->get();

        foreach($productions_process as $product) {
            {

                $data[] = array(
                    "title" => $product->order->company["company_name"],
                    "start" => $product->starting_date,
                    "end" => $product->finish_date,
                    "className" => ["event", "bg-color-redLight"],
                    "id" => $product->id,
                    "icon" => 'fa-industry'
                );
            }

        }

        return $data;
    }

    public function print_list(Request $request){


        $productions_process = Production::whereIn("status", $request->list_option)->get();

         $orders = [];
        foreach($productions_process as $product) {
            {

                $orders[] = array(
                    "title" => $product->order->company["company_name"],
                    "desc" => $product->order["description"] == null ? "":$product->order["description"],
                    "start" => $product->start_date,
                    "end" => $product->finish_date,
                    "status" => $product->status_text,
                );
            }

        }




        $pdf = PDF::loadView('modules.production.orders.list_print', compact("orders"))->setPaper('A4');
        return $pdf->stream("Üretim listesi - ".Carbon::now()->format("d.m.Y H:i"));

    }
}
