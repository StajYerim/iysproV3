<?php

namespace App\Http\Controllers\SettingsManager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   public function index(){
       return view("settingsManager.product");
   }
}
