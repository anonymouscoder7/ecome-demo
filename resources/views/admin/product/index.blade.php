@extends('admin.layout.main')

@section('content')
<div class="container card">
    <h1>Products</h1>
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
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discounted Price</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" alt="Product Image" width="50">
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>Rs {{ $product->price }}</td>
                        <td>Rs {{ $product->descounted_price}}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="/admin/edit-product/{{$product->id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="/admin/delete-product/{{$product->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection