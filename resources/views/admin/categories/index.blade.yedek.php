@extends('layouts.admin')
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-2">
                       <a href="/admin/categories/create" type="button" class="btn btn-info mb-2">Add Category</a>
                    </div>
                    <div class="col-sm-2">
                        <h3 class="mb-0">Title</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category List</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="app-content">
                    <!--begin::Container-->
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Parent</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th width="100">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    @if($category->parent_id && $category->parent_id !=0)
                                        {{$category->full_path}}
                                    @else
                                        main category
                                    @endif
                                </td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->keywords}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    @if($category->image)
                                        <img src="{{asset('storage/' . $category->image)}}" width="60">
                                    @endif
                                </td>
                                <td>
                                    @if($category->status)
                                        <span class="badge bg-success">True</span>
                                    @else
                                        <span class="badge bg-danger">False</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categories.show', $category->id)}}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{route('categories.destroy' , $category->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No categories found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
