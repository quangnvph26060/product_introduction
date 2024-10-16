@extends('admin.layouts.app')

@section('title', 'Thêm danh mục')

@section('content')
    <div class="page-content">
        <div class="container-fluid">     

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cập nhật danh mục</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" id="category-name-input"
                                        value="{{ $category->name }}" placeholder="Nhập tên danh mục">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Danh mục cha</label>

                                    <select class="form-select" name="parent_id" id="choices-publish-status-input">
                                       

                                        @if ($category->parent)
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                                                    {{ $cat->name }}</option>
                                            @endforeach
                                        @else
                                           <option value="">Không (Vì danh mục này đang là danh mục cha)</option>
                                        @endif



                                    </select>
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
