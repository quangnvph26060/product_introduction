@extends('admin.layouts.app')

@section('title', 'Danh sách danh mục giới thiệu')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="col-lg-6">
            <!-- Form thêm/sửa danh mục -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" id="form-title">Thêm danh mục tin tức</h5>
                </div>
                <div class="card-body">
                    <form id="category-form">
                        @csrf
                        <input type="hidden" id="category_id" name="id">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="category_name" name="name" required>
                        </div>
                        <button type="submit" class="btn btn-success" id="btn-save">Thêm mới</button>
                        <button type="button" class="btn btn-secondary d-none" id="btn-cancel">Hủy</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- Danh sách danh mục -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Danh sách danh mục tin tức</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0"
                            id="newcategory-table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    td{
        text-align: center !important;
    }
</style>
@endpush
@push('scripts')
<script>
$(document).ready(function () {
    let table = $('#newcategory-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('news_categories.index') }}",
        columns: [
            {
            data: null,
            name: 'id',
            render: function (data, type, row, meta) {
                return meta.row + 1; // STT tự tăng từ 1
            }
        },
            { data: 'name', name: 'name' },
            {
                data: 'id',
                name: 'action',
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-warning edit-category tex" data-id="${data}" data-name="${row.name}">Sửa</button>
                        <button class="btn btn-danger delete-category" data-id="${data}">Xóa</button>
                    `;
                }
            }
        ]
    });

    // Hàm lưu (thêm hoặc cập nhật)
    $('#category-form').on('submit', function (e) {
        e.preventDefault();
        let id = $('#category_id').val();
        let url = id
            ? `{{ route('news_categories.update', ':id') }}`.replace(':id', id)
            : `{{ route('news_categories.store') }}`;
        let method = id ? "PUT" : "POST";
        let btn = $('#btn-save');
        btn.prop('disabled', true).text('Đang xử lý...');

        $.ajax({
            url: url,
            type: method,
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    table.ajax.reload(null, false);
                    resetForm();
                } else {
                    toastr.error("Lỗi khi lưu danh mục!");
                }
            },
            error: function () {
                // toastr.error("Có lỗi xảy ra, vui lòng thử lại!");
            },
            complete: function () {
                btn.prop('disabled', false).text(id ? 'Cập nhật' : 'Thêm mới');
            }
        });
    });

    // Load dữ liệu vào form khi sửa
    $('#newcategory-table').on('click', '.edit-category', function () {
        let categoryId = $(this).data('id');
        let categoryName = $(this).data('name');

        $('#category_id').val(categoryId);
        $('#category_name').val(categoryName);
        $('#form-title').text('Cập nhật danh mục');
        $('#btn-save').text('Cập nhật').removeClass('btn-success').addClass('btn-primary');
        $('#btn-cancel').removeClass('d-none');
    });

    // Hủy chỉnh sửa
    $('#btn-cancel').on('click', function () {
        resetForm();
    });

    // Hàm reset form về trạng thái ban đầu
    function resetForm() {
        $('#category_id').val('');
        $('#category_name').val('');
        $('#form-title').text('Thêm danh mục');
        $('#btn-save').text('Thêm mới').removeClass('btn-primary').addClass('btn-success');
        $('#btn-cancel').addClass('d-none');
    }

    // Xóa danh mục
    $('#newcategory-table').on('click', '.delete-category', function () {
        let categoryId = $(this).data('id');

        if (!confirm('Bạn có chắc chắn muốn xóa danh mục này?')) return;

        $.ajax({
            url: `{{ route('news_categories.update', ':id') }}`.replace(':id', categoryId),
            type: "DELETE",
            data: { _token: "{{ csrf_token() }}" },
            success: function (response) {
                if (response.success) {
                    table.ajax.reload(null, false);
                } else {
                    // toastr.error("Lỗi khi xóa danh mục!");
                }
            },
            error: function () {
                toastr.error("Có lỗi xảy ra, vui lòng thử lại!");
            }
        });
    });
});
</script>
@endpush
