<?php

namespace App\Http\Controllers\Modules\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        return view("modules.settings.sales.index");
    }
}
