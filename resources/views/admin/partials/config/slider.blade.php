@extends('admin.layouts.app')

@section('title', 'Cấu hình chung')
<link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css" rel="stylesheet">
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a href="{{ route('config.index') }}" class="nav-link ">Cấu hình chung</a>
                    </li>

                    <li href="{{ route('config.slider') }}" class="nav-item ">
                        <a class="nav-link active">Cấu hình slider</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link">Thông tin tài khoản</a>
                    </li> --}}
                </ul>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('slider.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Slider</label>
                                                <div class="input-images pb-3"></div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/image-uploader.min.css') }}">
<style>

    .mb-3 {
        margin-bottom: 15px;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 5px;
    }
</style>
@endpush

@push('scripts')
@php
$preloaded =
    isset($images) && $images->isNotEmpty()
        ? $images->map(function ($image) {
            return [
                'src' => asset($image->image), // Đường dẫn ảnh
                'id' => $image->id, // ID của ảnh
            ];
        })
        : [];
@endphp
<script src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
<script>
    $(document).ready(function() {
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
@endpush
