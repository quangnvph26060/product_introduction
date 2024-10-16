@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="page-inner">
        <div class="section-header">
            <h1>Product Image Gallery</h1>
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.product') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product: {{ $product->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.image-gallery.product') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="">Image <code>(Multiple image supported!)</code></label>
                                    <input type="file" name="image_path[]" class="form-control" multiple>
                                    @error('image_path')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 10px">Upload</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($productImageGallery as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image_path) }}" width="150px" alt="">
                                                </td>
                                                <td>
                                                    <a href="{{ route('delete.image-gallery.product' , $item->id) }}" class="btn btn-danger delete-item">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
