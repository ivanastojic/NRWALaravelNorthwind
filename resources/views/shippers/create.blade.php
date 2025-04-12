@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Shipper</h1>
    <a href="{{ route('shippers.index') }}" class="btn btn-secondary mb-3">← Back to Shippers</a>

    <form action="{{ route('shippers.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="CompanyName">Company Name</label>
            <input type="text" class="form-control" name="CompanyName" required>
        </div>
        <div class="form-group mb-2">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" name="Phone">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
