@extends('admin.layouts.app')

@section('title', 'Cập nhật dịch vụ')

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
                        <h4 class="mb-sm-0">Cập nhật dịch vụ </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Dịch vụ</a></li>
                                <li class="breadcrumb-item active">Cập nhật dịch vụ</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form autocomplete="off" method="POST" action="{{ route('service.update' , $service->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tên dịch vụ" value="{{ $service->name }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả dịch vụ</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $service->description }}</textarea>
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
                                        <input type="file" name="images" id="image-input" class="form-control-file"
                                            onchange="loadFile(event)" />
                                        <img id="output" width="150" style="margin-top: 10px"
                                            src="{{ $service->images }}" height="150" />
                                            @error('images')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                            <select name="status" class="form-select" id="">
                                                <option value="published"
                                                    {{ $service->status === 'published' ? 'selected' : '' }}>
                                                    Công khai</option>
                                                <option value="unpublished"
                                                {{ $service->status === 'unpublished' ? 'selected' : '' }}>
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