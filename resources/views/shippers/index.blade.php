@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shippers</h1>
    <a href="{{ route('shippers.create') }}" class="btn btn-primary">Create Shipper</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shippers as $shipper)
                <tr>
                    <td>{{ $shipper->CompanyName }}</td>
                    <td>{{ $shipper->Phone }}</td>
                    <td>
                        <a href="{{ route('shippers.edit', $shipper) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('shippers.destroy', $shipper) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
