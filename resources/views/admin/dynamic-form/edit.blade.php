@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="sku">SKU:</label>
                                <input type="text" name="sku" class="form-control" value="{{ isset($product) ? $product->sku : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($product) ? $product->name : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="price" name="price" class="form-control" value="{{ isset($product) ? $product->price : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image:</label>
                                <input type="file" name="image" class="form-control" @if(!isset($product)) required @endif>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
