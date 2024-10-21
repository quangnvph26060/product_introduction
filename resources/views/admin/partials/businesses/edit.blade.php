@extends('admin.layouts.app')

@section('title', 'Thêm doanh nghiệp')

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
                        <h4 class="mb-sm-0">Cập nhật doanh nghiệp </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('businesses.index') }}">Doanh nghiệp</a></li>
                                <li class="breadcrumb-item active">Cập nhật doanh nghiệp</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="businesses-form" autocomplete="off" method="POST" action="{{ route('businesses.update', $business->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tên" value="{{ $business->name }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="email-input" name="email"
                                        placeholder="Nhập email" value="{{ $business->email }}">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="phone_number-input" name="phone_number"
                                        placeholder="Nhập số điện thoại" value="{{ $business->phone_number }}">
                                        @error('phone_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả doanh nghiệp</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $business->description }}</textarea>
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
                                            src="{{ asset($business->image) }}" height="150" />
                                            @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select name="status" class="form-select" id="">
                                            <option value="published"
                                                {{ $business->status === 'published' ? 'selected' : '' }}>
                                                Công khai</option>
                                            <option value="unpublished"
                                            {{ $business->status === 'unpublished' ? 'selected' : '' }}>
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
