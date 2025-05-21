<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Territory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('territories')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
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

        if ($request->has('territories')) {
            $employee->territories()->sync($request->territories);
        }

        return redirect()->route('employees.index')->with('success', 'Zaposlenik uspješno dodan.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $territories = Territory::all();

        return view('employees.edit', compact('employee', 'territories'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Title' => 'nullable|string|max:255',
            'HireDate' => 'nullable|date',
            'BirthDate' => 'nullable|date',
            'Address' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'Country' => 'nullable|string|max:255',
            'HomePhone' => 'nullable|string|max:50',
            'Notes' => 'required|string',
            'Salary' => 'nullable|numeric',
            'territories' => 'array',
            'territories.*' => 'exists:territories,TerritoryID',
        ]);

        // Ažuriranje osnovnih podataka zaposlenika
        $employee->update($request->only([
            'FirstName',
            'LastName',
            'Title',
            'HireDate',
            'BirthDate',
            'Address',
            'City',
            'Country',
            'HomePhone',
            'Notes',
            'Salary'
        ]));

        // Ažuriranje teritorija
        $employee->territories()->sync($request->territories);

        return redirect()->route('employees.index')->with('success', 'Zaposlenik i teritoriji ažurirani.');
    }

    public function destroy($id)
    {
        DB::table('employeeterritories')->where('EmployeeID', $id)->delete();
        Employee::destroy($id);

        return redirect()->route('employees.index');
    }
}
