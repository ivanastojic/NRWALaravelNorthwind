<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\Employee;


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
        $employees = Employee::all(); // Svi zaposlenici
        $regions = Region::all();
        return view('territories.edit', compact('territory', 'employees', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $territory = Territory::findOrFail($id);

        // Validacija podataka
        $request->validate([
            'TerritoryDescription' => 'required|string',
            'RegionID' => 'required|exists:region,RegionID',
            'employees' => 'array',
            'employees.*' => 'exists:employees,EmployeeID',
        ]);

        // Ažuriraj podatke teritorija
        $territory->update([
            'TerritoryDescription' => $request->TerritoryDescription,
            'RegionID' => $request->RegionID,
        ]);

        // Ažuriraj zaposlenike na teritoriju
        $territory->employees()->sync($request->employees); // sync će povezati zaposlenike s teritorijem

        return redirect()->route('territories.index')->with('success', 'Territorij i zaposlenici ažurirani.');
    }


    
    public function destroy($id)
    {
        $territory = Territory::findOrFail($id);
        $territory->delete();

        return redirect()->route('territories.index');
    }
}
