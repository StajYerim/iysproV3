<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Model\Finance\BankAccounts;
use App\Model\Finance\Cheques;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChequesController extends Controller
{
    public function index()
    {
        return view("modules.finance.cheques.index");
    }

    public function index_list()
    {

        $cheques = Cheques::with("company")->select("cheques.*")->where("account_id", aid());

        return Datatables::of($cheques)
            ->setRowAttr([
                'onclick' => function ($cheq) {
                    return "product_update($cheq->id)";
                },
            ])
            ->setRowClass("row-title")
            ->make(true);
    }

    public function show($aid, $id)
    {
        $cheq = Cheques::find($id);
        $accounts = BankAccounts::where("account_id",aid())->get();
        return view("modules.finance.cheques.show",compact("cheq","accounts"));
    }

    public function destroy($aid,$id)
    {
        Cheques::destroy($id);
        flash()->overlay("Cheque Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "cheque"];
    }
}
