@extends('layouts.app')

@section('content')
<a href="{{ route('customerdemographics.index') }}" class="btn btn-secondary mt-3">Back to Customer Demographics List</a>
    <h1>Edit Customer Demographic</h1>

    <form action="{{ route('customerdemographics.update', $customerdemographic->CustomerTypeID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="CustomerTypeID">Customer Type ID</label>
            <input type="text" name="CustomerTypeID" id="CustomerTypeID" class="form-control" value="{{ $customerdemographic->CustomerTypeID }}" required>
        </div>
        <div class="form-group">
            <label for="CustomerDesc">Customer Description</label>
            <input type="text" name="CustomerDesc" id="CustomerDesc" class="form-control" value="{{ $customerdemographic->CustomerDesc }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
