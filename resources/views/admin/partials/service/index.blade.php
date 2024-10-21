@extends('admin.layouts.app')

@section('title', 'Danh sách dịch vụ')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách dịch vụ</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('service.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm dịch vụ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="service-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td><img src="{{ asset($service->images) }}" width="150" height="150"
                                                    alt="{{ $service->name }}"></td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($service->description)), 100) }}
                                            </td>


                                            <td>
                                                <select class="form-group change-status-service" name="status"
                                                    data-id="{{ $service->id }}">
                                                    <option value="published"
                                                        {{ $service->status === 'published' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="unpublished"
                                                        {{ $service->status === 'unpublished' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('service.edit', $service->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('service.destroy', $service->id) }}"
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
        let table = new DataTable('#service-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-service', function() {
            var service_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('service.change-status') }}',
                type: "service",
                data: {
                    _token: '{{ csrf_token() }}',
                    service_id,
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
