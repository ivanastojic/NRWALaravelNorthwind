@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Back to Employees List</a>
        <h1>Edit Employee</h1>

        <form action="{{ route('employees.update', $employee->EmployeeID) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Existing Employee fields -->
            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" id="FirstName" class="form-control" value="{{ $employee->FirstName }}" required>
            </div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" id="LastName" class="form-control" value="{{ $employee->LastName }}" required>
            </div>

            <div class="form-group">
                <label for="Title">Title</label>
                <input type="text" name="Title" id="Title" class="form-control" value="{{ $employee->Title }}">
            </div>

            <div class="form-group">
                <label for="HireDate">Hire Date</label>
                <input type="date" name="HireDate" id="HireDate" class="form-control" value="{{ optional($employee->HireDate)->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="BirthDate">Birth Date</label>
                <input type="date" name="BirthDate" id="BirthDate" class="form-control" value="{{ optional($employee->BirthDate)->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" id="Address" class="form-control" value="{{ $employee->Address }}">
            </div>

            <div class="form-group">
                <label for="City">City</label>
                <input type="text" name="City" id="City" class="form-control" value="{{ $employee->City }}">
            </div>

            <div class="form-group">
                <label for="Country">Country</label>
                <input type="text" name="Country" id="Country" class="form-control" value="{{ $employee->Country }}">
            </div>

            <div class="form-group">
                <label for="HomePhone">Home Phone</label>
                <input type="text" name="HomePhone" id="HomePhone" class="form-control" value="{{ $employee->HomePhone }}">
            </div>

            <div class="form-group">
                <label for="Notes">Notes</label>
                <textarea name="Notes" id="Notes" class="form-control" rows="3" required>{{ $employee->Notes }}</textarea>
            </div>

            <div class="form-group">
                <label for="Salary">Salary</label>
                <input type="number" name="Salary" id="Salary" step="0.01" class="form-control" value="{{ $employee->Salary }}">
            </div>

            <!-- Add Territories field -->
            <div class="form-group">
                <label for="territories">Assign Territories</label>
                <select name="territories[]" id="territories" class="form-control" class="form-control bg-light text-dark" multiple>
                    @foreach($territories as $territory)
                        <option value="{{ $territory->TerritoryID }}" 
                            {{ in_array($territory->TerritoryID, old('territories', $employee->territories->pluck('TerritoryID')->toArray()) ) ? 'selected' : '' }}>
                            {{ $territory->TerritoryDescription }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
