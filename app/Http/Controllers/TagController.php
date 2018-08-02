<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //json output according to tag type
    public function give($type){

        $datas = Tags::where('type', $type)->get("title","bg_color");

        return response()->json($datas);
    }
}
