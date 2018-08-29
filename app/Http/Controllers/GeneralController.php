<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /*jscript codes in blade*/
    public function script()
    {
        return view("general.script");
    }

}
