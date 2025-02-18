@extends('admin.layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')

<div class="page-inner">


    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Danh sách dịch vụ</h4>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Import
                        </button> --}}
                        <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm">Thêm mới dịch vụ (+)</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="product-table">
                            <thead>
                                <tr>
                                    <th style="width: 10%; text-align: center">STT</th>
                                    <th style="width: 35%; text-align: center">dịch vụ</th>
                                    <th style="width: 10%; text-align: center">Ảnh</th>
                                    {{-- <th style="width: 15%; text-align: center">Trạng thái</th> --}}
                                    <th style="width: 20%; text-align: center">Hành động</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td scope="row" style="text-align: center">{{ $loop->iteration }}</td>
                                    <td class="text-center"> {{ $service->name }} </td>
                                        <td class="text-center"><img src="{{ asset($service->images) }}" width="30" height="30"
                                                alt="{{ $service->name }}"> </td>
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
                                                <a href="{{ route('service.edit', $service->id) }}"
                                                    class="btn btn-primary ">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('service.destroy', $service->id) }}"
                                                    class="btn btn-danger "
                                                    onclick="return confirm('Bạn có muốn xóa  bài viết này ?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
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
