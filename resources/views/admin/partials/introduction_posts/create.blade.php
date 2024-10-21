@extends('admin.layouts.app')

@section('title', 'Thêm bài viết giới thiệu')

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
                        <h4 class="mb-sm-0">Tạo bài viết giới thiệu </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('introduction_posts.index') }}">Bài viết giới
                                        thiệu</a></li>
                                <li class="breadcrumb-item active">Tạo bài viết giới thiệu</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="introduction_posts-form" autocomplete="off" method="POST"
                action="{{ route('introduction_posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Nhập tiêu đề bài viết giới thiệu" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Danh mục giới thiệu</label>
                                    <select class="form-select" name="category_id">
                                        <option value="">Không</option>
                                        @foreach ($introductionCategories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả bài viết giới thiệu</label>
                                    <textarea name="content" class="form-control" id="content" rows="10" cols="80">{{ old('content') }}</textarea>
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"></h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <label for="">Ảnh</label>
                                        <input type="file" name="image" id="image-input" class="form-control-file"
                                            onchange="loadFile(event)" />
                                        <img id="output" width="150" style="margin-top: 10px"
                                            src="https://www.nfctogo.com/images/empty-img.png" height="150" />
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="status-input" name="status">
                                            <option value="published" selected>Công khai</option>
                                            <option value="unpublished">Không công cai</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
