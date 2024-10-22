@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh mục</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Danh mục</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success"
                                                id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i>Thêm danh
                                                mục</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end card header -->
                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0"
                                        id="category-table">
                                        <thead>
                                            <tr>
                                                <td>Tên</td>
                                                <td>Cha</td>
                                                <td>Hành động</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($listCategories->isNotEmpty())
                                                @foreach ($listCategories as $category)
                                                    <tr>
                                                        <td>
                                                            <div> {{ $category->name }} <code>(Danh mục cha)</code></div>
                                                            @if ($category->children->count() > 0)
                                                                <div class="children" style="margin-left: 100px">
                                                                    @foreach ($category->children as $item)
                                                                        <div style="margin: 5px 0px">-- {{ $item->name }}
                                                                            <a href="{{ route('admin.categories.edit', $item->id) }}"
                                                                                class="btn btn-success"><i
                                                                                    class="fa-regular fa-pen-to-square"></i></a>
                                                                            <a href="{{ route('admin.categories.destroy', $item->id) }}"
                                                                                class="btn btn-danger delete-item"><i
                                                                                    class="fa-solid fa-trash"></i></a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div><code>(Không có danh mục con)</code></div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $category->parent_id ? $category->parent->name : 'Không' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                                class="btn btn-primary">Sửa</a>
                                                            <a href="{{ route('admin.categories.destroy', $category->id) }}"
                                                                class="btn btn-danger delete-item">Xóa</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>

                                <!-- end tab content -->

                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>


@endsection
@push('scripts')
    <script>
        let table = new DataTable('#category-table');
    </script>
@endpush
