<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Prikaz svih dobavljača
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Prikaz forme za kreiranje novog dobavljača
    public function create()
    {
        return view('suppliers.create');
    }

    // Spremanje novog dobavljača
    public function store(Request $request)
    {
        $request->validate([
            'CompanyName' => 'required|max:255',
            'ContactName' => 'nullable|max:255',
            'ContactTitle' => 'nullable|max:255',
            'Address' => 'nullable|max:255',
            'City' => 'nullable|max:255',
            'Country' => 'nullable|max:255',
            'Phone' => 'nullable|max:255',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }

    // Prikaz forme za uređivanje dobavljača
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    // Ažuriranje dobavljača
    public function update(Request $request, $id)
    {
        $request->validate([
            'CompanyName' => 'required|max:255',
            'ContactName' => 'nullable|max:255',
            'ContactTitle' => 'nullable|max:255',
            'Address' => 'nullable|max:255',
            'City' => 'nullable|max:255',
            'Country' => 'nullable|max:255',
            'Phone' => 'nullable|max:255',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    // Brisanje dobavljača
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
}
