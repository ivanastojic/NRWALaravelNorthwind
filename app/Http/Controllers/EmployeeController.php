<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Territory; // Dodan import za Territory model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        // Učitavanje zaposlenika zajedno s teritorijima
        $employees = Employee::with('territories')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        // Učitavanje svih teritorija za kreiranje novog zaposlenika
        $territories = Territory::all();
        return view('employees.create', compact('territories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Notes' => 'required|string',
        ]);

        $employee = Employee::create($request->all());

        // Povezivanje teritorija s novim zaposlenikom (ako postoje)
        if ($request->has('territories')) {
            $employee->territories()->sync($request->territories);
        }

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $territories = Territory::all(); // Svi teritoriji za formu

        return view('employees.edit', compact('employee', 'territories'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validacija podataka
        $request->validate([
            'territories' => 'array',
            'territories.*' => 'exists:territories,TerritoryID',
        ]);

        // Ažuriraj teritorije zaposlenika
        $employee->territories()->sync($request->territories); // sync će povezati teritorije s zaposlenikom

        return redirect()->route('employees.index')->with('success', 'Zaposlenik i teritoriji ažurirani.');
    }

    public function destroy($id)
    {
        // Prvo obriši povezane zapise u employeeterritories
        DB::table('employeeterritories')->where('EmployeeID', $id)->delete();

        // Zatim obriši zaposlenika
        Employee::destroy($id);

        return redirect()->route('employees.index');
    }

}
