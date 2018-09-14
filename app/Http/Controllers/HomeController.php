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


        //Total Collect
        /*Sales Orders Gecikmiş*/
        $sales = [];
        $sales_gecikmis = SalesOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->subDay(1))->get();
        $sales["gecikmis"] = 0;

        foreach ($sales_gecikmis as $gec) {
            if ($gec->safe_remaining != 0)
                $sales["gecikmis"] += $gec->safe_remaining;
        }

        $sales_gelecek = SalesOrders::where("account_id", aid())->whereDate("due_date", ">", Carbon::now()->subday(1))->get();
        $sales["gelecek"] = 0;
        foreach ($sales_gelecek as $gec) {
            if ($gec->safe_remaining != 0)
                $sales["gelecek"] += $gec->safe_remaining;
        }

        /*Çek Tahsilatı */
        $cheques = [];
        $cheques_gecikmis = Cheques::where("account_id", aid())->whereDate("payment_date", "<", Carbon::now()->subDay(1))->get();
        $cheques["gecikmis"] = 0;
        foreach ($cheques_gecikmis as $cheq) {
            if ($cheq->collect_statu == 0) {
                if (money_db_format($cheq->amount) != 0)
                    $cheques["gecikmis"] += money_db_format($cheq->amount);
            }
        }

        $cheques_gelecek = Cheques::where("account_id", aid())->whereDate("payment_date", ">", Carbon::now()->subDay(1))->get();
        $cheques["gelecek"] = 0;
        foreach ($cheques_gelecek as $cheq) {
            if ($cheq->collect_statu == 0) {
                if (money_db_format($cheq->amount) != 0)
                    $cheques["gelecek"] += money_db_format($cheq->amount);
            }
        }
        $total_collect =  $cheques["gecikmis"]+$cheques["gecikmis"]+$sales["gecikmis"]+$sales["gelecek"];

        //Total Collect

        //Total Payment

        /*Gecikmiş Ödeme*/
        $purchase = [];
        $purchase_gecikmis = PurchaseOrders::where("account_id", aid())->whereDate("due_date", "<", Carbon::now()->subDay(1))->get();
        $purchase_gelecek = PurchaseOrders::where("account_id", aid())->whereDate("due_date", ">", Carbon::now()->subDay(1))->get();
        $purchase["gecikmis"] = 0;

        foreach ($purchase_gecikmis as $gec) {
            if ($gec->safe_remaining != 0)
                $purchase["gecikmis"] += $gec->safe_remaining;
        }

        $purchase["gelecek"] = 0;

        foreach ($purchase_gelecek as $gec) {
            if ($gec->safe_remaining != 0)
                $purchase["gelecek"] += $gec->safe_remaining;
        }

        /*Gecikmiş Çek*/
        $cheques_payment = [];
        $cheques_payment_gecikmis = Cheques::where("account_id", aid())->whereDate("payment_date", "<", Carbon::now()->subDay(1))->get();
        $cheques_payment_gelecek = Cheques::where("account_id", aid())->whereDate("payment_date", ">", Carbon::now()->subDay(1))->get();
        $cheques_payment["gecikmis"] = 0;
        foreach ($cheques_payment_gecikmis as $cheq) {

            if ($cheq->cheque_status == 0) {
                if (money_db_format($cheq->amount) != 0)
                    $cheques_payment["gecikmis"] += money_db_format($cheq->amount);
            }
        }

        $cheques_payment["gelecek"] = 0;
        foreach ($cheques_payment_gelecek as $cheq) {

            if ($cheq->cheque_status == 0) {
                if (money_db_format($cheq->amount) != 0)
                    $cheques_payment["gelecek"] += money_db_format($cheq->amount);
            }
        }
        /*Çek ödeme*/

        /*Gider ödemesi*/
        $expenses = [];
        $expenses_gecikmis = Expenses::where("account_id", aid())->whereDate("payment_date", "<", Carbon::now()->subDay(1))->get();
        $expenses["gecikmis"] = 0;

        foreach ($expenses_gecikmis as $gec) {
            if($gec->pay_status == 0){
            if (money_db_format($gec->amount) != 0){
                $expenses["gecikmis"] += money_db_format($gec->amount);
            }
            }
        }

        $expenses_gelecek = Expenses::where("account_id", aid())->whereDate("payment_date", ">", Carbon::now()->subday(1))->get();
        $expenses["gelecek"] = 0;
        foreach ($expenses_gelecek as $gec) {
            if($gec->pay_status == 0){
                if (money_db_format($gec->amount) != 0){
                    $expenses["gelecek"] += money_db_format($gec->amount);
                }
            }
        }


        $total_payment = $purchase["gecikmis"]+$purchase["gelecek"]+$cheques_payment["gecikmis"]+$cheques_payment["gelecek"]+$expenses["gecikmis"]+$expenses["gelecek"];



        //Total Payment

        return view('dashboard',
            compact('bank_accounts',
                'sales_orders', "sales", "cheques","total_collect","purchase","total_payment","cheques_payment","expenses",
                'purchase_orders',
                'bank_account_items'

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
