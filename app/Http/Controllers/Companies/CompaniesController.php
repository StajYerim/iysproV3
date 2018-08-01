<?php

namespace App\Http\Controllers\Companies;

use App\Companies;
use App\Model\Companies\Address;
use App\Model\Finance\BankItems;
use App\ProductImage;
use App\TagData;
use App\Taggable;
use App\Tags;

use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function customer()
    {
        $type="customer";
        $route = "sales.companies.customer.data";
        return view("modules.companies.index", compact("companies", "type","route"));

    }

    public function supplier()
    {
        $type="supplier";
        $route = "purchases.companies.supplier.data";
        return view("modules.companies.index", compact("companies", "type","route"));
    }

    public function customer_data($aid,$type)
    {
        $companies = Companies::where("account_id",aid())->with("tags")->where($type,1)->get();

        return Datatables::of($companies)
            ->addColumn("balance",function($company){
                return $company->balance."<br>".$company->money_status;
            })
            ->editColumn("company_name",function($company){
                $tags_span = "";
                   foreach($company->tags as $tag) {
                        $tags_span .= "<span class='badge' style='background-color:".$tag["bg_color"]."' > ".$tag["title"]."</span >";
                   }
                return "<span class='row-title'>".$company->company_name."</span> ".$tags_span." <br>".$company->phone_number;
            })
            ->setRowAttr([
                'style' => 'cursor:pointer',
                'onclick' => function ($company) {
                    return "redirect_company($company->id,0,".aid().")";
                },
            ])
            ->rawColumns(["balance","company_name"])
            ->make(true);
    }

    public function supplier_data($aid,$type)
    {
        $companies = Companies::where("account_id",aid())->where($type,1)->get();

        return Datatables::of($companies)
            ->addColumn("balance",function($company){
                return $company->balance."<br>".$company->money_status;
            })
            ->editColumn("company_name",function($company){
                return "<span class='row-title'>".$company->company_name."</span><br>".$company->phone_number;
            })
            ->setRowAttr([
                'style' => 'cursor:pointer',
                'onclick' => function ($company) {
                    return "redirect_company($company->id,1,".aid().")";
                },
            ])
            ->rawColumns(["balance","company_name"])
            ->make(true);
    }

    public function form($aid, $option, $id, $type)
    {
        $company = $type != "new" ? Companies::find($id):"";
        $tags = Tags::where("account_id",aid())->where("type", "companies")->get();
        $company_type = $option == "customer" ? "customer" : "supplier";
        $form_type = $type == "new" ? "New" : "Update";
        return view("modules.companies.form", compact("form_type", "company_type","company","tags"));
    }

    public function store($aid,Request $request, $id)
    {

        $model = new Companies();
        $validator = Validator::make($request->all(),$model->rules);

        if ($validator->fails()) {
            return view("validate_error")->withErrors($validator);
        }

        $company = Companies::updateOrCreate(
            ["id" => $id],
            [
                "account_id" => aid(),
                "company_name" => $request->company_name,
                "company_short_name" => $request->company_short_name,
                "char_code" => $request->char_code,
                "tax_id" => $request->tax_id,
                "customer" => $request->option == "customer" ? 1 : 0,
                "supplier" => $request->option == "supplier" ? 1 : 0,
                "tax_office" => $request->tax_office,
                "iban" => $request->iban,
                "e_invoice_registered" => $request->e_invoice_registered,
            ]
        );

        Taggable::where("taggable_type","App\Companies")->where("taggable_id",$company->id)->delete();

        if ($request->tagsd) {

            foreach ($request->tagsd as $tag) {
                $tag = Tags::firstOrCreate(["account_id"=>aid(),"type"=>"companies","title"=>$tag["text"]], ["type" => "companies", "bg_color" => rand_color()]);
                $company->tags()->save($tag);

            }
        }

        Address::updateOrCreate(["company_id" => $company->id],
            [
                "address_abroad" => $request->address_abroad,
                "address" => $request->address,
                "town" => $request->town,
                "city" => $request->city,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "fax_number" => $request->fax_number
            ]
        );

        flash()->overlay($id == 0 ? "New companies created" : "Company updated", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'id' => $company->id];

    }

    public function show($company_id, $id)
    {

        $company = Companies::find($id);
        $company_type =  $company->supplier == 1 ? "supplier":"customer";
        return view("modules.companies.show", compact("company","company_type"));
    }

    public function destroy($company_id, $id)
    {
        Companies::destroy($id);
        BankItems::where("company_id",$id)->delete();

        flash()->overlay("Company deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type'=>"customer"];

    }

    public function company_source($aid, Request $request)
    {

        $term = $request->get('q');
        $results = array();
        $queries = Companies::where("account_id", aid())->where('company_name', 'like', $term . '%')->orWhere('tax_id', 'like', '%' . $term . '%')->get();
        foreach ($queries as $query) {
            $results[] = [
                'id' => $query->id,
                'text' => $query->company_name." (".$query->tax_id.")",
            ];
        }
       return $results;
    }



    public function quick_company(Request $request, $id)
    {

        $company = Companies::create(
            [
                "account_id" => aid(),
                "company_name" => $request->company_name,
                "company_short_name" => $request->company_short_name,
                "char_code" => $request->char_code,
                "tax_id" => $request->tax_id,
                "customer" => $request->option == "customer" ? 1 : 0,
                "supplier" => $request->option == "supplier" ? 1 : 0,
                "tax_office" => $request->tax_office,
                "iban" => $request->iban,
                "e_invoice_registered" => $request->e_invoice_registered,
            ]
        );

        Address::create(["company_id" => $company->id],
            [
                "address_abroad" => $request->address_abroad,
                "address" => $request->address,
                "town" => $request->town,
                "city" => $request->city,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "fax_number" => $request->fax_number
            ]
        );


        return ["id" => $company->id, 'text' => $company->company_name];

    }

    public function quick_form($aid,$id,$type)
    {
        $form_type = "new";
    return view("components.modals.companies_remote",compact("type","form_type"));
    }

    public function items($aid, $id)
    {
        $company = Companies::find($id);


        $results = array();

        $last_balance = 0;
        $action_type = null;
        $amount = 0;
        foreach ($company->statement_list as $item) {

            if ($item->pro_type == "sales_order") {
                $amount = $item->grand_total;
                $route=route("sales.orders.show",[aid(),$item->id]);
                $last_balance = $last_balance + money_db_format($amount);
                $action_type = "";
            } else if ($item->pro_type == "purchase_order") {
                $amount = $item->grand_total;
                $route=route("purchases.orders.show",[aid(),$item->id]);
                $last_balance = $last_balance - money_db_format($amount);
                $action_type = "-";

            } else if ($item->pro_type == "collect") {
                $route=route("finance.accounts.receipt",[aid(),$item->id]);
                $amount = $item->amount;
                $last_balance = $last_balance-money_db_format($amount);
                $action_type = "-";

            } else if ($item->pro_type == "payment") {
                $route=route("finance.accounts.receipt",[aid(),$item->id]);
                $amount = $item->amount;
                $last_balance = $last_balance+money_db_format($amount);
                $action_type = "";

            } else if ($item->pro_type == "buy_cheque") {
                $route=route("finance.cheques.show",[aid(),$item->id]);
                $amount = $item->amount;
                $last_balance = $last_balance - money_db_format($amount);
                $action_type = "-";

            } else if ($item->pro_type == "sell_cheque") {
                $route=route("finance.cheques.show",[aid(),$item->id]);
                $amount = $item->amount;
                $last_balance = $last_balance + money_db_format($amount);
                $action_type = "";

            }


            $results[] =
                array(
                    "url" => $route,
                    "type" => $item->type_text,
                    "description" => $item->description,
                    "date" => $item->date,
                    "action_type" => $action_type,
                    "amount" => $amount,
                    "last_balance" => get_money($last_balance)
                );
        }

        return $results;

    }
}
