@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Territory</h1>
    <a href="{{ route('territories.index') }}" class="btn btn-secondary mb-3">Back to Territories</a>
    <form method="POST" action="{{ route('territories.update', $territory->TerritoryID) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="TerritoryDescription">Description</label>
            <input type="text" class="form-control" name="TerritoryDescription" value="{{ $territory->TerritoryDescription }}" required>
        </div>
        <div class="form-group">
            <label for="RegionID">Region</label>
            <select class="form-control" name="RegionID" required>
                @foreach($regions as $region)
                    <option value="{{ $region->RegionID }}" {{ $territory->RegionID == $region->RegionID ? 'selected' : '' }}>
                        {{ $region->RegionDescription }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
