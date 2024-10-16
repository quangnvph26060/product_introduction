@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Category</li>
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
                                                id="addproduct-btn"><i class="ri-add-line align-bottom me-1"></i> Add
                                                Category</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control" id="searchProductList"
                                                    placeholder="Search Categories...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end card header -->
                            <div class="card-body">

                                <div class="table-responsive table-card">
                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Parent</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $category->parent_id ? $category->parent->name : 'None' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <form
                                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                    <div style="margin:15px;">

                                        {{ $categories->links() }}
                                    </div>

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
