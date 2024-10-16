@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách sản phẩm</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <div class="card-sub">
                            Create responsive tables by wrapping any table with
                            <code class="highlighter-rouge">.table-responsive</code>
                            <code class="highlighter-rouge">DIV</code> to make them
                            scroll horizontally on small devices
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Mô tả ngắn</th>
                                        <th>Mô tả chi tiết</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td><a
                                                    href="{{ route('list.image-gallery.product', $product->id) }}">{{ $product->name }}</a>
                                            </td>
                                            <td><img src="{{ asset($product->main_image) }}" width="150" height="150"
                                                    alt="{{ $product->name }}"></td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ \Str::limit($product->short_description, 50) }}</td>
                                            <td>{{ \Str::limit($product->long_description, 100) }}</td>
                                            <td>
                                                <select class="form-group change-status-product" name="status"
                                                    data-id="{{ $product->id }}">
                                                    <option value="published"
                                                        {{ $product->status === 'published' ? 'selected' : '' }}>
                                                        published</option>
                                                    <option value="unpublished"
                                                        {{ $product->status === 'unpublished' ? 'selected' : '' }}>
                                                        unpublished</option>
                                                </select>
                                            </td>
                                            <td style="display: flex">
                                                <div> <a href="{{ route('admin.edit.product', $product->id) }}"
                                                        class="btn btn-primary">Edit</a></div>
                                                <div><a href="{{ route('admin.delete.product', $product->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Bạn có muốn xóa sản phẩm này ?')">Delete</a>
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


@endsection

@push('scripts')
    <script>
        $(document).on('change', '.change-status-product', function() {
            var id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: "{{ route('product.change-status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    id,
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
