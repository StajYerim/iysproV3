<?php

namespace App\Http\Controllers\Modules\Finance;

use App\Bankabble;
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
            ->editColumn("id",function($cheq){
                if ($cheq->cheque_status == 1) {
                    return '<i class="fa fa-sign-in fa-rotate-90 fa-3x "></i>';
                } else if ($cheq->cheque_status == 0) {
                    return '<i class="fa fa-sign-in fa-rotate-270 fa-3x "></i>';
                }else if($cheq->cheque_status == 2){
                    return '<i class="fa fa-exchange fa-rotate-90 fa-3x "></i>';
                }
            })
            ->editColumn("company.company_name", function ($cheq) {

                if ($cheq->cheque_status == 1) {
                    return $cheq->company["company_name"] . '<br><small class="note">Portföyde</small>';
                } else if ($cheq->cheque_status == 0) {
                    return auth()->user()->memberOfAccount["company_name"] . '<br><small class="note">'.$cheq->transfer_company["company_name"].'</small>';
                }else if($cheq->cheque_status == 2){
                    return $cheq->company["company_name"] . '<br><small class="note">'.$cheq->transfer_company["company_name"].'</small>';
                }

            })
            ->editColumn("payment_date",function($cheq){
                return $cheq->payment_date."<br><span class='note'>".$cheq->status_text."</span>";
            })
            ->editColumn("amount",function($cheq){
                if ($cheq->cheque_status == 1) {
                    return $cheq->amount . '<br><small class="note">'.$cheq->collect_status_text.'</small>';
                } else if ($cheq->cheque_status == 0) {
                    return $cheq->amount.'<br><small class="note">'.$cheq->collect_status_text.'</small>';
                }else if($cheq->cheque_status == 2){
                    return $cheq->amount . '<br><small class="note">Transfer Edildi</small>';
                }
            })
            ->setRowClass("row-title")
            ->rawColumns(["payment_date", "company.company_name","id","amount"])
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
        Bankabble::where("cheques_id",$id)->delete();
        sleep(1);
        return ["message" => "success", 'type' => "cheque"];
    }
}
