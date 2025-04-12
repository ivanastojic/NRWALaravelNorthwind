@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary mb-3">← Back to Suppliers</a>
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="CompanyName">Company Name</label>
            <input type="text" class="form-control" id="CompanyName" name="CompanyName" value="{{ $supplier->CompanyName }}" required>
        </div>
        <div class="form-group">
            <label for="ContactName">Contact Name</label>
            <input type="text" class="form-control" id="ContactName" name="ContactName" value="{{ $supplier->ContactName }}">
        </div>
        <div class="form-group">
            <label for="ContactTitle">Contact Title</label>
            <input type="text" class="form-control" id="ContactTitle" name="ContactTitle" value="{{ $supplier->ContactTitle }}">
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" class="form-control" id="Address" name="Address" value="{{ $supplier->Address }}">
        </div>
        <div class="form-group">
            <label for="City">City</label>
            <input type="text" class="form-control" id="City" name="City" value="{{ $supplier->City }}">
        </div>
        <div class="form-group">
            <label for="Country">Country</label>
            <input type="text" class="form-control" id="Country" name="Country" value="{{ $supplier->Country }}">
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" id="Phone" name="Phone" value="{{ $supplier->Phone }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
