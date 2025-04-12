@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Shipper</h1>
    <a href="{{ route('shippers.index') }}" class="btn btn-secondary mb-3">← Back to Shippers</a>

    <form action="{{ route('shippers.update', $shipper) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label for="CompanyName">Company Name</label>
            <input type="text" class="form-control" name="CompanyName" value="{{ $shipper->CompanyName }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" name="Phone" value="{{ $shipper->Phone }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
