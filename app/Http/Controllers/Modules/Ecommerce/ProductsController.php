<?php

namespace App\Http\Controllers\Modules\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(){
        return view("modules.ecommerce.products.index");
    }
}
