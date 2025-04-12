@extends('layouts.app')

@section('content')
    <h1>Customer Demographics</h1>
    <a href="{{ route('customerdemographics.create') }}" class="btn btn-primary">Add New</a>

    <table class="table">
        <thead>
            <tr>
                <th>Customer Type ID</th>
                <th>Customer Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customerdemographics as $customerdemographic)
                <tr>
                    <td>{{ $customerdemographic->CustomerTypeID }}</td>
                    <td>{{ $customerdemographic->CustomerDesc }}</td>
                    <td>
                        <a href="{{ route('customerdemographics.edit', $customerdemographic->CustomerTypeID) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customerdemographics.destroy', $customerdemographic->CustomerTypeID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
