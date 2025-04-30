@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders List</a>
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->OrderID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="CustomerID">Customer ID</label>
            <input type="text" name="CustomerID" class="form-control" value="{{ $order->CustomerID }}">
        </div>
        <div class="form-group">
            <label for="EmployeeID">Employee ID</label>
            <input type="number" name="EmployeeID" class="form-control" value="{{ $order->EmployeeID }}">
        </div>
        <div class="form-group">
            <label for="OrderDate">Order Date</label>
            <input type="date" name="OrderDate" class="form-control" value="{{ $order->OrderDate->format('Y-m-d') }}">
        </div>

        <h4>Order Products</h4>
        <div id="product-list">
            @foreach($order->products as $i => $product)
                <div class="product-item mb-2">
                    <select name="products[{{ $i }}][ProductID]" class="form-control d-inline-block w-25">
                        @foreach($products as $p)
                            <option value="{{ $p->ProductID }}" {{ $product->ProductID == $p->ProductID ? 'selected' : '' }}>
                                {{ $p->ProductName }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="products[{{ $i }}][Quantity]" class="form-control d-inline-block w-25" value="{{ $product->pivot->Quantity }}">
                    <input type="number" step="0.01" name="products[{{ $i }}][UnitPrice]" class="form-control d-inline-block w-25" value="{{ $product->pivot->UnitPrice }}">
                    <input type="number" step="0.01" name="products[{{ $i }}][Discount]" class="form-control d-inline-block w-25" value="{{ $product->pivot->Discount }}">
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addProduct()">Add Product</button>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<script>
    let index = {{ $order->products->count() }};
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
