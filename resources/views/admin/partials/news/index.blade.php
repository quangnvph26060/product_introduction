@extends('admin.layouts.app')

@section('title', 'Danh sách tin tức')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách tin tức</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('news.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm tin tức</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="news-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Ảnh</th>
                                        <th>Danh mục</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $new)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $new->title }}</td>
                                            <td><img src="{{ asset($new->image) }}" width="150" height="150"
                                                    alt="{{ $new->title }}"></td>
                                            <td>{{ optional($new->newsCategory)->name }}</td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($new->description)), 100) }}
                                            <td>
                                                <select class="form-group change-status-news" name="status"
                                                    data-id="{{ $new->id }}">
                                                    <option value="published"
                                                        {{ $new->status === 'published' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="unpublished"
                                                        {{ $new->status === 'unpublished' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('news.edit', $new->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('news.destroy', $new->id) }}"
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
        let table = new DataTable('#news-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-news', function() {
            var new_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('news.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    new_id,
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
