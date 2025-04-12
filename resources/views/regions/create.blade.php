@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Region</h1>
    <a href="{{ route('regions.index') }}" class="btn btn-secondary mb-3">Back to Regions</a>
    <form method="POST" action="{{ route('regions.store') }}">
        @csrf
        <div class="form-group">
            <label for="RegionID">ID</label>
            <input type="number" id='RegionID' class="form-control" name="RegionID" required>
        </div>
        <div class="form-group">
            <label for="RegionDescription">Description</label>
            <input type="text" class="form-control" name="RegionDescription" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
