@extends('admin.layouts.app')

@section('title', 'Thêm website')

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
                        <h4 class="mb-sm-0">Cập nhật danh mục giới thiệu </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('introduction_categories.index') }}">Danh mục giới thiệu</a></li>
                                <li class="breadcrumb-item active">Cập nhật danh mục giới thiệu</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form id="introduction_categories-form" autocomplete="off" method="POST" action="{{ route('introduction_categories.update' , $introductionCategory->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
        
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tên" value="{{ $introductionCategory->name }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả danh mục giới thiệu</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ $introductionCategory->description }}</textarea>
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
                                    <div class="mb-3">
                                        <label for="choices-publish-website_id-input" class="form-label">Website</label>
                                        <select class="form-select" id="choices-publish-website_id-input" name="website_id">
                                             <option value="">Không</option>
                                             @foreach ($websites as $website)
                                                 <option {{ $introductionCategory->website_id === $website->id ? 'selected' : '' }} value="{{ $website->id }}">{{ $website->title }}</option>
                                             @endforeach
                                        </select>
                                        @error('website_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
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
