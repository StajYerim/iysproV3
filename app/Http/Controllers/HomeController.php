<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

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
