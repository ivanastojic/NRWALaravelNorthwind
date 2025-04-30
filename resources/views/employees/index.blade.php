@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employees</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Create New Employee</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th>Hire Date</th>
                    <th>Territories</th> <!-- Added column for territories -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->EmployeeID }}</td>
                        <td>{{ $employee->FirstName }}</td>
                        <td>{{ $employee->LastName }}</td>
                        <td>{{ $employee->Title }}</td>
                        <td>{{ $employee->HireDate ? $employee->HireDate->format('Y-m-d') : '-' }}</td>
                        
                        <!-- Display the territories associated with the employee -->
                        <td>
                            @if($employee->territories->isNotEmpty())
                                @foreach($employee->territories as $territory)
                                    <span class="badge badge-secondary">{{ $territory->TerritoryDescription }}</span><br>
                                @endforeach
                            @else
                                No territories assigned
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('employees.edit', $employee->EmployeeID) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->EmployeeID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
