@extends('admin.layouts.app')

@section('title', 'Cập nhật danh mục tin tức')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cập nhật danh mục tin tức</h4>
                    </div><a href=""></a>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('news_categories.update' , $newCategory->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Tên danh mục tin tức</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nhập tên danh mục tin tức" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->


            </div>
            <!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
@endsection
