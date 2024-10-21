@extends('admin.layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách bài viết</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('post.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm bài viết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="post-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td><img src="{{ asset($post->image) }}" width="150" height="150"
                                                    alt="{{ $post->title }}"></td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($post->description)), 100) }}
                                            <td>
                                                <select class="form-group change-status-post" name="status"
                                                    data-id="{{ $post->id }}">
                                                    <option value="published"
                                                        {{ $post->status === 'published' ? 'selected' : '' }}>
                                                        Công khai</option>
                                                    <option value="unpublished"
                                                        {{ $post->status === 'unpublished' ? 'selected' : '' }}>
                                                        Không công khai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div><a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-primary">Sửa</a></div>
                                                <div><a href="{{ route('post.destroy', $post->id) }}"
                                                        class="btn btn-danger delete-item"
                                                        >Xóa</a>
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
        let table = new DataTable('#post-table', {
            responsive: true
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
