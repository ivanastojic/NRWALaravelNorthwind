@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suppliers</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Create Supplier</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->CompanyName }}</td>
                    <td>{{ $supplier->ContactName }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
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
