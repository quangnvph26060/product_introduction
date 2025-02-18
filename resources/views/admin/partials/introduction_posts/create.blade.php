@extends('admin.layouts.app')

@section('title', 'Thêm mới bài viết giới thiệu')

@section('content')

<div class="page-inner">
    <div class="row">

        <div class="card">
            <div class="card-header  d-flex justify-content-between align-items-center">
                <h3 class="card-title m-0">{{ isset($introductionPost) ? 'Sửa bài viết giới thiệu' : "Thêm bài viết giới thiệu" }}</h3>
                <div class="card-tools">
                    <a href="{{ route('introduction_posts.index') }}" class="btn btn-primary">Danh sách bài viết giới thiệu</a>
                </div>
            </div>


            <form
            action="{{ isset($introductionPost) ? route('introduction_posts.update', $introductionPost->id) : route('introduction_posts.store') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf

            <!-- Nếu là form cập nhật, sử dụng PUT -->
            @if (isset($introductionPost))
                @method('PUT')
            @endif

                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                            type="button" role="tab" aria-controls="info" aria-selected="true">
                            Thông tin bài viết giới thiệu
                        </button>
                    </li>

                    {{-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button"
                            role="tab" aria-controls="seo" aria-selected="false">
                            Cấu hình SEO
                        </button>
                    </li> --}}
                </ul>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="tab-content" id="productTabsContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">

                                            <!-- Tên bài viết giới thiệu -->
                                            <div class="col-lg-12 add_product">
                                                <div class="form-group mb-3">
                                                    <label for="title" class="form-label">Tiêu đề bài viết giới thiệu</label>
                                                    <input type="text" class="form-control" name="title" id="title"
                                                        placeholder="Nhập tên bài viết giới thiệu"
                                                        value="{{ old('title', $introductionPost->title ?? '') }}">
                                                    @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if(isset($introductionPost))
                                                <div class="col-lg-12 add_categories">
                                                    <div class="form-group mb-3">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text" class="form-control" name="slug" id="slug"
                                                            placeholder="Nhập slug"
                                                            value="{{ old('slug', $introductionPost->slug ?? '') }}">
                                                        @error('slug')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                @endif

                                            <!-- Mô tả chi tiết -->
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="content" class="form-label">Mô tả</label>
                                                    <textarea id="content" class="form-control"
                                                        name="content"
                                                        rows="10">{{ old('content', $introductionPost->content ?? '') }}</textarea>
                                                    @error('content')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- SEO -->
                            {{-- <div class="tab-pane fade" id="seo" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="title_seo" class="form-label">Tiêu đề SEO</label>
                                            <input type="text" class="form-control" name="title_seo" id="title_seo"
                                                placeholder="Nhập tiêu đề SEO"
                                                value="{{ old('title_seo', $introductionPost->title_seo ?? '') }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description_seo" class="form-label">Mô tả SEO</label>
                                            <textarea style="resize: vertical;" name="description_seo"
                                                id="description_seo" cols="30" rows="6"
                                                class="form-control">{{ old('description_seo', $introductionPost->description_seo ?? '') }}</textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="keyword_seo" class="form-label">Từ khóa SEO</label>
                                            <input type="text" name="keyword_seo" id="keyword_seo" class="form-control"
                                                value="{{ old('keyword_seo', $introductionPost->keyword_seo ?? '') }}"
                                                placeholder="Nhập từ khóa SEO">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <!-- Danh mục -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select class="form-select" name="introduction_category_id" id="category_id">
                                        <option value="">--- Chọn danh mục ---</option>
                                        @foreach ($introductionCategories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ((isset($introductionPost) && $introductionPost->category_id == $category->introduction_category_id) || old('category_id') == $category->introduction_category_id)
                                                    selected
                                                @endif
                                            >
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('introduction_category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Ảnh đại diện -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ảnh</h3>
                                <div class="mb-3">
                                    <input type="file" id="image" name="image" class="form-control d-none"
                                        accept="image/*">
                                    <div id="preview-frame"
                                        style="cursor: pointer; border: 1px solid #ccc; padding: 20px; text-align: center;">
                                        @if(isset($introductionPost) && $introductionPost->image)
                                        <img src="{{ asset($introductionPost->image) }}"
                                            style="max-width: 100%; height: auto;">
                                        @else
                                        <p class="text-muted">Click để chọn ảnh</p>
                                        @endif
                                    </div>
                                </div>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Nút lưu & xóa -->
                        <div class="text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($introductionPost) ? 'Cập nhật' : 'Thêm mới' }}
                                </button>


                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection

@push('styles')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


<link rel="stylesheet" href="{{ asset('assets/css/image-uploader.min.css') }}">
<style>
    /* .tagify {
        height: auto !important;
    } */
    .invalid-feedback {
        display: inline !important;
        font-size: 13px !important;
    }

    .tags-look .tagify__dropdown__item {
        display: inline-block;
        vertical-align: middle;
        border-radius: 3px;
        padding: .3em .5em;
        border: 1px solid #CCC;
        background: #F3F3F3;
        margin: .2em;
        font-size: .85em;
        color: black;
        transition: 0s;
    }

    .tags-look .tagify__dropdown__item--active {
        border-color: black;
    }

    .tags-look .tagify__dropdown__item:hover {
        background: lightyellow;
        border-color: gold;
    }

    .tags-look .tagify__dropdown__item--hidden {
        max-width: 0;
        max-height: initial;
        padding: .3em 0;
        margin: .2em 0;
        white-space: nowrap;
        text-indent: -20px;
        border: 0;
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="{{ asset('assets/js/image-uploader.min.js') }}"></script>

@php
    $preloaded = isset($images) && $images->isNotEmpty() ? $images->map(function ($image) {
        return [
            'src' => asset($image->image_path), // Đường dẫn ảnh
            'id' => $image->id, // ID của ảnh
        ];
    }) : [];
@endphp
<script>
    const BASE_URL = "{{ url('/') }}";
</script>

<script>
    $(document).ready(function() {
        $('#category_id').select2({
            placeholder: "--- Chọn danh mục ---",
            allowClear: true
        });

        const preloaded = @json($preloaded);

            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 15,
            });

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('keyword_seo');

        const tagify = new Tagify(input, {
            dropdown: {
                maxItems: 10,
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: false
            }
        });

        tagify.on('add', () => {
            adjustTagifyHeight(tagify.DOM.scope);
        });

        const tags = document.getElementById('tags');
        const tagsTagify = new Tagify(tags, {
            dropdown: {
                maxItems: 10,
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: false
            }
        });

        tagsTagify.on('add', () => {
            adjustTagifyHeight(tagsTagify.DOM.scope);
        });

        function adjustTagifyHeight(scopeElement) {
            if (scopeElement) {
                scopeElement.style.height = "auto"; // Reset chiều cao
                scopeElement.style.height = scopeElement.scrollHeight + "px"; // Điều chỉnh theo nội dung
            }
        }

        document.getElementById("preview-frame").onclick = () => document.getElementById("image").click();

        document.getElementById("image").onchange = (e) => {
            const file = e.target.files[0];
            if (file) document.getElementById("preview-frame").innerHTML = `<img src="${URL.createObjectURL(file)}" style="max-width: 100%; height: auto;">`;
        };

    });
</script>


@endpush
