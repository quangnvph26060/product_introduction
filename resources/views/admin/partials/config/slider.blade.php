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
                        <a class="nav-link active">Cấu hình chung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Cấu hình thanh toán</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Cấu hình slider</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Cấu hình bộ lọc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Thông tin hỗ trợ</a>
                    </li>
                </ul>

                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="company_name" class="form-label">Tên công ty</label>
                                            <input type="text" id="company_name" name="company_name"
                                                class="form-control @error('company_name') is-invalid @enderror"
                                                placeholder="Enter company name"
                                                value="{{ old('company_name', $config->company_name ?? '') }}">
                                            @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label">Địa chỉ</label>
                                            <input type="text" id="address" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter address"
                                                value="{{ old('address', $config->address ?? '') }}">
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="warehouse" class="form-label">Kho hàng</label>
                                            <input type="text" id="warehouse" name="warehouse"
                                                class="form-control @error('warehouse') is-invalid @enderror"
                                                placeholder="Enter warehouse"
                                                value="{{ old('warehouse', $config->warehouse ?? '') }}">
                                            @error('warehouse')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Số điện thoại</label>
                                            <input type="text" id="phone" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter phone number"
                                                value="{{ old('phone', $config->phone ?? '') }}">
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter email"
                                                value="{{ old('email', $config->email ?? '') }}">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="tax_code" class="form-label">Mã số thuế</label>
                                            <input type="text" id="tax_code" name="tax_code"
                                                class="form-control @error('tax_code') is-invalid @enderror"
                                                placeholder="Enter tax code"
                                                value="{{ old('tax_code', $config->tax_code ?? '') }}">
                                            @error('tax_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="link_fb" class="form-label">Facebook</label>
                                            <input type="text" id="link_fb" name="link_fb"
                                                class="form-control @error('link_fb') is-invalid @enderror"
                                                placeholder="Enter Facebook link"
                                                value="{{ old('link_fb', $config->link_fb ?? '') }}">
                                            @error('link_fb')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="zalo_number" class="form-label">Zalo</label>
                                            <input type="text" id="zalo_number" name="zalo_number"
                                                class="form-control @error('zalo_number') is-invalid @enderror"
                                                placeholder="Enter Zalo number"
                                                value="{{ old('zalo_number', $config->zalo_number ?? '') }}">
                                            @error('zalo_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="copyright" class="form-label">Copyright</label>
                                            <input type="text" id="copyright" name="copyright"
                                                class="form-control @error('copyright') is-invalid @enderror"
                                                placeholder="Enter Zalo number"
                                                value="{{ old('copyright', $config->copyright ?? '') }}">
                                            @error('copyright')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title_seo" class="form-label">Tiêu đề SEO</label>
                                            <input type="text" id="title_seo" name="title_seo"
                                                class="form-control @error('title_seo') is-invalid @enderror"
                                                placeholder="Enter SEO title"
                                                value="{{ old('title_seo', $config->title_seo ?? '') }}">
                                            @error('title_seo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="description_seo" class="form-label">Mô tả SEO</label>
                                            <textarea id="description_seo" name="description_seo"
                                                class="form-control @error('description_seo') is-invalid @enderror"
                                                rows="3"
                                                placeholder="Enter SEO description">{{ old('description_seo', $config->description_seo ?? '') }}</textarea>
                                            @error('description_seo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="keywords_seo" class="form-label">Từ khóa SEO</label>
                                            <input type="text" id="keywords_seo" name="keywords_seo"
                                                class="form-control @error('keywords_seo') is-invalid @enderror"
                                                placeholder="Enter SEO keywords"
                                                value="{{ old('keywords_seo', $config->keywords_seo ?? '') }}">
                                            @error('keywords_seo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Logo</h4>
                                </div>
                                <div class="card-body">
                                    <img class="img-fluid img-thumbnail w-100" id="show_logo" style="cursor: pointer; height: 190px;"
                                        src="" alt="" onclick="document.getElementById('logo').click();">
                                    @error('logo')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="file" name="path" id="logo" class="form-control d-none"
                                        accept="image/*" onchange="previewImage(event, 'show_logo')">
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Icon</h4>
                                </div>
                                <div class="card-body">
                                    <img class="img-fluid img-thumbnail w-100" id="show_icon" style="cursor: pointer; height: 190px;"
                                        src="" alt="" onclick="document.getElementById('icon').click();">
                                    @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="file" name="icon" id="icon" class="form-control d-none"
                                        accept="image/*" onchange="previewImage(event, 'show_icon')">
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="">
                                <button type="submit" class="btn btn-success">{{ isset($config) ? 'Cập nhật' : 'Lưu'
                                    }}</button>
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
<style>
    .cke_notifications_area {
        display: none;
    }

    .error {
        color: red;
    }

    .selectize-control {
        border: 0px !important;
        padding: 0px !important;
    }

    .selectize-input {
        padding: 10px 12px !important;
        border: 2px solid #ebedf2 !important;
        border-radius: 5px !important;
        border-top: 1px solid #ebedf2 !important;
    }

    /* Phần danh mục */
    .section-title {
        font-size: 1.2rem;
        font-weight: bold;
        padding-top: 20px;
        margin-bottom: 15px;
        padding: 10px;
        color: #fff;
        text-align: center;
    }

    .section-title+.section-title {
        color: #FF9800
    }


    /* Nền cam cho SEO */
    .section-title:nth-of-type(2) {
        margin-top: 20px;
        background-color: #695aec;
    }

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
<script>
    $(document).ready(function() {

            $('#keywords_seo').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    };
                },
                plugins: ['remove_button'],
                onKeyDown: function(e) {
                    if (e.key === ' ') {
                        e.preventDefault();
                        var value = this.$control_input.val().trim();
                        if (value) {
                            this.addItem(value);
                            this.$control_input.val('');
                        }
                    }
                }
            });

        });
</script>

<script>
    function previewImage(event, imageId) {
        // Lấy file từ input
        var file = event.target.files[0];

        // Kiểm tra nếu file là ảnh
        if (file && file.type.match('image.*')) {
            var reader = new FileReader();

            // Khi file đã được đọc
            reader.onload = function(e) {
                // Đặt nguồn ảnh (src) cho thẻ <img>
                document.getElementById(imageId).src = e.target.result;
            };

            // Đọc file dưới dạng Data URL
            reader.readAsDataURL(file);
        } else {
            // Nếu không phải file ảnh, không làm gì
            alert("Please select a valid image.");
        }
    }
</script>

@endpush
