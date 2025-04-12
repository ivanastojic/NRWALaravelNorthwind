<?php
namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('regions.index', compact('regions'));
    }

    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'RegionID' => 'required|integer|unique:region,RegionID',
            'RegionDescription' => 'required|string|max:255',
        ]);

        Region::create([
            'RegionID' => $request->RegionID,
            'RegionDescription' => $request->RegionDescription,
        ]);
        
        return redirect()->route('regions.index')->with('success', 'Region created successfully.');
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'RegionDescription' => 'required|string|max:255',
        ]);

        $region->update($request->all());

        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('regions.index')->with('success', 'Region deleted successfully.');
    }
}
