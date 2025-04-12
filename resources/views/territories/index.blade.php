@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Territories</h1>
    <a href="{{ route('territories.create') }}" class="btn btn-primary mb-3">Create Territory</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Region</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($territories as $territory)
                <tr>
                    <td>{{ $territory->TerritoryID }}</td>
                    <td>{{ $territory->TerritoryDescription }}</td>
                    <td>{{ $territory->region->RegionDescription }}</td>
                    <td>

                        <a href="{{ route('territories.edit', $territory->TerritoryID) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('territories.destroy', $territory->TerritoryID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
