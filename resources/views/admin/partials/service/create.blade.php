@extends('admin.layouts.app')

@section('title', 'Thêm dịch vụ')

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
                        <h4 class="mb-sm-0">Tạo dịch vụ </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Dịch vụ</a></li>
                                <li class="breadcrumb-item active">Tạo dịch vụ</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <form autocomplete="off" method="POST" action="{{ route('service.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="name-input" name="name"
                                        placeholder="Nhập tên dịch vụ" value="{{ old('name') }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Mô tả dịch vụ</label>
                                    <textarea name="description" class="form-control" id="content" rows="10" cols="80">{{ old('description') }}</textarea>
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
                                    <div>
                                        <label for="">Ảnh</label>
                                        <input type="file" name="images" id="image-input" class="form-control-file"
                                            onchange="loadFile(event)" />
                                        <img id="output" width="150" style="margin-top: 10px"
                                            src="https://www.nfctogo.com/images/empty-img.png" height="150" />
                                            @error('images')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-publish-status-input" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="status-input" name="status">
                                            <option value="published" selected>Công khai</option>
                                            <option value="unpublished">Không công cai</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


{{-- @push('scripts')
    <script>
        function saveBusinessesForm(e) {
            e.preventDefault()
            var businessesForm = $('#businesses-form')[0]
            var businessesFormData = new FormData(businessesForm)
            $('.text-danger').text('');
            $.ajax({
                method: 'POST',
                url: "{{ route('businesses.store') }}",
                data: businessesFormData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            title: 'Thành công!',
                            text: 'Đã thêm thành công',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                // Làm mới form
                                $('#businesses-form')[0].reset();
                                // Chuyển hướng sang trang khác
                                window.location.href = '{{ route('businesses.index') }}';
                            }
                        });
                    }
                },
                error: function(response) {
                    var formErrors = response.responseJSON.errors;
                    if (formErrors.name) {
                        $('#name-errors').text(formErrors.name[0]);
                    }
                    if (formErrors.email) {
                        $('#email-errors').text(formErrors.email[0]);
                    }
                    if (formErrors.phone_number) {
                        $('#phone-number-errors').text(formErrors.phone_number[0]);
                    }
                    if (formErrors.description) {
                        $('#description-errors').text(formErrors.description[0]);
                    }
                    if (formErrors.image) {
                        $('#image-errors').text(formErrors.image[0]);
                    }
                }
            })
        }
    </script>
@endpush --}}
