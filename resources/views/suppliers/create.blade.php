@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mb-3">← Back to Suppliers</a>

    <h1>Create Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CompanyName">Company Name</label>
            <input type="text" class="form-control" id="CompanyName" name="CompanyName" required>
        </div>
        <div class="form-group">
            <label for="ContactName">Contact Name</label>
            <input type="text" class="form-control" id="ContactName" name="ContactName">
        </div>
        <div class="form-group">
            <label for="ContactTitle">Contact Title</label>
            <input type="text" class="form-control" id="ContactTitle" name="ContactTitle">
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" class="form-control" id="Address" name="Address">
        </div>
        <div class="form-group">
            <label for="City">City</label>
            <input type="text" class="form-control" id="City" name="City">
        </div>
        <div class="form-group">
            <label for="Country">Country</label>
            <input type="text" class="form-control" id="Country" name="Country">
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" id="Phone" name="Phone">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
