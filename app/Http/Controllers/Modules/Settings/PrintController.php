<?php

namespace App\Http\Controllers\Modules\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function index()
    {
        return view("modules.settings.print.index");
    }
}
