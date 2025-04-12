@extends('layouts.app')

@section('content')
<a href="{{ route('customerdemographics.index') }}" class="btn btn-secondary mt-3">Back to Customer Demographics List</a>
    <h1>Create New Customer Demographic</h1>

    <form action="{{ route('customerdemographics.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="CustomerTypeID">Customer Type ID</label>
        <input type="text" name="CustomerTypeID" id="CustomerTypeID" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="CustomerDesc">Customer Description</label>
        <input type="text" name="CustomerDesc" id="CustomerDesc" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
