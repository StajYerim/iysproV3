<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Model\Stock\Product\Category;
use App\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryAndTagsController extends Controller
{
    public function index()
    {
        return view("modules.settings.categoryandtags.index");
    }

    public function data()
    {
        $tags = Tags::all();
        $data["sales_orders"] = array();
        $data["purchases_orders"] = array();
        $data["companies"] = array();
        $data["expenses"] = array();
        $data["sales_offers"] = array();
        $data["purchase_offers"] = array();
        $data["expenses"] = array();
        $data["products"] = array();


        foreach ($tags as $tag) {

            if ($tag->type == "sales_orders") {
                array_push($data["sales_orders"], $tag);
            } else if ($tag->type == "purchases_orders") {
                array_push($data["purchases_orders"], $tag);
            } else if ($tag->type == "companies") {
                array_push($data["companies"], $tag);
            } else if ($tag->type == "expenses") {
                array_push($data["expenses"], $tag);
            } else if ($tag->type == "sales_offers") {
                array_push($data["sales_offers"], $tag);
            } else if ($tag->type == "purchase_offers") {
                array_push($data["purchase_offers"], $tag);
            } else if ($tag->type == "expenses") {
                array_push($data["expenses"], $tag);
            }
        }

        $categories = Category::All();
        foreach ($categories as $category) {
            array_push($data["products"], $category);
        }


        return response()->json($data);

    }

    public function add_update(Request $request)
    {
        if($request->type != "product"){
        Tags::updateOrCreate(["id" => $request->id],
            [
                "account_id"=>aid(),
                "title"=>$request->title,
                "type"=>$request->type,
                "bg_color"=>$request->bg_color
            ]);
        }else{
            Category::updateOrCreate(["id" => $request->id],
                [
                    "account_id"=>aid(),
                    "name"=>$request->title,
                    "type"=>$request->type,
                    "color"=>$request->bg_color
                ]);
        }
    }

    public function delete(Request $request)
    {
        if($request->category == 0){
        Tags::destroy($request->id);
        }else{
            Category::destroy($request->id);
        }
    }
}
