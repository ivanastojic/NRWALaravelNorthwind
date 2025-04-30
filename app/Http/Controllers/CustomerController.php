<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Customerdemographic;



class CustomerController extends Controller
{
    // Prikaz svih kupaca
    public function index()
    {
        // Dohvati sve kupce zajedno s njihovim povezanim demografskim podacima
        $customers = Customer::with('demographics')->get();
        return view('customers.index', compact('customers'));
    }

    // Prikaz forme za kreiranje novog kupca
    public function create()
    {
        $demographics = Customerdemographic::all();
        return view('customers.create', compact('demographics'));
    }

    // Pohrana novog kupca
    public function store(Request $request)
    {
        $validated =$request->validate([
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

        $customer = Customer::create($validated); 

        if ($request->has('demographics')) {
            $customer->demographics()->attach($request->input('demographics'));
        }

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
        $demographics = Customerdemographic::all();
        return view('customers.edit', compact('customer', 'demographics'));
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
        if ($request->has('demographics')) {
            $customer->demographics()->sync($request->input('demographics'));
        }
      
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Brisanje kupca
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->demographics()->detach();
        $customer->delete();  

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
    public function addDemographicsToCustomer(Request $request, $customerId)
    {
        // Pronađi kupca po ID-u
        $customer = Customer::findOrFail($customerId);

        // Poveži kupca s novim demografskim podacima
        $customer->demographics()->syncWithoutDetaching($request->demographics);

        // Redirekcija na prikaz kupca s porukom o uspjehu
        return redirect()->route('customers.show', $customerId)->with('success', 'Demografski podaci dodani.');
    }
}
