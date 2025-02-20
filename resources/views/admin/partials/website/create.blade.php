@extends('admin.layouts.app')

@section('title', 'Thêm mới Website')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Thêm mới</h3>
                    <div class="card-tools">
                        <a href="{{ route('website.index') }}" class="btn btn-primary">Danh sách </a>
                    </div>
                </div>

                <form action="{{ isset($website) ? route('website.update', $website->id) : route('website.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(isset($website))
                    @method('PUT')
                    @endif

                    <ul class="nav nav-tabs" id="categoriesTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Thông tin Website
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
                                                        <label for="title" class="form-label">Tên website</label>
                                                        <input type="text" class="form-control" name="title" id="title"
                                                            placeholder="Nhập tên  website"
                                                            value="{{ old('title', $website->title ?? '') }}">
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
                                                            rows="5">{{ old('description', $website->description ?? '') }}</textarea>
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


                            <!-- Ảnh đại diện -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ảnh đại diện</h3>
                                    <div class="mb-3">
                                        <input type="file" id="image" name="image" class="form-control d-none"
                                            accept="image/*">
                                        <div id="preview-frame"
                                            style="cursor: pointer; border: 1px solid #ccc; padding: 20px; text-align: center;">
                                            @if(isset($website) && $website->image)
                                            <img src="{{ asset($website->image) }}"
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
                                        {{ isset($website) ? 'Cập nhật' : 'Thêm mới' }}
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
            placeholder: "--- Chọn danh mục ---",
            allowClear: true
        });

        CKEDITOR.replace('description', {
                filebrowserUploadMethod: 'form', // Phương thức upload tệp qua form
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
