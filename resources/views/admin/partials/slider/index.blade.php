@extends('admin.layouts.app')

@section('title', 'Ảnh banner trang chủ')

@section('content')
    <div class="page-inner">
        <div class="section-header">
            <h1>Ảnh banner trang chủ</h1>
        </div>
        <div class="mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Trở lại</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ảnh banner trang chủ</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Ảnh <code>(Hỗ trợ nhiều hình ảnh!)</code></label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-left: 10px">Tải lên</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tất cả hình ảnh</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tbody>
                                            @foreach ($slider as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" width="150px" alt="">
                                                </td>
                                                <td>
                                                    <a href="{{ route('slider.destroy' , $item->id) }}" class="btn btn-danger delete-item">Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
