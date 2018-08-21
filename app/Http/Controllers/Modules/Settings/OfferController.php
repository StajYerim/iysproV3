<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Model\Settings\SettingsSalesOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{
    public function index()
    {
        $sales_offers = SettingsSalesOffer::where("account_id",aid())->first();
        return view("modules.settings.offer.index",compact('sales_offers'));
    }

    public function post(Request $request)
    {
        $this->validate($request,[
            'due_day' => 'required|numeric',
            'logo_show' => 'required'
        ]);
        $settings_sales_offer = SettingsSalesOffer::where("account_id",aid())->first();
        if(count($settings_sales_offer) > 0)
        {
            $sales_offers = SettingsSalesOffer::where("account_id",aid())->first();
            $sales_offers->account_id = aid();
            $sales_offers->logo_show = $request->logo_show;
            $sales_offers->due_day = $request->due_day;
            $sales_offers->front_text = $request->front_text;
            $sales_offers->bottom_text = $request->bottom_text;
            $sales_offers->cover_page = $request->cover_page;
            $sales_offers->save();
        }
        else
        {
            $sales_offers = new SettingsSalesOffer();
            $sales_offers->account_id = aid();
            $sales_offers->logo_show = $request->logo_show;
            $sales_offers->due_day = $request->due_day;
            $sales_offers->front_text = $request->front_text;
            $sales_offers->bottom_text = $request->bottom_text;
            $sales_offers->cover_page = $request->cover_page;
            $sales_offers->save();
        }

        return view("modules.settings.offer.index",compact('sales_offers'));
    }
}
