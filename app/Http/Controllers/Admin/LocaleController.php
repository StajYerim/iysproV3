<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
   public function index()
   {
       $langs = Language::All();

       return view("admin.locale.index",compact("langs"));

   }
}
