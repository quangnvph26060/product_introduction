@extends('admin.layouts.app')

@section('title', 'Thêm tin tức')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Thêm tin tức</h3>
                    <div class="card-tools">
                        <a href="{{ route('news.index') }}" class="btn btn-primary">Danh sách tin tức</a>
                    </div>
                </div>

                <form action="{{ isset($new) ? route('news.update', $new->id) : route('news.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if(isset($new))
                    @method('PUT')
                    @endif

                    <ul class="nav nav-tabs" id="categoriesTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Thông tin tin tức
                            </button>
                        </li>


                    </ul>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="tab-content" id="categoriesTabsContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                <!-- Tên sản phẩm -->
                                                <div class="col-lg-12 add_categories">
                                                    <div class="form-group mb-3">
                                                        <label for="title" class="form-label">Tên tin tức</label>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                            placeholder="Nhập tên sản phẩm"
                                                            value="{{ old('title', $new->title ?? '') }}">
                                                        @error('title')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">Mô tả </label>
                                                        <textarea id="description" class="form-control"
                                                            name="description"
                                                            rows="5">{{ old('description', $new->description ?? '') }}</textarea>
                                                        @error('description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <!-- tin tức -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh mục tin tức</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-select" name="news_category_id" id="category_id">
                                            <option value="">--- Chọn tin tức ---</option>
                                            @foreach ($newsCategories as $item)
                                            <option value="{{ $item->id }}" @selected(old('news_category_id',
                                                isset($new) ? $new->news_category_id : '') == $item->id)>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('news_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                            </div>

                            <!-- Ảnh đại diện -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ảnh đại diện</h3>
                                    <div class="mb-3">
                                        <input type="file" id="image" name="image" class="form-control d-none"
                                            accept="image/*">
                                        <div id="preview-frame"
                                            style="cursor: pointer; border: 1px solid #ccc; padding: 20px; text-align: center;">
                                            @if(isset($new) && $new->image)
                                            <img src="{{ asset($new->image) }}" style="max-width: 100%; height: auto;">
                                            @else
                                            <p class="text-muted">Click để chọn ảnh</p>
                                            @endif
                                        </div>
                                    </div>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- Nút lưu & xóa -->
                            <div class="text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($new) ? 'Cập nhật' : 'Thêm mới' }}
                                    </button>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" />
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    /* .tagify {
        height: auto !important;
    } */
    .invalid-feedback {
        display: inline !important;
        font-size: 13px !important;
    }

    #preview-frame {
        width: 100%;
        height: 240px;
        border: 2px dashed #ddd;
        display: flex;
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        margin-top: 10px;
    }

    #preview-frame img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }
</style>
@endpush


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


{{--
<script>
    const BASE_URL = "{{ url('/') }}";
</script> --}}

<script>
    $(document).ready(function() {

        $('#category_id').select2({
            placeholder: "--- Chọn tin tức ---",
            allowClear: true
        });

        CKEDITOR.replace('description', {
                filebrowserUploadMethod: 'form', // Phương thức upload tệp qua form
            });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById("preview-frame").onclick = () => document.getElementById("image").click();

        document.getElementById("image").onchange = (e) => {
            const file = e.target.files[0];
            if (file) document.getElementById("preview-frame").innerHTML = `<img src="${URL.createObjectURL(file)}" style="max-width: 100%; height: auto;">`;
        };

    });
</script>


@endpush
