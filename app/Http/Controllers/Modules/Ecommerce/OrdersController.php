<?php

namespace App\Http\Controllers\Modules\Ecommerce;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index(){
        return view("modules.ecommerce.orders.index");
    }
}
