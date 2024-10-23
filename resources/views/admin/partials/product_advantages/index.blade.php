@extends('admin.layouts.app')

@section('title', 'Danh sách lợi ích sản phẩm')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách lợi ích sản phẩm</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('product_advantages.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm lợi ích sản phẩm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="product_advantages-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lợi ích</th>
                                        <th>Ảnh</th>
                                        <th>Icon</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productAdvantages as $item)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ asset($item->image) }}" width="150" height="150"
                                                    alt="{{ $item->name }}"></td>
                                            <td><img src="{{ asset($item->icon) }}" width="150" height="150"
                                                    alt="{{ $item->name }}"></td>
                                            <td>
                                                <select class="form-group change-status-product_advantages" name="status"
                                                    data-id="{{ $item->id }}">
                                                    <option value="published"
                                                        {{ $item->status === 'published' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="unpublished"
                                                        {{ $item->status === 'unpublished' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('product_advantages.edit', $item->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('product_advantages.destroy', $item->id) }}"
                                                        class="btn btn-danger delete-item"><i
                                                            class="fa-solid fa-trash"></i></a>
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
        let table = new DataTable('#product_advantages-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-product_advantages', function() {
            var product_advantages_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('product_advantages.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_advantages_id,
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
