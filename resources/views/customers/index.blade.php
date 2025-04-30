<!-- resources/views/customers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customers</h1>
        <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Create New Customer</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>CustomerID</th>
                    <th>Company Name</th>
                    <th>Contact Name</th>
                    <th>Demographics</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->CustomerID }}</td>
                        <td>{{ $customer->CompanyName }}</td>
                        <td>{{ $customer->ContactName }}</td>
                        <td>
                            @foreach ($customer->demographics as $demographic)
                                <span class="badge badge-secondary text-light">{{ $demographic->CustomerTypeID }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->CustomerID) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->CustomerID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
