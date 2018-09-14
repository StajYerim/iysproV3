<?php

namespace App\Http\Controllers;

use App\Account;
use App\Model\Finance\BankAccounts;
use App\Model\Finance\BankItems;
use App\Model\Finance\Expenses;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Finance\Cheques;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Account $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $bank_accounts = BankAccounts::where("account_id", aid())->paginate(6);
        $sales_orders = SalesOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->addDays(7))->paginate(6);
        $purchase_orders = PurchaseOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->addDays(7))->paginate(6);
        $bank_account_items = BankItems::has("bank_account")->orderBy("date", "desc")->whereRaw('company_id != null')->paginate(6);

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

        $unplanning_order_date = SalesOrders::where("account_id", aid())->whereDate("due_date", ">", Carbon::now()->subDay(1))->get();
        $unplanning_collect = 0;

        foreach ($unplanning_order_date as $un_pay) {
            $unplanning_collect += money_db_format($un_pay->remaining);
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

        /************* PAYMENTS **********************/
        //Toplam Ödemeler
        $purchase_orders = PurchaseOrders::where("account_id", aid())->get();
        $purchase_remaining = 0;
        foreach ($purchase_orders as $purchase_order) {
            $purchase_remaining += money_db_format($purchase_order->remaining);
        }


        $purchase_cheques = Cheques::where("account_id", aid())->get();
        $purchase_cheques_total = 0;
        foreach ($purchase_cheques as $purchase_cheq) {
            if ($purchase_cheq->cheques_status == 0) {
                if($purchase_cheq->show_button == "verilen0")
                    $purchase_cheques_total += money_db_format($purchase_cheq->amount);
            }
        }


        $total_payment = get_money($purchase_remaining+$purchase_cheques_total);

        //Vadesi geçen Ödemeler
        $purchase_order_expiry_date = PurchaseOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->subDay(1))->get();
        $purchase_expiry_remaining = 0;



        foreach ($purchase_order_expiry_date as $purchase_order_expiry) {
            $purchase_expiry_remaining += money_db_format($purchase_order_expiry->remaining);
        }

        $unplanning_payments = PurchaseOrders::where("account_id",aid())->whereDate("due_date",">",Carbon::now()->subDay(1))->get();
        $unplanning_remaining = 0;
        foreach($unplanning_payments as $un_pay){
            $unplanning_remaining += money_db_format($un_pay->remaining);
        }

        $purchase_cheques_expiry = Cheques::where("account_id", aid())->whereDate("payment_date","<",Carbon::now()->subDay(1))->get();
        $purchase_cheques_total_expiry = 0;
        foreach ($purchase_cheques_expiry as $purchase_cheq) {
            if ($purchase_cheq->cheques_status == 0) {
                if ($purchase_cheq->show_button == "verilen0")
                    $purchase_cheques_total_expiry += money_db_format($purchase_cheq->amount);
            }
        }


        $purchase_expiry_total_collect = get_money($purchase_expiry_remaining+$purchase_cheques_total_expiry);

        $purchase_export_collect= [];
        $purchase_export_collect["purchases_orders"] = $purchase_orders;
        $purchase_export_collect["cheques"] = $purchase_cheques;


        //Cash - Flow


        $carbon = Carbon::now();

        $cash_bank = BankAccounts::where("account_id",aid())->get();
        $bank_total = 0;
        foreach($cash_bank as $cash){

            $bank_total += (double)money_db_format($cash->balance);
        }



        $cash_flow = array();
         for($i=0;$i<16;$i++)
         {
            $weekOfYear = Carbon::now()->addWeek($i)->weekOfYear;

            //PURCHASE ORDERS
              $porderes = PurchaseOrders::where("account_id",aid())->whereBetween(DB::raw("DATE(due_date)"), [Carbon::now()->addWeek($i)->format("Y-m-d"),Carbon::now()->addWeek($i+1)->format("Y-m-d")])->get();
             $porderes_total = 0;

             foreach($porderes as $pordered){
                 $porderes_total += $pordered->safe_remaining;
             }

             $cheques = Cheques::where("account_id", aid())->whereBetween(DB::raw("DATE(payment_date)"), [Carbon::now()->addWeek($i)->format("Y-m-d"),Carbon::now()->addWeek($i+1)->format("Y-m-d")])->get();
             $cheques_total = 0;
             foreach ($cheques as $cheq) {
                 if ($cheq->cheques_status == 0) {
                     if($cheq->show_button == "verilen0")
                         $cheques_total += money_db_format($cheq->amount);
                 }
             }


             //SALES ORDERS
              $orderes = SalesOrders::where("account_id",aid())->whereBetween(DB::raw("DATE(due_date)"), [Carbon::now()->addWeek($i)->format("Y-m-d"),Carbon::now()->addWeek($i+1)->format("Y-m-d")])->get();
              $orderes_total = 0;

              foreach($orderes as $ordered){
                  $orderes_total += $ordered->safe_remaining;
              }

             //EXPENSES
             $expenses = Expenses::where("account_id",aid())->whereBetween(DB::raw("DATE(payment_date)"), [Carbon::now()->addWeek($i)->format("Y-m-d"),Carbon::now()->addWeek($i+1)->format("Y-m-d")])->get();
             $expenses_total = 0;

             foreach($expenses as $expense){
                if($expense->pay_status == 0)
                 $expenses_total += money_db_format($expense->amount);
             }


              //COLLECT CHEQ
             $cheques_collect = Cheques::where("account_id", aid())->whereBetween(DB::raw("DATE(payment_date)"), [Carbon::now()->addWeek($i)->format("Y-m-d"),Carbon::now()->addWeek($i+1)->format("Y-m-d")])->get();
             $cheques_total_collect = 0;
             foreach ($cheques_collect as $cheq) {
                 if ($cheq->collect_statu == 0) {
                     $cheq->collect_statu;
                     $cheques_total += money_db_format($cheq->amount);
                 }
             }



             $between =  Carbon::now()->addWeek($i-1)->format("d.m.Y")."<br>".Carbon::now()->addWeek($i)->format("d.m.Y");

             array_push($cash_flow,array("porder_total"=>$porderes_total,"week_id"=>$weekOfYear,"order_total"=>$orderes_total,"between"=>$between,"cheq_total"=>$cheques_total_collect,"expense_payment"=>$expenses_total,"cheq_payment"=>$cheques_total,"bank_total"=>$bank_total));

         }

        $unplanning_collect_color = '#3149A4';
        if($unplanning_collect === 0){
            $unplanning_collect = 0;
            $unplanning_collect_color = '#E9E9E9';

        }

        $expiry_remaining_color = '#B71A11';
        if($expiry_remaining === 0){
            $expiry_remaining = 0;
            $expiry_remaining_color = '#E9E9E9';

        }

        $total_collect_color =   '[
            "#3149a4",
            "#b5130a",
        ]';

        if($total_collect == 0){
            $total_collect = 0;
            $total_collect_color = '["#E9E9E9"]';
        }

        $purchase_expiry_remaining_color = '#B71A11';
        if($purchase_expiry_remaining == 0){
            $purchase_expiry_remaining = 0;
            $purchase_expiry_remaining_color = '#E9E9E9';

        }

        $unplanning_remaining_color = '#3149A4';
        if($unplanning_remaining == 0){
            $unplanning_remaining = 0;
            $unplanning_remaining_color = '#E9E9E9';

        }

        $total_payment_color =   '[
            "#3149a4",
            "#b5130a",
        ]';

        if($total_payment == 0){
            $total_payment = 0;
            $total_payment_color = '["#E9E9E9"]';
        }




        $unplanning_collect = ($unplanning_collect);
        $expiry_remaining = ($expiry_remaining);
        $purchase_expiry_remaining = ($purchase_expiry_remaining);
        $unplanning_remaining = ($unplanning_remaining);

        return view('dashboard',
            compact('bank_accounts',
                'cash_flow',
                'sales_orders',
                'purchase_orders',
                'bank_account_items',
                "overdue_collect",
                "unplanning_collect",
                "unplanning_collect_color",
                "expiry_total_collect",
                "total_collect",
                "total_collect_color",
                "export_collect",
                "expiry_remaining",
                "expiry_remaining_color",
                "purchase_orders",
                "purchase_expiry_remaining",
                "purchase_expiry_remaining_color",
                "purchase_export_collect",
                "total_payment",
                "total_payment_color",
                "purchase_expiry_total_collect",
                "overdue_payment",
                "unplanning_collect",
                "unplanning_remaining",
                "unplanning_remaining_color",
                "last_week",
                "carbon"
            )
        );
    }

    /*User profile update page*/
    public function profil_update($aid){
      $user = auth()->user();
      return view("modules.users.update", ['user' => $user]);
    }

    /*User profile update */
    public function profil_update_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'mobile' => 'max:100'
        ]);

        if ($validator->fails()) {
            return ['title' => trans('word.error'),'message' => trans('sentence.please_check_form_again'),'type' => 'danger'];
        }else{
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();

            return response()->json(
                [
                    "title" => trans('word.success'),
                    "message"=> trans('sentence.all_your_informations_saved'),
                    "type" => "success"
                ]
            );
        }



    }

    /* User password change save */
    public function profil_password_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:50',
            'new_password' => 'required|max:50|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'title' => trans('word.error'),
                    'type' => 'danger',
                    'errors'  => $validator->errors()
                ],422
            );
        }else{
            $user = Auth::user();
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json(['title' => trans('word.error'),'message' => "eski şifre yanlış",'type' => 'danger']);
            }else{
                $user->password = Hash::make($request->new_password);
                $user->save();

                return response()->json(["title" => trans('word.success'),"message"=> trans('sentence.all_your_informations_saved'),"type" => "success"]);
            }
        }
    }

    /*Account update page*/
    public function account_update($aid){
      return view("modules.accounts.update");
    }

    /*Profile page*/
    public function myProfile() {
        $user = auth()->user();
        return view('my_profile', [
            'user' => $user
        ]);
    }
}
