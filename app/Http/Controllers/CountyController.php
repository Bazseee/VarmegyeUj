<?php

// app/Http/Controllers/CountyController.php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function index()
    {
        $counties = County::orderBy('name')->get();
        return view('counties.list', compact('counties'));
    }

    public function create()
    {
        return view('counties.create');
    }

    public function store(Request $request)
    {
        County::create(['name' => $request->input('name')]);
        return redirect()->route('counties.index');
    }

    public function save(Request $request)
    {
        $data = ['name' => $request->input('name')];

        if ($request->has('id')) {
            // Módosítás
            $county = County::find($request->input('id'));
            $county->update($data);
        } else {
            // Új megye hozzáadása
            County::create($data);
        }

        return redirect()->route('counties.index');
    }

    public function filter(Request $request)
    {
        $counties = County::where('name', 'LIKE', '%' . $request->input('filter') . '%')->orderBy('name')->get();
        return view('counties.list', compact('counties'));
    }

    public function edit(County $county)
    {
        return view('counties.edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $county->update(['name' => $request->input('name')]);
        return redirect()->route('counties.index');
    }

    public function destroy(County $county)
    {
        $county->delete();
        return redirect()->route('counties.index');
    }

}

