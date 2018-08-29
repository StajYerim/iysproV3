<?php

namespace App\Http\Controllers\SettingsManager;

use App\Account;
use App\AccountUnits;
use App\Units;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitSettingsController extends Controller
{
    public function index()
    {
        $units = Units::where("status", 1)->get();
        return view("settingsManager.units.index", compact("units"));
    }

    public function unit_status_update(Request $request)
    {
        $account = Account::find(aid());
        $data = AccountUnits::where("account_id",aid())->where("unit_id",$request->id)->count();

        if ($data == 0) {
            $account->units()->attach($request->id);
            return "+";
        } else {
            $account->units()->detach($request->id);
            return "-";
        }



    }
}
