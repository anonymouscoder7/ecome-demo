@extends('admin.layout.main')
@section('content')
<div class="container card">
    <h1>Categories</h1>
    @if (session('success'))

    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key=>$category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->image)
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="50">
                            @else
                            No image
                            @endif
                        </td>
                        <td>
                            <a href="/admin/edit-category/{{$category->id}}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                            <a href="/admin/delete-category/{{$category->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection