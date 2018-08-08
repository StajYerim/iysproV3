<?php

namespace App\Http\Controllers\Modules\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        return view('modules.production.calendar.index');
    }
}
