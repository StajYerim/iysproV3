<?php

namespace App\Http\Controllers\Modules\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view("modules.settings.product.index");
    }
}
