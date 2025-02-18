@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <div class="page-inner">
        <div class="row">

            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">{{ isset($product) ? 'Sửa sản phẩm' : ' Thêm sản phẩm' }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.product') }}" class="btn btn-primary">Danh sách sản phẩm</a>
                    </div>
                </div>


                <form
                    action="{{ isset($product) ? route('admin.update.product', $product->id) : route('admin.store.product') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Thông tin sản phẩm
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                type="button" role="tab" aria-controls="seo" aria-selected="false">
                                Cấu hình SEO
                            </button>
                        </li>
                    </ul>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="tab-content" id="productTabsContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                <!-- Tên sản phẩm -->
                                                <div class="col-lg-12 add_product">
                                                    <div class="form-group mb-3">
                                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" placeholder="Nhập tên sản phẩm"
                                                            value="{{ old('name', $product->name ?? '') }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                @if (isset($product))
                                                    <div class="col-lg-12 add_categories">
                                                        <div class="form-group mb-3">
                                                            <label for="slug" class="form-label">Slug</label>
                                                            <input type="text" class="form-control" name="slug"
                                                                id="slug" placeholder="Nhập slug"
                                                                value="{{ old('slug', $product->slug ?? '') }}">
                                                            @error('slug')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                @endif

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Album ảnh</label>
                                                        <div class="input-images pb-3"></div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="short_description" class="form-label">Mô tả ngắn</label>
                                                        <textarea id="short_description" class="form-control" name="short_description" rows="5">{{ old('short_description', $product->short_description ?? '') }}</textarea>
                                                        @error('short_description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <!-- Mô tả chi tiết -->
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="long_description" class="form-label">Mô tả chi
                                                            tiết</label>
                                                        <textarea id="long_description" class="form-control" name="long_description" rows="10">{{ old('long_description', $product->long_description ?? '') }}</textarea>
                                                        @error('long_description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <!-- Album ảnh -->
                                                {{-- <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Album ảnh</label>
                                                    <div class="input-images pb-3"></div>
                                                </div>
                                            </div> --}}

                                                <!-- Tags -->
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="tags" class="form-label">Tags</label>
                                                        <input type="text" class="form-control" name="tags"
                                                            id="tags" placeholder="tags sản phẩm"
                                                            value="{{ old('tags', $product->tags ?? '') }}">
                                                        @error('tags')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO -->
                                <div class="tab-pane fade" id="seo" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="title_seo" class="form-label">Tiêu đề SEO</label>
                                                <input type="text" class="form-control" name="title_seo"
                                                    id="title_seo" placeholder="Nhập tiêu đề SEO"
                                                    value="{{ old('title_seo', $product->title_seo ?? '') }}">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="description_seo" class="form-label">Mô tả SEO</label>
                                                <textarea style="resize: vertical;" name="description_seo" id="description_seo" cols="30" rows="6"
                                                    class="form-control">{{ old('description_seo', $product->description_seo ?? '') }}</textarea>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="keyword_seo" class="form-label">Từ khóa SEO</label>
                                                <input type="text" name="keyword_seo" id="keyword_seo"
                                                    class="form-control"
                                                    value="{{ old('keyword_seo', $product->keyword_seo ?? '') }}"
                                                    placeholder="Nhập từ khóa SEO">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <!-- Danh mục -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh mục cha</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-select" name="category_id" id="category_id">
                                            <option value="">--- Chọn danh mục ---</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                                                    {{ $category->name }}
                                                </option>
                                                @if ($category->children->isNotEmpty())
                                                    @foreach ($category->children as $child)
                                                        <option value="{{ $child->id }}" @selected(old('category_id', $product->category_id ?? '') == $child->id)>
                                                            ---- {{ $child->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
                                        <input type="file" id="image" name="main_image"
                                            class="form-control d-none" accept="image/*">
                                        <div id="preview-frame"
                                            style="cursor: pointer; border: 1px solid #ccc; padding: 20px; text-align: center;">
                                            @if (isset($product) && $product->main_image)
                                                <img src="{{ asset($product->main_image) }}"
                                                    style="max-width: 100%; height: auto;">
                                            @else
                                                <p class="text-muted">Click để chọn ảnh</p>
                                            @endif
                                        </div>
                                    </div>
                                    @error('main_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- Nút lưu & xóa -->
                            <div class="text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($product) ? 'Cập nhật' : 'Thêm mới' }}
                                    </button>

                                    {{-- @if (isset($product))
                                <form action="{{ route('admin.delete.product', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                        Xóa
                                    </button>
                                </form>
                                @endif --}}
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
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" />
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

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    @php
        $preloaded =
            isset($images) && $images->isNotEmpty()
                ? $images->map(function ($image) {
                    return [
                        'src' => asset($image->image_path), // Đường dẫn ảnh
                        'id' => $image->id, // ID của ảnh
                    ];
                })
                : [];
    @endphp


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

            CKEDITOR.replace('long_description', {
                filebrowserUploadMethod: 'form', // Phương thức upload tệp qua form
            });

             CKEDITOR.replace('short_description', {
                filebrowserUploadMethod: 'form', // Phương thức upload tệp qua form
            });
            CKEDITOR.replace('description_seo', {
                filebrowserUploadMethod: 'form', // Phương thức upload tệp qua form
            });

        });
    </script>

    <script>
        // $(document).ready(function() {
        //     CKEDITOR.replace('long_description', {
        //         filebrowserUploadMethod: 'form',
        //     });
        // })

        document.addEventListener('DOMContentLoaded', function() {
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
                if (file) document.getElementById("preview-frame").innerHTML =
                    `<img src="${URL.createObjectURL(file)}" style="max-width: 100%; height: auto;">`;
            };

        });
    </script>
@endpush
