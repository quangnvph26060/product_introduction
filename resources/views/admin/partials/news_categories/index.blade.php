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
            // { data: 'id', name: 'select', orderable: false, searchable: false, render: function (data) {
            //     return `<input type="checkbox" class="category-checkbox" value="${data}">`;
            // }},
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

    // function createDeleteButton() {
    //     let deleteButton = $('<button>', {
    //         class: 'btn btn-danger d-none ms-5',
    //         id: 'btn-delete-selected',
    //         text: 'Xóa đã chọn'
    //     });
    //     $('.dt-length').append(deleteButton);
    // }

    // createDeleteButton();

    $('#select-all').on('change', function () {
        $('.category-checkbox').prop('checked', $(this).prop('checked'));
        toggleDeleteButton();
    });

    $(document).on('change', '.category-checkbox', function () {
        toggleDeleteButton();
    });

    function toggleDeleteButton() {
        let checkedCount = $('.category-checkbox:checked').length;
        $('#btn-delete-selected').toggleClass('d-none', checkedCount === 0);
    }

    $('#btn-delete-selected').on('click', function () {
        let selectedIds = $('.category-checkbox:checked').map(function () {
            return $(this).val();
        }).get();

        if (!confirm('Bạn có chắc chắn muốn xóa các danh mục đã chọn?')) return;


    });
});
</script>
@endpush
