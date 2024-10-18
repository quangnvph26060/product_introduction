@extends('admin.layouts.app')

@section('title', 'Thêm bài viết')

@section('content')
    <style>
        .cke_notifications_area {
            display: none;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tạo tin tức </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Tin tức</a></li>
                                <li class="breadcrumb-item active">Tạo tin tức</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form action="{{ route('post.store') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="product-title-input" name="title"
                                        placeholder="Nhập tiêu đề bài biết" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Nội dung bài viết</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="">Ảnh</label>
                                    <input type="file" name="image" class="form-control-file"
                                        onchange="loadFile(event)" />
                                    <img id="output" width="150" src="https://www.nfctogo.com/images/empty-img.png"
                                        height="150" />
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"></h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="choices-publish-status-input" name="status">
                                            <option value="published" selected>Công khai</option>
                                            <option value="unpublished">Không công cai</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Thêm bài viết</button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
