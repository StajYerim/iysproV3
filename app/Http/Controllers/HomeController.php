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
        $bank_accounts = BankAccounts::where("account_id",aid())->paginate(6);
        $sales_orders  = SalesOrders::whereDate("due_date","<",Carbon::now()->addDays(7))->paginate(10);
        $purchase_orders = PurchaseOrders::whereDate("due_date","<",Carbon::now()->addDays(7))->paginate(10);
        $bank_account_items = BankItems::orderBy("date","desc")->paginate(10);
        return view('dashboard', compact('bank_accounts','sales_orders','purchase_orders','bank_account_items'));
    }
  
    public function profil_update($aid){
      $user = auth()->user();
      return view("modules.users.update", ['user' => $user]);
    }
  
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
  
    /* TODO: Add Validation */
    public function profil_password_save(Request $request){
      $user = Auth::user();
      
      if(!Hash::check($request->old_password, $user->password)) {
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
  
    public function account_update($aid){
      return view("modules.accounts.update");
    }

    public function myProfile() {
        $user = auth()->user();
        return view('my_profile', [
            'user' => $user
        ]);
    }
}
