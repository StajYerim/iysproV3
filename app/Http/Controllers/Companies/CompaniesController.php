<?php

namespace App\Http\Controllers\Companies;

use App\Companies;
use App\Model\Companies\Address;
use App\Model\Finance\BankItems;
use App\ProductImage;
use App\TagData;
use App\Tags;
use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

        $company_type = $option == "customer" ? "customer" : "supplier";
        $form_type = $type == "new" ? "New" : "Update";
        return view("modules.companies.form", compact("form_type", "company_type","company"));
    }

    public function store($aid,Request $request, $id)
    {

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


//  foreach($request->tags as $tag){
//   $tag =  Tags::firstOrcreate(["title"=>$tag,"type"=>"companies","account_id"=>aid()],[
//        "account_id" => aid(),
//        "title"=>$tag,
//        "type" => "companies",
//        "bg_color"=>"red"
//    ]);
//
//    TagData::firstOrCreate(["tag_id"=>$tag->id],[
//        "tag_id"=>$tag->id,
//        "doc_id"=>$company->id
//    ]);

//  }


        flash()->overlay($id == 0 ? "New companies created" : "Company updated", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'id' => $company->id];

    }

    public function show($company_id, $id)
    {
        $company = Companies::find($id);
        return view("modules.companies.show", compact("company"));
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
}
