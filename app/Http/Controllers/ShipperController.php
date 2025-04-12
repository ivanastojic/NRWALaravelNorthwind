<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    public function index()
    {
        $shippers = Shipper::all();
        return view('shippers.index', compact('shippers'));
    }

    public function create()
    {
        return view('shippers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CompanyName' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:50',
        ]);

        Shipper::create($request->only('CompanyName', 'Phone'));
        return redirect()->route('shippers.index')->with('success', 'Shipper created successfully.');
    }

    public function edit($id)
    {
        $shipper = Shipper::findOrFail($id);
        return view('shippers.edit', compact('shipper'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'CompanyName' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:50',
        ]);

        $shipper = Shipper::findOrFail($id);
        $shipper->update($request->only('CompanyName', 'Phone'));

        return redirect()->route('shippers.index')->with('success', 'Shipper updated successfully.');
    }

    public function destroy($id)
    {
        $shipper = Shipper::findOrFail($id);
        $shipper->delete();

        return redirect()->route('shippers.index')->with('success', 'Shipper deleted successfully.');
    }
}
