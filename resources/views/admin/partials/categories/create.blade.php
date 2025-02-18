@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Thêm danh mục</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Danh sách danh mục</a>
                    </div>
                </div>

                <form
                    action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <ul class="nav nav-tabs" id="categoriesTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Thông tin danh mục
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
                            <div class="tab-content" id="categoriesTabsContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                                <!-- Tên sản phẩm -->
                                                <div class="col-lg-12 add_categories">
                                                    <div class="form-group mb-3">
                                                        <label for="name" class="form-label">Tên danh mục</label>
                                                        <input type="text" class="form-control" name="name" id="name"
                                                            placeholder="Nhập tên sản phẩm"
                                                            value="{{ old('name', $category->name ?? '') }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                @if(isset($category))
                                                <div class="col-lg-12 add_categories">
                                                    <div class="form-group mb-3">
                                                        <label for="slug" class="form-label">Slug</label>
                                                        <input type="text" class="form-control" name="slug" id="slug"
                                                            placeholder="Nhập slug"
                                                            value="{{ old('slug', $category->slug ?? '') }}">
                                                        @error('slug')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                                @endif





                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">Mô tả </label>
                                                        <textarea id="description" class="form-control"
                                                            name="description"
                                                            rows="5">{{ old('description', $category->description ?? '') }}</textarea>
                                                        @error('description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="tags" class="form-label">Tags</label>
                                                        <input type="text" class="form-control" name="tags" id="tags"
                                                            placeholder="tags sản phẩm"
                                                            value="{{ old('tags', $category->tags ?? '') }}">
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
                                                <input type="text" class="form-control" name="title_seo" id="title_seo"
                                                    placeholder="Nhập tiêu đề SEO"
                                                    value="{{ old('title_seo', $category->title_seo ?? '') }}">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="description_seo" class="form-label">Mô tả SEO</label>
                                                <textarea style="resize: vertical;" name="description_seo"
                                                    id="description_seo" cols="30" rows="6"
                                                    class="form-control">{{ old('description_seo', $category->description_seo ?? '') }}</textarea>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="keyword_seo" class="form-label">Từ khóa SEO</label>
                                                <input type="text" name="keyword_seo" id="keyword_seo"
                                                    class="form-control"
                                                    value="{{ old('keyword_seo', $category->keyword_seo ?? '') }}"
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
                                    <h3 class="card-title">Danh mục</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select class="form-select" name="parent_id" id="category_id">
                                            <option value="">--- Chọn danh mục ---</option>
                                            @foreach ($categorys as $item)
                                                <option value="{{ $item->id }}"
                                                    @selected(old('parent_id', isset($category) ? $category->parent_id : '') == $item->id)>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
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
                                            @if(isset($category) && $category->image)
                                            <img src="{{ asset($category->image) }}"
                                                style="max-width: 100%; height: auto;">
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
                                        {{ isset($category) ? 'Cập nhật' : 'Thêm mới' }}
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




{{--
<script>
    const BASE_URL = "{{ url('/') }}";
</script> --}}

<script>
    $(document).ready(function() {

        $('#category_id').select2({
            placeholder: "--- Chọn danh mục ---",
            allowClear: true
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
