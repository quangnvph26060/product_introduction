@extends('admin.layouts.app')

@section('title', 'Cập nhật tin tức')

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
                        <h4 class="mb-sm-0">Cập nhật tin tức </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Tin tức</a></li>
                                <li class="breadcrumb-item active">Cập nhật tin tức</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="news-form" autocomplete="off" method="POST" action="{{ route('news.update' , $new->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="title"
                                        placeholder="Nhập tiêu đề tin tức" value="{{ $new->title }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Danh mục tin tức</label>
                                    <select class="form-select" id="status-input" name="news_category_id">
                                        <option value="">Không</option>
                                        @foreach ($newsCategories as $item)
                                        <option {{ $item->id === $new->news_category_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach 
                                    </select>
                                    @error('news_category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả tin tức</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $new->description }}</textarea>
                                    @error('description')
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
                                            src="{{ asset($new->image ) }}" height="150" />
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select name="status" class="form-select" id="">
                                            <option value="published"
                                                {{ $new->status === 'published' ? 'selected' : '' }}>
                                                Công khai</option>
                                            <option value="unpublished"
                                            {{ $new->status === 'unpublished' ? 'selected' : '' }}>
                                                Không công khai</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
