<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function give($type){

        $datas = Tags::where('type', $type)->get();

        return response()->json($datas);
    }
}
