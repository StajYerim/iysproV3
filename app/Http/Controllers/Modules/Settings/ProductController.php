<?php

namespace App\Http\Controllers\Modules\Settings;

use App\Units;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $units = Units::where("status", 1)->get();
        return view("modules.settings.product.index",compact("units"));
    }
}
