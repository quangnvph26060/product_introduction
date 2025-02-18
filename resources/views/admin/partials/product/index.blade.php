@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')

    <div class="page-inner">


        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Danh sách sản phẩm</h4>
                        <div class="card-tools">
                            {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Import
                            </button> --}}
                            <a href="{{ route('admin.add.product') }}" class="btn btn-primary btn-sm">Thêm mới sản phẩm (+)</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="product-table">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center">STT</th>
                                        <th style="width: 25%; text-align: center">Tên</th>
                                        <th style="width: 20%; text-align: center">Danh mục</th>
                                        <th style="width: 20%; text-align: center">Trạng thái</th>
                                        <th style="width: 15%; text-align: center">Hành động</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($listProducts as $product)
                                        <tr>
                                            <td scope="row" style="text-align: center">{{ $loop->iteration }}</td>
                                            <td><a
                                                    href="{{ route('list.image-gallery.product', $product->id) }}">{{ $product->name }}
                                                    {{-- <code>(Thêm ảnh sản phẩm ở đây)</code> --}}
                                                </a>
                                            </td>
                                            {{-- <td><img src="{{ asset($product->main_image) }}" width="150" height="150"
                                                    alt="{{ $product->name }}"></td> --}}
                                            <td>{{ $product->category ? $product->category->name : '' }}</td>
 
                                            {{-- <td>{{ \Str::limit(strip_tags(html_entity_decode($product->long_description)), 100) }} --}}
                                                <td>
                                                    <select class="form-select change-status-product" name="status" data-id="{{ $product->id }}">
                                                        <option value="published" {{ $product->status === 'published' ? 'selected' : '' }}>Công khai</option>
                                                        <option value="unpublished" {{ $product->status === 'unpublished' ? 'selected' : '' }}>Không công khai</option>
                                                    </select>
                                                </td>

                                            <td>
                                                <div class="d-flex gap-3 justify-content-center">
                                                    <a href="{{ route('admin.edit.product', $product->id) }}" class="btn btn-primary " >
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ route('admin.delete.product', $product->id) }}" class="btn btn-danger "
                                                       onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')">
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
    .table>tbody>tr>td,.table>tbody>tr>th{
        padding: 5px !important;


    }
    table.table-bordered.dataTable tbody td, table.table-bordered.dataTable tbody th{
        border: 1px solid #ddd !important;
    }

    #product-table_length{
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

        })
    </script>
@endpush
