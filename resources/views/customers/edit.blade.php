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
            <div class="form-group">
                    <label>Demografski podaci:</label>
                     @foreach ($demographics as $demo)
                            <div class="form-check">
                                <input type="checkbox" name="demographics[]" value="{{ $demo->CustomerTypeID }}" 
                                    class="form-check-input"
                                    id="demo_{{ $demo->CustomerTypeID }}"
                                    {{ isset($customer) && $customer->demographics->contains($demo->CustomerTypeID) ? 'checked' : '' }}>
                                <label class="form-check-label" for="demo_{{ $demo->CustomerTypeID }}">
                                    {{ $demo->CustomerDesc }}
                                </label>
                           </div>
                    @endforeach
            </div>

            <!-- Add other fields as necessary -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
