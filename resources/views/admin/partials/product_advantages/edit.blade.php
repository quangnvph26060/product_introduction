@extends('admin.layouts.app')

@section('title', 'Cập nhật lợi ích sản phẩm')

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
                        <h4 class="mb-sm-0">Cập nhật lợi ích </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('product_advantages.index') }}">Lợi ích sản
                                        phẩm</a></li>
                                <li class="breadcrumb-item active">Cập nhật lợi ích</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="product_advantages-form" autocomplete="off" method="POST"
                action="{{ route('product_advantages.update', $productAdvantages->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tiêu đề" value="{{ $productAdvantages->name }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả lợi ích</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $productAdvantages->description }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Ảnh Icon <code>(Hãy dùng kích thước nhỏ)</code></label> <br>
                                    <input type="file" name="icon" id="image-input" class="form-control-file"
                                        onchange="loadFileIcon(event)" />
                                    <img id="outputIcon" width="150" style="margin-top: 10px"
                                        src="{{ asset($productAdvantages->icon) }}" height="150" />
                                    @error('icon')
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
                                        <label for="">Ảnh</label>
                                        <input type="file" name="image" id="image-input" class="form-control-file"
                                            onchange="loadFile(event)" />
                                        <img id="output" width="150" style="margin-top: 10px"
                                            src="{{ asset($productAdvantages->image) }}" height="150" />
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select name="status" class="form-select" id="">
                                            <option value="published"
                                                {{ $productAdvantages->status === 'published' ? 'selected' : '' }}>
                                                Công khai</option>
                                            <option value="unpublished"
                                                {{ $productAdvantages->status === 'unpublished' ? 'selected' : '' }}>
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
