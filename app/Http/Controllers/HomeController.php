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
        return view('dashboard', compact('bank_accounts','sales_orders','purchase_orders','bank_account_items'));
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
