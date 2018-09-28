<?php

namespace App\Http\Controllers\Modules\Purchases;

use App\Companies;
use App\Currency;
use App\Language;
use App\Taggable;
use App\Tags;
use Barryvdh\DomPDF\Facade as PDF;
use App\Model\Purchases\PurchaseOffers;
use App\Model\Purchases\PurchaseOfferItems;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class
OffersController extends Controller
{
    public function index()
    {
        return view("modules.purchases.offers.index");
    }


    public function index_list()
    {

        $offers = PurchaseOffers::with("company")->select("purchase_offers.*")->where("account_id", aid())->get();

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
        $offer = $id == 0 ? "" : PurchaseOffers::find($id);
        $tags = Tags::where("account_id",aid())->where("type", "purchase_offers")->get();

        return view("modules.purchases.offers.form", compact("form_type", "offer","tags"));

    }

    public function store($aid, $id, Request $request)
    {

        $offer = PurchaseOffers::updateOrCreate(["id" => $id], [
            "description" => $request->form["description"],
            "description_detail" => $request->form["description_detail"],
            "company_id" => $request->form["company_id"]["id"],
            "date" => $request->form["date"],
            "discount_type" => $request->form["discount_type"],
            "discount_value" => $request->form["discount_value"],
            "expired_date" => $request->form["expired_date"],
            "effective_date" => date_tr(),
            "currency" => $request->form["currency"],
            "currency_value" => $request->form["currency_value"],
            "sub_total" => $request->form["sub_total"],
            "vat_total" => $request->form["vat_total"],
            "grand_total" => $request->form["grand_total"]
        ]);

        Companies::find($request->form["company_id"]["id"])->update(["supplier"=>1]);



        Taggable::where("taggable_type","App\Model\Purchases\PurchaseOffers")->where("taggable_id",$offer->id)->delete();

        if ($request->form["tagsd"]) {

            foreach ($request->form["tagsd"] as $tag) {

                $tag = Tags::firstOrCreate(
                    ["account_id"=>aid(),"type"=>"purchase_offers","title"=>$tag["text"]],
                    ["type" => "purchase_orders", "bg_color" => rand_color()]);
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


        flash()->overlay($id == 0 ? "New Purchase Offer" : "Purchase Offer Updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $offer->id];

    }

    public function show($aid, $id)
    {
        $langs = Language::all();
        $offer = PurchaseOffers::find($id);
        return view("modules.purchases.offers.show", compact("offer","langs"));
    }

    public function pdf($aid, $id,$type,$lang)
    {
        Artisan::call('view:clear');
        $offer = PurchaseOffers::find($id);

        if($type=="url"){

            $pdf = PDF::loadView('modules.purchases.offers.pdf',compact("offer","lang"))->setPaper('A4');
            return $pdf->stream();
        }else{

            $pdf = PDF::loadView('modules.purchases.offers.pdf',compact("offer","lang"))->setPaper('A4');
            return $pdf->download($offer->company["company_name"].' ('.$offer->description.').pdf');
        }


    }

    public function destroy($aid, $id)
    {
        PurchaseOffers::destroy($id);
        flash()->overlay("Purchase Offer Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "offer"];
    }

    public function status_send($aid, $id, Request $request)
    {
        PurchaseOffers::find($id)->update([
            "status" => $request->status,
            "effective_date" => $request->effective_date,
            "note"=>$request->note
        ]);

        $offer = PurchaseOffers::find($id);

        return ["message" => "success", 'status_name' => $offer->status_name,'status_color'=>$offer->status_color,"status_effective_date"=>$offer->effective_date];
    }

}
