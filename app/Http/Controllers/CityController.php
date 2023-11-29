<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function filterByCounty(Request $request)
    {
        $cities = City::where('cities_id', $request->input('cities_id'))->get();
        return response()->json(['cities' => $cities]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        City::create(['name' => $request->input('name')]);
        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $city->update(['name' => $request->input('name')]);
        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }

    public function index()
    {
        $city = City::orderBy('name')->get();
        return view('cities.index', compact('city'));
    }
}
