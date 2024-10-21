@extends('admin.layouts.app')

@section('title', 'Danh sách doanh nghiệp')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách doanh nghiệp</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('businesses.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm doanh nghiệp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="businesses-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($businesses as $business)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $business->name }}</td>
                                            <td><img src="{{ asset($business->image) }}" width="150" height="150"
                                                    alt="{{ $business->title }}"></td>
                                            <td>{{ $business->email }}</td>
                                            <td>{{ $business->phone_number }}</td>
                                            <td>{{ \Str::limit($business->description, 100) }}</td>
                                            <td>
                                                <select class="form-group change-status-businesses" name="status"
                                                    data-id="{{ $business->id }}">
                                                    <option value="published"
                                                        {{ $business->status === 'published' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="unpublished"
                                                        {{ $business->status === 'unpublished' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('businesses.edit', $business->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('businesses.destroy', $business->id) }}"
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
        let table = new DataTable('#businesses-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-businesses', function() {
            var business_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('businesses.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    business_id,
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
