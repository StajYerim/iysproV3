<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiConnectController extends Controller
{
    public function index(){
        $account = Account::find(aid());
        return view("modules.settings.api_connect.index",compact("account"));
    }

    public function save($aid,Request $request){

        if($request->type == "n11"){

        Account::find(aid())->update([
           "n11_api_key"=>$request->api_key,
           "n11_api_password"=>$request->api_password
        ]);
            return ["message"=>"n11 bilgileri kayıt edildi"];
        }elseif($request->type == "parasut"){

        Account::find(aid())->update([
                            "parasut_client_id"=>$request->client_id,
                            "parasut_client_secret"=>$request->client_secret,
                            "parasut_username"=>$request->username,
                            "parasut_password"=>$request->password,
                            "parasut_company_id"=>$request->company_id,
                            "parasut_callback_url"=>$request->callback_url,
        ]);
            return ["message"=>"Paraşüt bilgileri kayıt edildi"];
        }
    }
}
