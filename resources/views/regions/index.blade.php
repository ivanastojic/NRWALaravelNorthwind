@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Regions</h1>
    <a href="{{ route('regions.create') }}" class="btn btn-primary">Create Region</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $region)
                <tr>
                    <td>{{ $region->RegionID }}</td>
                    <td>{{ $region->RegionDescription }}</td>
                    <td>
                        <a href="{{ route('regions.edit', $region) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('regions.show', $region) }}" class="btn btn-info btn-sm">Show</a>
                        <form action="{{ route('regions.destroy', $region) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
