@extends('admin.layout.main')

@section('content')
<div class="container card p-2">
    <h1>Create Category</h1>

    <form method="POST" action="/admin/category/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection