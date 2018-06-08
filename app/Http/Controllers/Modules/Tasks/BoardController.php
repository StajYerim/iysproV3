<?php

namespace App\Http\Controllers\Modules\Tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function index(){
        return view("modules.tasks.board.index");
    }
}
