<?php

namespace App\Http\Controllers\Stock;

use App\Account;
use App\Model\Stock\Product\Category;

use App\Model\Stock\Product\Product;
use App\Model\Stock\Product\ProductDescriptions;
use App\Model\Stock\Stock;
use App\Model\Stock\StockItems;
use App\Units;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovementsController extends Controller
{
    public function index()
    {
        return view("modules.stock.movements.index");
    }


    public function index_list()
    {

        $stocks = Stock::select("stock_receipts.*")->where("account_id", aid());

        return Datatables::of($stocks)
            ->setRowAttr([
                'onclick' => function ($product) {
                    return "product_update($product->id)";
                },
            ])
            ->setRowClass("row-title")
            ->editColumn("receipt_id", function ($stock) {
                return $stock->type_name;
            })
            ->make(true);
    }

    public function form($aid, $id, $type, $process)
    {
        $stock = $type != "new" ? Stock::find($id) : "";
        $form_type = $type;
        $action = $process == "in" ? "0" : "1";
        $units = Account::find(aid())->units;
        $products = Product::where("account_id",aid())->get();
        return view("modules.stock.movements.form", compact("form_type", "stock", "action", "units", "products"));

    }

    public function show($aid, $id)
    {
        $stock = Stock::find($id);
        return view("modules.stock.movements.show", compact("stock"));
    }


    public function store($aid, $id, Request $request)
    {


        $stock = Stock::updateOrCreate(["id" => $id],
            [
                "account_id" => aid(),
                "company_id" => $request->company_id["id"],
                "doc_id" => 0,
                "status" => $request->status,
                "receipt_id" => $request->receipt_id,
                "date" => $request->date,
                "description" => $request->description
            ]
        );


        $whereNot = Array();
        foreach ($request->items as $item) {


          $ret =  $stock->items()->updateOrCreate(
                ["id" => $item["id"]]
                , [
                    'product_id' =>  $item["tetra"]["product_id"],
                    'unit_id' => $item["unit_id"],
                    'quantity' => $item["quantity"]

                ]
            );
            array_push($whereNot,$ret->id);

        }

        $stock->items()->whereNotIn("id",$whereNot)->delete();

        flash()->overlay($id == 0 ? "New action stock" : "Stock action updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $stock->id];
    }


    public function destroy($aid, $id)
    {
        Stock::destroy($id);

        flash()->overlay("Stock Movement Receipt Deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "movements"];

    }

}
