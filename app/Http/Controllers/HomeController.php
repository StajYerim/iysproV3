<?php

namespace App\Http\Controllers;

use App\Account;
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
    public function index(Account $company)
    {
        return view('dashboard');
    }
  
    public function profil_update($aid){
      $user = auth()->user();
      return view("modules.users.update", ['user' => $user]);
    }
  
    public function profil_update_save(Request $request){
      User::find(aid())->update([
        "name" => $request->name,
        "email" => $request->email,
        "mobile" => $request->mobile,
      ]);
      
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
