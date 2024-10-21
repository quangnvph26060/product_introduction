@extends('admin.layouts.app')

@section('title', 'Danh sách website')

@section('content')
    <div class="page-inner">

        <div class="page-header">
            <h3 class="fw-bold mb-3">Danh sách website</h3>
        </div>
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{ route('website.create') }}" class="btn btn-success" id="addproduct-btn"><i
                                            class="ri-add-line align-bottom me-1"></i>Thêm website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="website-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Ảnh</th>
                                        <th>Mô tả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($websites as $website)
                                        <tr>
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $website->title }}</td>
                                            <td><img src="{{ asset($website->image) }}" width="150" height="150"
                                                    alt="{{ $website->title }}"></td>
                                            <td>{{ \Str::limit(strip_tags(html_entity_decode($website->description)), 100) }}
                                            <td>
                                                <div><a href="{{ route('website.edit', $website->id) }}"
                                                        class="btn btn-primary"><i
                                                            class="fa-regular fa-pen-to-square"></i></a></div>
                                                <div><a href="{{ route('website.destroy', $website->id) }}"
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
        let table = new DataTable('#website-table', {
            responsive: true
        });
    </script>
@endpush
