<?php

namespace App\Http\Controllers;

use App\Account;
use App\Model\Finance\BankAccounts;
use App\Model\Finance\BankItems;
use App\Model\Purchases\PurchaseOrders;
use App\Model\Sales\SalesOrders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Model\Finance\Cheques;

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
        $bank_accounts = BankAccounts::where("account_id", aid())->select("name", "currency")->paginate(6);
        $sales_orders = SalesOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->addDays(7))->paginate(10);
        $purchase_orders = PurchaseOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->addDays(7))->paginate(10);
        $bank_account_items = BankItems::has("bank_account")->orderBy("date", "desc")->paginate(10);

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


        return view('dashboard',
            compact('bank_accounts',
                'sales_orders',
                'purchase_orders',
                'bank_account_items',
                "overdue_collect",
                "unplanning_collect",
                "expiry_total_collect",
                "total_collect",
                "export_collect",
                "expiry_remaining",
                "purchase_orders",
                "purchase_expiry_remaining",
                "purchase_export_collect",
                "total_payment",
                "purchase_expiry_total_collect",
                "overdue_payment",
                "unplanning_collect",
                "unplanning_remaining"
            )
        );
    }

    /*User profile update page*/
    public function profil_update($aid){
      $user = auth()->user();
      return view("modules.users.update", ['user' => $user]);
    }

    /*User profile update */
    public function profil_update_save(Request $request){
      $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
      $user->save();

      return response()->json([
        "message" => "Successfully Updated!"
      ]);
    }

    /* User password change save */
    public function profil_password_save(Request $request){
      $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
        return response()->json([
          "status" => 403,
          "message" => "Old Password Error!"
        ]);
        }

      $user->password = Hash::make($request->new_password);
      $user->save();

        return response()->json([
        "status" => 200,
        "message" => "Successfully Updated!"
      ]);
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
