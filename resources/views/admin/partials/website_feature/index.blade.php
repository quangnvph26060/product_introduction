@extends('admin.layouts.app')

@section('title', 'Danh sách tính năng website')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách tính năng website</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('website_feature.create') }}" class="btn btn-success"
                                        id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm tính năng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="website_feature-table">
                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Icon image</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($websiteFeatures as $item)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ asset($item->icon_image) }}" width="150" height="150"
                                                    alt="{{ $item->name }}"></td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($item->description)), 100) }}
                                            <td>
                                                <select class="form-group change-status-website_feature" name="status"
                                                    data-id="{{ $item->id }}">
                                                    <option value="active"
                                                        {{ $item->status === 'active' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="inactive"
                                                        {{ $item->status === 'inactive' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('website_feature.edit', $item->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('website_feature.destroy', $item->id) }}"
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
        let table = new DataTable('#website_feature-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-website_feature', function() {
            var website_feature_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('website_feature.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    website_feature_id,
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
