<?php

namespace App\Http\Controllers;

use App\Mail\Share\Sales\Offer;
use App\Model\Sales\SalesOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{
    public function offer_share($aid,$id,Request $request)
    {



        $data = [];
        $data["thread"] = $request->thread;
        $data["message"] = $request->message;
        $data["offer_id"] = $id;


        Mail::to($request->receivers)
            ->send(new Offer($data));
    }
}
