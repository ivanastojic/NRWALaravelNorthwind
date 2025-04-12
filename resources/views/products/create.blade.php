@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">← Back to Products</a>

    <h1>Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-3">
            <label for="ProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="ProductName" required>
        </div>

        <div class="mb-3">
            <label for="CategoryID" class="form-label">Category</label>
            <select name="CategoryID" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="SupplierID" class="form-label">Supplier</label>
            <select name="SupplierID" class="form-control">
                <option value="">-- Select Supplier --</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->SupplierID }}">{{ $supplier->CompanyName }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="UnitPrice" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="UnitPrice">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="Discontinued" value="1">
            <label class="form-check-label">Discontinued</label>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
