<?php

namespace App\Http\Controllers\Modules\Sales;
use App\Companies;
use App\Language;
use App\Model\Settings\SettingsSalesOffer;
use App\Taggable;
use App\Tags;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\Sales\SalesOffers;
use App\Model\Sales\SalesOfferItems;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class OffersController extends Controller
{
    public function index()
    {
        return view("modules.sales.offers.index");
    }


    public function index_list()
    {

        $offers = SalesOffers::with("company")->select("sales_offers.*")->where("account_id", aid())->get();

        return Datatables::of($offers)
            ->setRowAttr([
                'onclick' => function ($offers) {
                    return "product_update($offers->id)";
                },
            ])
            ->editColumn("grand_total", function ($offer) {
                return $offer->grand_total . " <span class='fa fa-" . strtolower($offer->currency) . "'></span>";
            })
            ->editColumn("status", function ($offer) {
                return "<span class='badge " . $offer->status_colorbg . " '>" . $offer->status_name . "</span>";
            })
            ->rawColumns(["grand_total", "status"])
            ->setRowClass("row-title")
            ->make(true);
    }

    public function form($aid, $id, $type)
    {

        $form_type = $type;
        $offer = $id == 0 ? "" : SalesOffers::find($id);
        $tags = Tags::where("account_id",aid())->where("type", "sales_offers")->get();

        return view("modules.sales.offers.form", compact("form_type", "offer","tags"));

    }

    public function store($aid, $id, Request $request)
    {
        $offer = SalesOffers::updateOrCreate(["id" => $id], [
            "description" => $request->form["description"],
            "description_detail" => $request->form["description_detail"],
            "company_id" => $request->form["company_id"]["id"],
            "date" => $request->form["date"],
            "expired_date" => $request->form["expired_date"],
            "effective_date" => date_tr(),
            "currency" => $request->form["currency"],
            "currency_value" => $request->form["currency_value"],
            "sub_total" => $request->form["sub_total"],
            "vat_total" => $request->form["vat_total"],
            "grand_total" => $request->form["grand_total"]
        ]);

        Companies::find($request->form["company_id"]["id"])->update(["customer"=>1]);



        Taggable::where("taggable_type","App\Model\Sales\SalesOffers")->where("taggable_id",$offer->id)->delete();

        if ($request->form["tagsd"]) {

            foreach ($request->form["tagsd"] as $tag) {

                $tag = Tags::firstOrCreate(
                    ["account_id"=>aid(),"type"=>"sales_offers","title"=>$tag["text"]],
                    ["type" => "sales_orders", "bg_color" => rand_color()]);
                $offer->tags()->save($tag);
            }
        }

        $whereNot = Array();
        foreach ($request->items as $key => $value) {

            $ret = $offer->items()->updateOrCreate(
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
        $offer->items()->whereNotIn("id", $whereNot)->delete();


        flash()->overlay($id == 0 ? "New Sales Offer" : "Sales Offer Updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $offer->id];

    }

    public function show($aid, $id)
    {
        $langs = Language::all();
        $offer = SalesOffers::find($id);
        return view("modules.sales.offers.show", compact("offer","langs"));
    }
    public function pdf($aid, $id,$type,$lang)
    {
        Artisan::call('view:clear');
        $offer = SalesOffers::find($id);
        $offerSettings = SettingsSalesOffer::where("account_id",$aid)->first();

        if($type=="url"){

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('modules.sales.offers.pdf',compact("offer","offerSettings","lang"))->setPaper('A4');
            return $pdf->stream();
        }else{

            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('modules.sales.offers.pdf',compact("offer","offerSettings","lang"))->setPaper('A4');
            return   $pdf->download($offer->company["company_name"].' ('.$offer->description.').pdf');
        }


    }

    public function destroy($aid, $id)
    {
        SalesOffers::destroy($id);
        flash()->overlay("Sales Offer Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "offer"];
    }

    public function status_send($aid, $id, Request $request)
    {
       SalesOffers::find($id)->update([
            "status" => $request->status,
            "effective_date" => $request->effective_date,
            "note"=>$request->note
        ]);

        $offer = SalesOffers::find($id);

        return ["message" => "success", 'status_name' => $offer->status_name,'status_color'=>$offer->status_color,"status_effective_date"=>$offer->effective_date];
    }

}
