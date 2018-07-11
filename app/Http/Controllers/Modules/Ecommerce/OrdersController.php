<?php

namespace App\Http\Controllers\Modules\Ecommerce;

use App\Account;
use App\Http\Controllers\Modules\Ecommerce\Models\N11;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    protected $n11;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $account = Account::find(aid());
            $this->n11 = new N11([
                'appKey' => $account["n11_api_key"],
                'appSecret' => $account["n11_api_password"]
            ]);
            return $next($request);
        });
    }
  
    public function index(){
        return view("modules.ecommerce.orders.index");
    }
  
    public function index_list(Request $request) {
      $searchData = [
          "productId"=>'',
          "sortForUpdateDate"=>'',
          "status"=> '', 
          "buyerName"=> '',
          "orderNumber"=> '',
          "productSellerCode" =>'',
          "recipient"=> '',
          "period"=>[
              "startDate"=> '?',
              "endDate"=> '?'     
          ]     
      ];
      
      if($request->input('status')) {
        $searchData["status"] = $request->input('status');
      }
      
      $page = $request->input('page');
      $orderList = $this->n11->DetailedOrderList($searchData, $page);
      return response()->json($orderList);
    }
  
    public function show($aid, $order_id){
        $orderDetail = $this->n11->OrderDetail(['id' => $order_id]);
        return view("modules.ecommerce.orders.show", ['order' => $orderDetail->orderDetail]);
    }
}
