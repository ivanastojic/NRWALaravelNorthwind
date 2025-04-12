@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Region Details</h1>
    <p><strong>ID:</strong> {{ $region->RegionID }}</p>
    <p><strong>Description:</strong> {{ $region->RegionDescription }}</p>
    <a href="{{ route('regions.index') }}" class="btn btn-secondary">Back to Regions</a>
</div>
@endsection
