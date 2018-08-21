<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VatReportController extends Controller
{
    public function index()
    {
//        $date=SalesOrders::orderByDesc('date')->where("account_id",aid())->where("date",">", Carbon::now()->subMonths(12))->sum('vat_total');
//        dd($date);
//        $sales= \App\Model\Sales\SalesOrders::where("account_id",aid())->whereMonth("date",$i)->sum('vat_total');
        return view("modules.finance.vat_report.index");
    }

    public function month()
    {
       $data                = [];
       $month               = request("month");
       $data['sales']       = SalesOrders::with('company')->where("account_id",aid())->whereMonth("date",$month)->get();
       $data['purchase']    = PurchaseOrders::with('company')->where("account_id",aid())->whereMonth('date',$month)->get();
       $data = json_encode($data);
       return $data;
    }
}
