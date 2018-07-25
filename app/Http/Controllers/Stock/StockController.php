<?php

namespace App\Http\Controllers\Stock;

use App\Account;

use App\Currency;
use App\Model\Parasut;
use App\Model\Stock\Product\Barcode;
use App\Model\Stock\Product\Category;
use App\Model\Stock\Product\Product;
use App\Model\Stock\Product\ProductDescriptions;
use App\Model\Stock\Product\ProductImage;
use App\Images;
use Validator;
use Faker\Provider\Image;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    public function index()
    {
        return view("modules.stock.products.index");
    }

    public function index_list()
    {
        $products = Product::with("stock_receipts","named", "category")->select("products.*")->where("account_id", aid());

        return Datatables::of($products)
            ->setRowAttr([
                'onclick' => function ($product) {
                    return "product_update($product->id)";
                },
            ])
            ->editColumn("named.name",function($product){
                return $product->named["name"]." <span class='badge' style='background-color:".$product->category["color"]."'>".$product->category["name"]."</span><span class='badge' style='background-color:success'>".$product->type_name."</span>";

            })
            ->editColumn("inventory_tracking",function($product){

                if($product->type_id == 1 or $product->type_id == 4){
                    return $product->stock_count."/- ".$product->unit["short_name"];
                }else{
                    return $product->stock_count."/".$product->order_count." ".$product->unit["short_name"];
                }

            })
            ->rawColumns(["id","named.name"])
            ->setRowClass("row-title")
            ->make(true);
    }

    public function form($aid, $id, $type)
    {

        $product = $type != "new" ? Product::find($id) : "";
        $form_type = $type;
        $units = Account::find(aid())->units;
        $categories = Category::where("account_id", aid())->get();
        $currency = Currency::All();
        return view("modules.stock.products.form", compact("form_type", "product", "units", "categories", "currency"));
    }

    public function product_store($aid, $id, Request $request)
    {
        $model = new Product();
        $validator = Validator::make($request->all(),$model->rules);
        if ($validator->fails()) {
            return view("validate_error")->withErrors($validator);
        }


        //Product or Create
        $product = Product::updateOrCreate(
            ["id" => $id],
            [
                "account_id" => aid(),
                "code" => $request->code,
                "category_id" => $request->category_id,
                "unit_id" => $request->unit_id,
                "inventory_tracking" => $request->inventory_tracking,
                "type_id" => $request->type_id,
                "buying_currency" => $request->buying_currency,
                "currency" => $request->currency,
                "archived" => 0,
                "buying_price" => $request->buying_price,
                "list_price" => $request->list_price,
                "vat_rate" => $request->vat_rate
            ]
        );

        ProductDescriptions::where("product_id", $id)->where("lang_code", $request->name_lang)->delete();
        $name_lang = new ProductDescriptions(["name" => $request->name, "lang_code" => $request->name_lang]);
        $product->names()->save($name_lang);

        if ($request->image_id != null) {
            ProductImage::create(["image_id" => $request->image_id, "product_id" => $product->id, "account_id" => aid()]);
        }

        if ($request->barcode) {
            Barcode::updateOrCreate(["product_id" => $product->id],
                [
                    "barcode" => $request->barcode,
                ]
            );
        } else {

            $barcode = Barcode::where("product_id", $product->id)->first();
            if (isset($barcode)) {
                $barcode->delete();
            }

        }

        flash()->overlay($id == 0 ? "New product created" : "Product updated", 'Success')->success();
        sleep(1);

        return ["message" => "success", 'id' => $product->id];

    }


    public function show($aid, $id)
    {
        $product = Product::find($id);
        $movements = $product->movements()->paginate(5);
        return view("modules.stock.products.show", compact("product","movements"));
    }

    public function image_upload($aid, Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

        $input['imagename'] = sha1(time()) . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images/account/' . aid() . '/product/');

        $image->move($destinationPath, $input['imagename']);

        $image = Images::create(["name" => $input["imagename"], "type" => "product"]);

        return array(["status" => "success", "image" => $input["imagename"], "patch" => $destinationPath, "id" => $image->id]);


    }

    public function image_delete($aid, Request $request)
    {
        $image = Images::where("name", $request->id)->where("type", "product")->first();

        ProductImage::where("product_id", $image->id)->where("account_id", $aid)->delete();
        $image->delete();


        unlink(public_path('/images/account/' . aid() . '/product/' . $request->id));
    }

    public function category($aid, Request $request)
    {

        $term = $request->get('query');
        $results = array();
        $queries = Category::where("account_id", aid())->where('name', 'like', '%' . $term . '%')->get();
        foreach ($queries as $query) {
            $results[] = [
                'id' => $query->id,
                'value' => $query->name,
                'color' => $query->color
            ];
        }
        $data = [];
        $data["suggestions"] = $results;
        return $data;
    }


    public function destroy($aid, $id)
    {
        Product::destroy($id);

        flash()->overlay("Product deleted", 'Success')->success();
        sleep(1);
        return ["message" => "success", 'type' => "product"];

    }


    public function new_category($aid, Request $request)
    {

        // New Category
        $data = Category::firstOrCreate(
            ["account_id" => aid(), "name" => $request->name],

            [
                "account_id" => aid(),
                "name" => $request->name,
                "type" => "product",
                "color" => rand_color()
            ]
        );

        return $data;
    }

    public function language($aid, Request $request)
    {
        $product = Product::find($request->product_id);
        return $product->lang($request->product_id, $request->code);
    }

    public function product($aid, Request $request)
    {
        $term = $request->get('q');
        $results = array();
        $queries = Product::where("account_id", aid())->whereOr('name', 'like', '%' . $term . '%')->whereOr('code', 'like', '%' . $term . '%')->get();
        foreach ($queries as $query) {
            $results[] = [
                'id' => $query->id,
                'text' => $query->company_name,
            ];
        }

        return $results;
    }

//    public function product_source($aid, Request $request)
//    {
//
//        $term = $request->get('q');
//        $results = array();
//        $queries = Product::where("account_id", aid())->orWhere('code', 'like', '%' . $term . '%')->whereHas("named",function($q,$search = $term){
//            $q->where('name', 'like',  '%' . $search . '%');
//        })->get();
//
//
//        foreach ($queries as $query) {
//            $results[] = [
//                'id' => $query->id,
//                'text' => $query->name." (".$query->code.")",
//            ];
//        }
//
//        return $results;
//
//    }

    public function sync_with_parasut($aid, $id) {
      $product = Product::find($id);
      $parasut_product = \App::make('App\Parasut')->sync_stock_product($product);
      $pivot_product = Parasut::where('app_record_id', $parasut_product['product']['id'])->get()->first();
      if (!$pivot_product) {
        Parasut::create([
          'our_id' => $id,
          'app_api' => '',
          'app_record_id' => $parasut_product['product']['id'],
          'type' => 'Product',
        ]);
      }
      return redirect()->route('stock.product.show', [ $aid, $id ]);
    }

    public function movements($aid,$id){
      $product=  Product::find($id);

      return  response()->json($product->movements()->with("receipt","receipt.company","unit","product")->paginate(5));
    }
}
