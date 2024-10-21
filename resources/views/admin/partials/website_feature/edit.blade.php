@extends('admin.layouts.app')

@section('title', 'Cập nhật tính năng trang web')

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
                        <h4 class="mb-sm-0">Cập nhật tính năng trang web </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('website_feature.index') }}">Tính năng trang
                                        web</a></li>
                                <li class="breadcrumb-item active">Cập nhật tính năng trang web</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="website_feature-form" autocomplete="off" method="POST" action="{{ route('website_feature.update' , $websiteFeature->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tên tính năng" value="{{ $websiteFeature->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Mô tả tính năng</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $websiteFeature->description }}</textarea>
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
                                    <div class="mb-3">
                                        <label for="">Ảnh ICON</label>
                                        <input type="file" name="icon_image" id="image-input" class="form-control-file"
                                            onchange="loadFile(event)" />
                                        <img id="output" width="150" style="margin-top: 10px"
                                            src="{{ asset($websiteFeature->icon_image) }}" height="150" />
                                        @error('icon_image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="status-input" name="status">
                                            <option value="active" {{ $websiteFeature->status === 'active' ? 'selected' : '' }}>Công khai</option>
                                            <option value="inactive" {{ $websiteFeature->status === 'inactive' ? 'selected' : '' }}>Không công cai</option>
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
