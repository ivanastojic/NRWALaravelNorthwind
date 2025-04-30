<?php
namespace App\Http\Controllers;

use App\Models\Customerdemographic;
use Illuminate\Http\Request;

class CustomerdemographicController extends Controller
{
    // Prikaz svih Customerdemographic
    public function index()
    {
        $customerdemographics = Customerdemographic::all();
        return view('customerdemographics.index', compact('customerdemographics'));
    }

    // Prikaz forme za kreiranje novog Customerdemographic
    public function create()
    {
        return view('customerdemographics.create');
    }

    // Spremanje novog Customerdemographic u bazu
    public function store(Request $request)
    {
        $request->validate([
            'CustomerTypeID' => 'required|string|max:255|unique:customerdemographics',
            'CustomerDesc' => 'nullable|string|max:255',
        ]);

        Customerdemographic::create($request->all());

        return redirect()->route('customerdemographics.index');
    }

    // Prikazivanje pojedinog Customerdemographic
    public function show($id)
    {
        $customerdemographic = Customerdemographic::findOrFail($id);
        return view('customerdemographics.show', compact('customerdemographic'));
    }

    // Prikaz forme za uređivanje Customerdemographic
    public function edit($id)
    {
        $customerdemographic = Customerdemographic::findOrFail($id);
        return view('customerdemographics.edit', compact('customerdemographic'));
    }

    // Ažuriranje postojećeg Customerdemographic
    public function update(Request $request, $id)
    {
        $request->validate([
            'CustomerTypeID' => 'required|string|max:255',
            'CustomerDesc' => 'nullable|string|max:255',
        ]);

        $customerdemographic = Customerdemographic::findOrFail($id);
        $customerdemographic->update([
            'CustomerTypeID' => $request->input('CustomerTypeID'),
            'CustomerDesc' => $request->input('CustomerDesc'),
        ]);
    
        // Preusmjeri na popis s uspješnom porukom
        return redirect()->route('customerdemographics.index')->with('success', 'Customer demographic updated successfully.');
    }

    // Brisanje Customerdemographic
    public function destroy($id)
    {
        // Pronađi demografski zapis
        $demographic = \App\Models\Customerdemographic::findOrFail($id);
    
        // Odspoji sve povezane kupce (pomoću pivot tablice)
        $demographic->customers()->detach();
    
        // Obriši demografski zapis
        $demographic->delete();
    
        // Vrati se na listu s porukom
        return redirect()->route('customerdemographics.index')->with('success', 'Demografski podatak uspješno obrisan.');
    }
    
}
