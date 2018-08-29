<?php

namespace App\Http\Controllers;

use App\City;
use App\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /*
     * City search autocomplete
     **/
  public function city(Request $request,$id){
      $term = $request->get('query');
      $data = City::where('city', 'like', '%' . $term . '%')->take(5)->get();

      $results = collect($data)->toArray();

      $data = [];
      $data["suggestions"] = $results;
      return $data;
  }

    /*County search autocomplete*/
    public function county(Request $request,$id){
        $term = $request->get('query');
        $data = County::where('county', 'like', $term . '%')->take(10)->get();
        $results = collect($data)->toArray();
        $data = [];
        $data["suggestions"] = $results;
        return $data;
    }
}
