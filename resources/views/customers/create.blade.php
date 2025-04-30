<!-- resources/views/customers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to Customers List</a>
        <h1>Create New Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="CustomerID">Customer ID</label>
                <input type="text" name="CustomerID" id="CustomerID" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="CompanyName">Company Name</label>
                <input type="text" name="CompanyName" id="CompanyName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ContactName">Contact Name</label>
                <input type="text" name="ContactName" id="ContactName" class="form-control">
            </div>
            <div class="form-group">
                <label for="ContactTitle">Contact Title</label>
                <input type="text" name="ContactTitle" id="ContactTitle" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label>Demografski podaci:</label><br>
                @foreach ($demographics as $demo)
                    <div class="form-check">
                        <input type="checkbox" name="demographics[]" value="{{ $demo->CustomerTypeID }}" class="form-check-input" id="demo_{{ $demo->CustomerTypeID }}">
                        <label class="form-check-label" for="demo_{{ $demo->CustomerTypeID }}">{{ $demo->CustomerDesc }}</label>
                     </div>
                @endforeach
            </div>

            <!-- Add other fields as necessary -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
