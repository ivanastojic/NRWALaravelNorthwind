@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Region</h1>
    <a href="{{ route('regions.index') }}" class="btn btn-secondary mb-3">Back to Regions</a>
    <form method="POST" action="{{ route('regions.update', $region) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>ID</label>
            <input type="text" class="form-control" value="{{ $region->RegionID }}" disabled>
        </div>
        <div class="form-group">
            <label for="RegionDescription">Description</label>
            <input type="text" class="form-control" name="RegionDescription" value="{{ $region->RegionDescription }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
