@extends('admin.layouts.app')

@section('title', 'Danh sách danh mục giới thiệu')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="col-lg-6">
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
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Danh sách danh mục tin tức</h5>
                    <div id="delete-button-container"></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0" id="newcategory-table">
                            <thead>
                                <tr>
                                    {{-- <th class="text-center"><input type="checkbox" id="select-all"></th> --}}
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
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
    td { text-align: center !important; }
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
            { data: null, name: 'id', render: function (data, type, row, meta) { return meta.row + 1; } },
            { data: 'name', name: 'name' },
            { data: 'id', name: 'action', render: function (data, type, row) {
                return `
                    <button class="btn btn-warning edit-category" data-id="${data}" data-name="${row.name}">Sửa</button>
                    <button class="btn btn-danger delete-category" data-id="${data}">Xóa</button>
                `;
            }}
        ]
    });

    // Xử lý form khi submit (thêm mới hoặc cập nhật)
    $('#category-form').on('submit', function (e) {
        e.preventDefault();
        let id = $('#category_id').val();
        let url = id ? `{{ route('news_categories.update', ':id') }}`.replace(':id', id) : `{{ route('news_categories.store') }}`;
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
                toastr.error("Có lỗi xảy ra, vui lòng thử lại!");
            },
            complete: function () {
                btn.prop('disabled', false).text(id ? 'Cập nhật' : 'Thêm mới');
            }
        });
    });

    // Khi nhấn nút "Sửa", điền thông tin vào form
    $(document).on('click', '.edit-category', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');

        $('#category_id').val(id);
        $('#category_name').val(name);
        $('#form-title').text('Chỉnh sửa danh mục tin tức');
        $('#btn-save').text('Cập nhật');
        $('#btn-cancel').removeClass('d-none');
    });

    // Khi nhấn nút "Hủy", reset form về trạng thái thêm mới
    $('#btn-cancel').on('click', function () {
        resetForm();
    });

    function resetForm() {
        $('#category_id').val('');
        $('#category_name').val('');
        $('#form-title').text('Thêm danh mục tin tức');
        $('#btn-save').text('Thêm mới');
        $('#btn-cancel').addClass('d-none');
    }

    // Xử lý xóa danh mục
    $(document).on('click', '.delete-category', function () {
        let id = $(this).data('id');
        if (confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
            $.ajax({
                url: `{{ route('news_categories.destroy', ':id') }}`.replace(':id', id),
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },
                success: function (response) {
                    if (response.success) {
                        table.ajax.reload(null, false);
                        toastr.success('Xóa thành công!');
                    } else {
                        toastr.error('Xóa thất bại!');
                    }
                },
                error: function () {
                    toastr.error('Có lỗi xảy ra, vui lòng thử lại!');
                }
            });
        }
    });
});

</script>
@endpush
