@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders List</a>
    <h1>Create New Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CustomerID">Customer ID</label>
            <select name="CustomerID" class="form-control">
                @foreach($customers as $customer)
                    <option value="{{ $customer->CustomerID }}">{{ $customer->CompanyName }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="EmployeeID">Employee ID</label>
            <select name="EmployeeID" class="form-control">
                @foreach($employees as $employee)
                     <option value="{{ $employee->EmployeeID }}">{{ $employee->FirstName }} {{ $employee->LastName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="OrderDate">Order Date</label>
            <input type="date" name="OrderDate" class="form-control">
        </div>

        <h4>Order Products</h4>
        <div id="product-list">
            <div class="product-item mb-2">
                <select name="products[0][ProductID]" class="form-control d-inline-block w-25">
                    @foreach($products as $product)
                        <option value="{{ $product->ProductID }}">{{ $product->ProductName }}</option>
                    @endforeach
                </select>
                <input type="number" name="products[0][Quantity]" class="form-control d-inline-block w-25" placeholder="Quantity">
                <input type="number" step="0.01" name="products[0][UnitPrice]" class="form-control d-inline-block w-25" placeholder="Unit Price">
                <input type="number" step="0.01" name="products[0][Discount]" class="form-control d-inline-block w-25" placeholder="Discount">
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addProduct()">Add Product</button>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
    let index = 1;
    function addProduct() {
        const productList = document.getElementById('product-list');
        const newItem = document.createElement('div');
        newItem.className = 'product-item mb-2';
        newItem.innerHTML = `
            <select name="products[${index}][ProductID]" class="form-control d-inline-block w-25">
                @foreach($products as $product)
                    <option value="{{ $product->ProductID }}">{{ $product->ProductName }}</option>
                @endforeach
            </select>
            <input type="number" name="products[${index}][Quantity]" class="form-control d-inline-block w-25" placeholder="Quantity">
            <input type="number" step="0.01" name="products[${index}][UnitPrice]" class="form-control d-inline-block w-25" placeholder="Unit Price">
            <input type="number" step="0.01" name="products[${index}][Discount]" class="form-control d-inline-block w-25" placeholder="Discount">
        `;
        productList.appendChild(newItem);
        index++;
    }
</script>
@endsection
