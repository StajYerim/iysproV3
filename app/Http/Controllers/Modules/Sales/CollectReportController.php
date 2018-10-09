<?php

namespace App\Http\Controllers\Modules\Sales;

use App\Account;
use App\Language;
use App\Model\Finance\Cheques;
use App\Model\Sales\SalesOrders;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class CollectReportController extends Controller
{
    public function index()
    {
        // Yazdırmak İçin Diller
        $langs = Language::All();


        //Toplam Tahsilatlar
        $orders = SalesOrders::whereNotNull("due_date")->where("account_id", aid())->get();
        $tl = 0;
        $usd = 0;
        $gbp = 0;
        $eur = 0;
        foreach ($orders as $order) {
            if($order->currency == "TRY") {
                $tl += money_db_format($order->remaining);
            }else if($order->currency == "USD"){
                $usd += money_db_format($order->remaining);
            }else if($order->currency == "GBP"){
                $gbp += money_db_format($order->remaining);
            }else if($order->currency == "EUR"){
                $eur += money_db_format($order->remaining);
            }
        }

        $cheques = Cheques::where("account_id", aid())->get();
        $cheques_total = 0;
        foreach ($cheques as $cheq) {
            if ($cheq->collect_statu == 0) {
                 $cheq->collect_statu;
                $cheques_total += money_db_format($cheq->amount);
            }
        }



        $total_collect = get_money($tl + $cheques_total);

        //vadesi bilinmeyen tahsilatlar
        //Toplam Tahsilatlar
        $not_due_orders = SalesOrders::whereNull("due_date")->where("account_id", aid())->get();
        $not_tl = 0;
        $not_usd = 0;
        $not_gbp = 0;
        $not_eur = 0;
        foreach ($not_due_orders as $order) {
            if($order->currency == "TRY") {
                $not_tl += money_db_format($order->remaining);
            }else if($order->currency == "USD"){
                $not_usd += money_db_format($order->remaining);
            }else if($order->currency == "GBP"){
                $not_gbp += money_db_format($order->remaining);
            }else if($order->currency == "EUR"){
                $not_eur += money_db_format($order->remaining);
            }
        }

        $not_total_collect = get_money($tl);





        //Vadesi geçen tahsilatlar
        $order_expiry_date = SalesOrders::whereNotNull("due_date")->where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->subDay(1))->get();
        $expiry_tl = 0;
        $expiry_usd = 0;
        $expiry_gbp = 0;
        $expiry_eur = 0;

        foreach ($order_expiry_date as $order) {
            if($order->currency == "TRY") {
                $expiry_tl += money_db_format($order->remaining);
            }else if($order->currency == "USD"){
                $expiry_usd += money_db_format($order->remaining);
            }else if($order->currency == "GBP"){
                $expiry_gbp += money_db_format($order->remaining);
            }else if($order->currency == "EUR"){
                $expiry_eur += money_db_format($order->remaining);
            }

        }

        $cheques_expiry = Cheques::where("account_id", aid())->whereDate("payment_date","<",Carbon::now()->subDay(1))->get();
        $cheques_total_expiry = 0;
        foreach ($cheques_expiry as $cheq) {
            if ($cheq->collect_statu == 0) {
                $cheques_total_expiry += money_db_format($cheq->amount);
            }
        }

        $expiry_total_collect = get_money($expiry_tl+$cheques_total_expiry);

        $export_collect= [];
        $export_collect["sales_orders"] = $orders;
        $export_collect["not_sales_orders"] = $not_due_orders;
        $export_collect["cheques"] = $cheques;

        return view("modules.sales.collect_report.index", compact(
            "langs",
            "expiry_total_collect",
            "total_collect",
            "export_collect",
            "eur",
            "usd",
            "gbp",
            "expiry_eur",
            "expiry_usd",
            "expiry_gbp",
            "not_total_collect",
            "not_eur",
            "not_gbp",
            "not_usd"
            ));
    }

    public function pdf($aid,$type,$lang)
    {
        if($type=="url"){

            // Yazdırmak İçin Diller
            $langs = Language::All();

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
                    $cheq->collect_statu;
                    $cheques_total += money_db_format($cheq->amount);
                }
            }



            $total_collect = get_money($remaining + $cheques_total);

            //Vadesi geçen tahsilatlar
            $order_expiry_date = SalesOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->subDay(1))->get();
            $expiry_remaining = 0;

            foreach ($order_expiry_date as $order) {
                $expiry_remaining += money_db_format($order->remaining);
            }

            $cheques_expiry = Cheques::where("account_id", aid())->whereDate("payment_date","<",Carbon::now()->subDay(1))->get();
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

            $company = Account::find(aid());
            $pdf = PDF::loadView('modules.sales.collect_report.pdf',compact("lang","company","langs","expiry_total_collect", "total_collect", "export_collect"))->setPaper('A4');
            return $pdf->stream();
        }
    }
}
