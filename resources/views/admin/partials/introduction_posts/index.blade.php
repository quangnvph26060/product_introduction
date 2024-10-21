@extends('admin.layouts.app')

@section('title', 'Danh sách bài viết giới thiệu')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách bài viết giới thiệu</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('introduction_posts.create') }}" class="btn btn-success"
                                        id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm bài viết giới
                                        thiệu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="introduction_posts-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Danh mục giới thiệu</th>
                                        <th>Mô tả</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($introductionPosts as $item)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td><img src="{{ asset($item->image) }}" width="150" height="150"
                                                    alt="{{ $item->title }}"></td>
                                            <td>{{ optional($item->introductionCategory)->name }}</td>

                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($item->content)), 100) }}
                                            <td>
                                                <select class="form-group change-status-introduction_posts" name="status"
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
                                                <div><a href="{{ route('introduction_posts.edit', $item->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('introduction_posts.destroy', $item->id) }}"
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
        let table = new DataTable('#introduction_posts-table', {
            responsive: true
        });
        $(document).on('change', '.change-status-introduction_posts', function() {
            var introduction_post_id = $(this).data('id');
            var status = $(this).find(":selected").val();
            $.ajax({
                url: '{{ route('introduction_posts.change-status') }}',
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    introduction_post_id,
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
