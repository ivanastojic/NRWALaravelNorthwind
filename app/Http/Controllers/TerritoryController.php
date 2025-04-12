<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Models\Region;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    
    public function index()
    {
        $territories = Territory::with('region')->get();
        return view('territories.index', compact('territories'));
    }

    
    public function create()
    {
        $regions = Region::all();
        return view('territories.create', compact('regions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'TerritoryID' => 'required|integer|unique:territories,TerritoryID',
            'TerritoryDescription' => 'required',
            'RegionID' => 'required|exists:region,RegionID',
        ]);

        Territory::create([
            'TerritoryID' => $request->TerritoryID,
            'TerritoryDescription' => $request->TerritoryDescription,
            'RegionID' => $request->RegionID,
        ]);

        return redirect()->route('territories.index');
    }

    
    public function show($id)
    {
        $territory = Territory::findOrFail($id);
        return view('territories.show', compact('territory'));
    }

   
    public function edit($id)
    {
        $territory = Territory::findOrFail($id);
        $regions = Region::all();
        return view('territories.edit', compact('territory', 'regions'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'TerritoryDescription' => 'required',
            'RegionID' => 'required|exists:region,RegionID',
        ]);

        $territory = Territory::findOrFail($id);
        $territory->update([
            'TerritoryDescription' => $request->TerritoryDescription,
            'RegionID' => $request->RegionID,
        ]);

        return redirect()->route('territories.index');
    }

    
    public function destroy($id)
    {
        $territory = Territory::findOrFail($id);
        $territory->delete();

        return redirect()->route('territories.index');
    }
}
