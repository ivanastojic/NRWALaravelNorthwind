<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Prikaz svih kupaca
    public function index()
    {
        $customers = Customer::all();  
        return view('customers.index', compact('customers'));
    }

    // Prikaz forme za kreiranje novog kupca
    public function create()
    {
        return view('customers.create');
    }

    // Pohrana novog kupca
    public function store(Request $request)
    {
        $request->validate([
            'CustomerID' => 'required|string|max:5|unique:customers',
            'CompanyName' => 'required|string|max:100',
            'ContactName' => 'nullable|string|max:100',
            'ContactTitle' => 'nullable|string|max:100',
            'Address' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:100',
            'Region' => 'nullable|string|max:100',
            'PostalCode' => 'nullable|string|max:20',
            'Country' => 'nullable|string|max:100',
            'Phone' => 'nullable|string|max:50',
            'Fax' => 'nullable|string|max:50',
        ]);

        Customer::create($request->all());  

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Prikaz pojedinog kupca
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // Prikaz forme za uređivanje kupca
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Ažuriranje podataka o kupcu
    public function update(Request $request, $id)
    {
        $request->validate([
            'CompanyName' => 'required|string|max:100',
            'ContactName' => 'nullable|string|max:100',
            'ContactTitle' => 'nullable|string|max:100',
            'Address' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:100',
            'Region' => 'nullable|string|max:100',
            'PostalCode' => 'nullable|string|max:20',
            'Country' => 'nullable|string|max:100',
            'Phone' => 'nullable|string|max:50',
            'Fax' => 'nullable|string|max:50',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());  

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Brisanje kupca
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();  

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
