<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{

    /*Exchange - instant currency price*/
    public function exchange($aid,Request $request){

        $exchange = new \Teknomavi\Tcmb\Doviz();
        $result = $exchange->kurAlis(strtoupper($request->code));

        return number_format($result,"4",",",".");

    }
}
