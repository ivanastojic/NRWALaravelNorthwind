{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">← Back to Categories</a>
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->CategoryID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="CategoryName">Name</label>
            <input type="text" class="form-control" id="CategoryName" name="CategoryName" value="{{ $category->CategoryName }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $category->Description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
