<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Model\Finance\BankAccounts;
use App\Model\Finance\BankItems;
use App\Model\Finance\Cheques;
use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectReportController extends Controller
{
    public function index()
    {


        //Toplam Tahsilatlar
        $orders = SalesOrders::where("account_id", aid())->get();
        $remaining = 0;
        foreach ($orders as $order) {
            $remaining += money_db_format($order->remaining);
        }

        $cheques = Cheques::where("account_id", aid())->get();
        $cheques_total = 0;
        foreach ($cheques as $cheq) {
            if ($cheq->collect_statu == 0) {
                $cheques_total += money_db_format($cheq->amount);
            }
        }

        $total_collect = get_money($remaining + $cheques_total);

        //Vadesi geçen tahsilatlar
        $order_expiry_date = SalesOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now())->get();
        $expiry_remaining = 0;

        foreach ($order_expiry_date as $order) {
            $expiry_remaining += money_db_format($order->remaining);
        }

        $cheques_expiry = Cheques::where("account_id", aid())->whereDate("payment_date","<",Carbon::now())->get();
        $cheques_total_expiry = 0;
        foreach ($cheques_expiry as $cheq) {
            if ($cheq->collect_statu == 0) {
                $cheques_total_expiry += money_db_format($cheq->amount);
            }
        }

        $expiry_total_collect = get_money($expiry_remaining+$cheques_total_expiry);

        $export_collect= [];
        $export_collect["sales_orders"] = $orders;
        $export_collect["cheques"] = $cheques;

        return view("modules.sales.collect_report.index", compact( "expiry_total_collect", "total_collect", "export_collect"));
    }
}
