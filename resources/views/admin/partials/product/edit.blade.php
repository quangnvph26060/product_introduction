@extends('admin.layouts.app')

@section('title', 'Cập nhật sản phẩm')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Cập nhật sản phẩm</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <form action="{{ route('admin.update.product' , $product->id) }}" class="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Cập nhật sản phẩm</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                                        placeholder="Nhập tên sản phẩm" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">--Chọn--</option>
                                        @foreach ($subcategories as $item)
                                            <option {{ $item->id == $product->category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Ảnh</label>
                                    <input type="file" name="main_image" class="form-control-file"
                                        onchange="loadFile(event)" />
                                    <img id="output" src="{{ asset($product->main_image) }}" width="150" height="150" />
                                    @error('main_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả ngắn</label>
                                    <textarea name="short_description" class="form-control" id="" rows="3">{{ $product->short_description }}
                                </textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả chi tiết</label>
                                    <textarea name="long_description" class="form-control" id="" rows="5">{{ $product->long_description }}
                                </textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <select name="status" class="form-select" id="">
                                        <option value="published"
                                            {{ $product->status === 'published' ? 'selected' : '' }}>
                                            Published</option>
                                        <option value="unpublished"
                                        {{ $product->status === 'unpublished' ? 'selected' : '' }}>
                                            Unpublished</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection
