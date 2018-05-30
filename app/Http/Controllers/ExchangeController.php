<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function exchange($aid,Request $request){


        $doviz = new \Teknomavi\Tcmb\Doviz();
        $result = $doviz->kurAlis(strtoupper($request->code));

        return number_format($result,"4",",",".");

    }
}
