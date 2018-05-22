<?php

namespace App\Http\Controllers;

use App\City;
use App\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function city(Request $request,$id){
      $term = $request->get('query');
      $results = array();
      $queries = City::where('city', 'like', '%' . $term . '%')->take(5)->get();

      foreach ($queries as $query) {
          $results[] = [
              'id' => $query->id,
              'value' => $query->city
          ];
      }

      $data = [];
      $data["suggestions"] = $results;
      return $data;
  }


    public function county(Request $request,$id){
        $term = $request->get('query');
        $results = array();
        $queries = County::where('county', 'like', '%' . $term . '%')->take(5)->get();

        foreach ($queries as $query) {
            $results[] = [
                'id' => $query->id,
                'value' => $query->county,
                'city' => $query->city["city"],
            ];
        }

        $data = [];
        $data["suggestions"] = $results;
        return $data;
    }
}
