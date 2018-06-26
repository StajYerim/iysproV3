<?php

namespace App\Http\Controllers\Modules\Ecommerce;

use Illuminate\Http\Request;
use App;
use App\Account;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Ecommerce\Models\N11;
use App\Http\Controllers\Modules\Ecommerce\Models\ECommerce;
use Yajra\DataTables\Facades\DataTables;
use App\Model\Stock\Product\Product;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    protected $n11;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $account = Account::find(aid());
            $this->n11 = new N11([
                'appKey' => $account["n11_api_key"],
                'appSecret' => $account["n11_api_password"]
            ]);
            return $next($request);
        });
    }

    public function index() {
        return view("modules.ecommerce.products.index");
    }

    public function index_list() {
        $products = ECommerce::with('name')->where("account_id", aid());

        return Datatables::of($products)
            ->setRowClass("row-title")
            ->make(true);
    }

    public function addProduct(Request $request) {
        $product = Product::find($request->input('product'));
        $price = floatval(str_replace(',', '.', str_replace('.', '', $request->input('price'))));
        $image = $product->images->last()["name"] == null ? \URL::to("img/noimage.gif") : \URL::to(product_img_url($product->images->last()["name"]));

        if (App::environment('local')) {
            $image = "http://via.placeholder.com/350x200";
        }

        $response = $this->n11->SaveProduct([
            'productSellerCode' => $request->input('store_code'),
            'title' => $product->name,
            'subtitle' => $product->name,
            'description' => $request->input('description'),
            'attributes' => [],
            'category' => [
                'id' => $request->input('category'),
            ],
            'price' => $price,
            'currencyType' => 'TL',
            'images' => [
                'image' => [
                    'url' => $image,
                    'order' => 1
                ]
            ],
            'saleStartDate' => '',
            'saleEndDate' => '',
            'productionDate' => '',
            'expirationDate' => '',
            'discount' => '0',
            'productCondition' => '1',
            'preparingDay' => '1',
            'shipmentTemplate' => 'N11 Öder',
            'stockItems' => [
                'stockItem' => [
                    'quantity' => $request->input('stock'),
                    'sellerStockCode' => '',
                    'attributes' => [],
                    'optionPrice' => ''
                ]
            ]
        ]);

        $ecommerce = ECommerce::create([
            "account_id" => aid(),
            "ecommerce_id" => $response->product->id,
            "iyspro_id" => $product->id,
            "ecommerce_type" => "N11",
            "category" => $request->input('category'),
            "store_code" => $response->product->productSellerCode,
            "description" => $request->input('description'),
            "price" => $price,
            "stock" => $request->input('stock')
        ]);

        return redirect()->route('ecommerce.products.index', [ aid() ]);
    }

    public function categories($company_id, $category = null) {
        if ($category == null) {
            $categories = $this->n11->GetTopLevelCategories();
        } else {
            $categories = $this->n11->GetSubCategories($category);
        }
        return response()->json($categories);
    }
}
