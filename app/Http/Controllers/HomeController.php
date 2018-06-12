<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
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
  
  
    public function profil_update($aid,$id){
      
     
      return view("modules.users.update");
    }
  
      public function account_update($aid){
      
     
      return view("modules.accounts.update");
    }
  
  

    /**
     * Present profile of authenticated user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myProfile()
    {
        // get authenticated user
        $user = auth()->user();

        // return view
        return view('my_profile', [
            'user' => $user
        ]);
    }
}
