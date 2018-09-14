<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiConnectController extends Controller
{
    public function index(){
        $account = Account::find(aid());
        return view("modules.settings.api_connect.index",compact("account"));
    }

    public function save($aid,Request $request)
    {
        if($request->type == "n11")
        {
            $validator = Validator::make($request->all(), [
                'api_key' => 'max:100',
                'api_password' => 'max:100',
            ]);

            if ($validator->fails()) {
                return ['title' => trans('word.error'),'message' => trans('sentence.please_check_form_again'),'type' => 'danger'];
            }else{
                Account::find(aid())->update([
                    "n11_api_key"=>$request->api_key,
                    "n11_api_password"=>$request->api_password
                ]);
                return ["title" => trans('word.success'),"message"=> trans('sentence.all_your_informations_saved'),"type" => "success"];
            }
        }
        elseif($request->type == "parasut")
        {
            $validator = Validator::make($request->all(), [
                'client_id' => 'max:100',
                'client_secret' => 'max:100',
                'username' => 'max:100',
                'password' => 'max:100',
                'company_id' => 'max:100',
                'callback_url' => 'max:100',
            ]);

            if ($validator->fails()) {
                return ['title' => trans('word.error'),'message' => trans('sentence.please_check_form_again'),'type' => 'danger'];
            }else{
                Account::find(aid())->update([
                    "parasut_client_id"=>$request->client_id,
                    "parasut_client_secret"=>$request->client_secret,
                    "parasut_username"=>$request->username,
                    "parasut_password"=>$request->password,
                    "parasut_company_id"=>$request->company_id,
                    "parasut_callback_url"=>$request->callback_url,
                ]);
                return ["title" => trans('word.success'),"message"=> trans('sentence.all_your_informations_saved'),"type" => "success"];
            }


        }
    }
}
