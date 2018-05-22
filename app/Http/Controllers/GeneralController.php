<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function script()
    {
        return view("general.script");
    }

    public function test(Request $request){

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',

        ]);

        return "success";

}
}
