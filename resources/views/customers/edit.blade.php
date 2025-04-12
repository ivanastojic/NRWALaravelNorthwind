<!-- resources/views/customers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Back to Customers List</a>
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->CustomerID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="CompanyName">Company Name</label>
                <input type="text" name="CompanyName" id="CompanyName" class="form-control" value="{{ $customer->CompanyName }}" required>
            </div>
            <div class="form-group">
                <label for="ContactName">Contact Name</label>
                <input type="text" name="ContactName" id="ContactName" class="form-control" value="{{ $customer->ContactName }}">
            </div>
            <div class="form-group">
                <label for="ContactTitle">Contact Title</label>
                <input type="text" name="ContactTitle" id="ContactTitle" class="form-control" value="{{ $customer->ContactTitle }}">
            </div>
            <!-- Add other fields as necessary -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
