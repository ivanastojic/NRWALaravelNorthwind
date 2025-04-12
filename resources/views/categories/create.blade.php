{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CategoryName">Name</label>
            <input type="text" name="CategoryName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
@endsection
