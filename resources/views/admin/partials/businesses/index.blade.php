@extends('admin.layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')

<div class="page-inner">


    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Danh sách doanh nghiệp</h4>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Import
                        </button> --}}
                        <a href="{{ route('businesses.create') }}" class="btn btn-primary btn-sm">Thêm mới doanh nghiệp (+)</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="product-table">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align: center">STT</th>
                                    <th style="width: 35%; text-align: center">DOanh nghiệp</th>
                                    <th style="width: 10%; text-align: center">Ảnh</th>
                                    {{-- <th style="width: 15%; text-align: center">Trạng thái</th> --}}
                                    <th style="width: 20%; text-align: center">Hành động</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($businesses as $business)
                                <tr>
                                    <td scope="row" style="text-align: center">{{ $loop->iteration }}</td>
                                    <td> {{ $business->name }} ( {{ $business->email }} )</td>
                                        <td class="text-center"><img src="{{ asset($business->image) }}" width="30" height="30"
                                                alt="{{ $business->name }}"> </td>
                                        {{-- <td>
                                            <select class="form-select change-status-product" name="status"
                                                data-id="{{ $business->id }}">
                                                <option value="published" {{ $business->status === 'published' ?
                                                    'selected' : '' }}>Công khai</option>
                                                <option value="unpublished" {{ $business->status === 'unpublished' ?
                                                    'selected' : '' }}>Không công khai</option>
                                            </select>
                                        </td> --}}

                                        <td>
                                            <div class="d-flex gap-3 justify-content-center">
                                                <a href="{{ route('businesses.edit', $business->id) }}"
                                                    class="btn btn-primary ">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('businesses.destroy', $business->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa không ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


<style>
    .change-status-product {
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
        font-size: 14px;
        cursor: pointer;
    }

    .table>tbody>tr>td,
    .table>tbody>tr>th {
        padding: 5px !important;


    }

    table.table-bordered.dataTable tbody td,
    table.table-bordered.dataTable tbody th {
        border: 1px solid #ddd !important;
    }

    #product-table_length {
        margin-bottom: 20px;
    }
</style>

@endpush

@push('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table1 = new DataTable('#product-table', {
            responsive: true,
            searching: true,
            language: {
                lengthMenu: "_MENU_"
            }
        });

        $(document).on('change', '.change-status-post', function() {
            var post_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('post.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    post_id,
                    status
                },
                success: function(response) {
                    alert(response.success);
                },
                error: function(error) {
                    console.log(error);
                }
            })

        })
</script>
@endpush
