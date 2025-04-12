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
        $customerdemographic->update($request->all());

        return redirect()->route('customerdemographics.index');
    }

    // Brisanje Customerdemographic
    public function destroy($id)
    {
        $customerdemographic = Customerdemographic::findOrFail($id);
        $customerdemographic->delete();

        return redirect()->route('customerdemographics.index');
    }
}
