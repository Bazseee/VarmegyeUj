<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function filterByCounty(Request $request)
    {
        $cities = City::where('county_id', $request->input('county_id'))->get();
        return response()->json(['cities' => $cities]);
    }
}
