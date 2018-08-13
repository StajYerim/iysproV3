<?php

namespace App\Http\Controllers\Modules\Production;

use App\Model\Production\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        $productions_process = Production::where("status", [1,2])->get();

        return view('modules.production.calendar.index', compact("productions_process"));
    }

    public function detail($aid, Request $request)
    {
        $production = Production::where("id", $request->production_id)->with("order.items.product.named")->first();
        return $production;
    }

    public function list($aid)
    {
        $production = Production::with("order")->get();
        return $production;
    }

    public function save($aid, Request $request)
    {
       $production = Production::find($request->production_id);

       $production->update(["status"=>$request->status,"start_date"=>$request->start_date,"day"=>$request->day]);

       return "ok";
    }
}
