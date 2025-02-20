@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0">Thêm danh mục giới thiệu</h3>
                    <div class="card-tools">
                        <a href="{{ route('introduction_categories.index') }}" class="btn btn-primary">Danh sách danh
                            mục giới thiệu</a>
                    </div>
                </div>

                <form
                    action="{{ isset($introductionCategory) ? route('introduction_categories.update', $introductionCategory->id) : route('introduction_categories.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($introductionCategory))
                    @method('PUT')
                    @endif

                    <ul class="nav nav-tabs" id="categoriesTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">
                                Thông tin danh mục giới thiệu
                            </button>
                        </li>


                    </ul>

                    <div class="row">
                        <div class="col-lg-12">
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
                                                            value="{{ old('name', $introductionCategory->name ?? '') }}">
                                                        @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="card-body">
                                                    <div class="form-group mb-3">
                                                        <label for="name" class="form-label">Website</label>
                                                        <select class="form-select" name="website_id" id="category_id">
                                                            <option value="">--- Chọn Website ---</option>
                                                            @foreach ($websites as $item)
                                                            <option value="{{ $item->id }}" @selected(old('website_id',
                                                                isset($introductionCategory) ? $introductionCategory->
                                                                website_id : '') == $item->id)>
                                                                {{ $item->title }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('website_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">Mô tả </label>
                                                        <textarea id="description" class="form-control"
                                                            name="description"
                                                            rows="5">{{ old('description', $introductionCategory->description ?? '') }}</textarea>
                                                        @error('description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SEO -->

                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="col-lg-12">
                            <!-- Danh mục -->

                            <div class="text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($introductionCategory) ? 'Cập nhật' : 'Thêm mới' }}
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




@endpush
