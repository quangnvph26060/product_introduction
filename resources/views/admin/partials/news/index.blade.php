@extends('admin.layouts.app')

@section('title', 'Danh sách tin tức')

@section('content')

<div class="page-inner">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Danh sách tin tức</h4>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Import
                        </button> --}}
                        <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm">Thêm mới (+)</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="product-table">
                            <thead>
                                <tr>
                                    <th style="width: 5% ;text-align:center">STT</th>
                                    <th style="width: 20% ;text-align:center">Tên </th>
                                    <th style="width: 10% ;text-align:center">Ảnh</th>
                                    <th style="width: 15% ;text-align:center">Danh mục</th>
                                    <th style="width: 25% ;text-align:center">Mô tả</th>
                                    <th style="width: 15% ;text-align:center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($news->isNotEmpty())
                                @foreach ($news as $new)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $new->title }}</td>
                                    <td><img src="{{ asset($new->image) }}" width="50" height="50"
                                            alt="{{ $new->title }}"></td>
                                    <td>{{ optional($new->newsCategory)->name }}</td>
                                    <td>{{ \Str::limit(strip_tags(html_entity_decode($new->description)), 100) }}
                                    <td>
                                        <div class="d-flex gap-3 justify-content-center">
                                            <a href="{{ route('news.edit', $new->id) }}"
                                                class="btn btn-primary ">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('news.destroy', $new->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa không ?')">
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
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Không có danh mục nào.</td>
                                    </tr>
                                @endif
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

        $(document).on('change', '.change-status-product', function() {
            var product_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('admin.product.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id,
                    status
                },
                success: function(response) {
                    alert(response.success);
                },
                error: function(error) {
                    console.log(error);
                }
            })

        });

        $(document).on('click', '.delete-product', function(e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var deleteUrl = $(this).attr('href');

            // Xác nhận xóa
            if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                $.ajax({
                    url: deleteUrl,
                    type: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id
                    },
                    success: function(response) {
                        window.location.reload();


                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
</script>
@endpush
