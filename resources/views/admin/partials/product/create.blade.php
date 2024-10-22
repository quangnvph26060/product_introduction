@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Sản phẩm</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <form action="{{ route('admin.store.product') }}" class="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Thêm sản phẩm</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                    <label for="">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" id=""
                                        placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Danh mục</label>
                                    <select name="category_id" class="form-select">
                                        <option value="">--Chọn--</option>
                                        @foreach ($subcategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                    <img id="output" width="150" src="https://www.nfctogo.com/images/empty-img.png" height="150" />
                                    @error('main_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả ngắn</label>
                                    <textarea name="short_description" class="form-control" id="" rows="3">{{ old('short_description') }}
                                     </textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả chi tiết</label>
                                    <textarea name="long_description" id="content" class="form-control" rows="10" cols="80">{{ old('long_description') }}
                                </textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng thái</label>
                                    <select name="status" class="form-select" id="">
                                        <option value="published"
                                            {{ old('status', $category->status ?? '') == 'published' ? 'selected' : '' }}>
                                            Công khai</option>
                                        <option value="unpublished"
                                            {{ old('status', $category->status ?? '') == 'unpublished' ? 'selected' : '' }}>
                                            Ẩn</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
