@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Territory</h1>
    <a href="{{ route('territories.index') }}" class="btn btn-secondary mb-3">Back to Territories</a>
    <form method="POST" action="{{ route('territories.store') }}">
        @csrf
        <div class="form-group">
           <label for="TerritoryID">Territory ID</label>
           <input type="text" name="TerritoryID" id="TerritoryID" class="form-control" value="{{ old('TerritoryID') }}" required>
        </div>
        <div class="form-group">
             <label for="TerritoryDescription">Territory Description</label>
             <input type="text" name="TerritoryDescription" id="TerritoryDescription" class="form-control" value="{{ old('TerritoryDescription') }}" required>
        </div>
        <div class="form-group">
             <label for="RegionID">Region ID</label>
             <input type="number" name="RegionID" id="RegionID" class="form-control" value="{{ old('RegionID') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Territory</button>
    </form>
</div>
@endsection
