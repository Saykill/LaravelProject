@extends('layouts.admin')
@section('title') Show Category @endsection
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Show Product</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item">
                                <a href="{{ route('categories.index')}}">Product</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Show Product
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Product Details</h3>
                        <div class="mb-3">
                             <strong>Parent Category</strong>
                             {{$category->full_path}}
                        </div>

                        <div class="mb-3">
                            <strong>Title</strong>
                            {{$category->title}}
                        </div>

                        <div class="mb-3">
                            <strong>Keywords</strong>
                            {{$category->keywords}}
                        </div>

                        <div class="mb-3">
                            <strong>Description</strong>
                            {{$category->description}}
                        </div>

                        <div class="mb-3">
                            <strong>Status</strong>
                            @if($category->status==1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Passive</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Image</strong><br>
                            @if($category->image)
                                <img src="{{asset('storage/' . $category->image)}}" width="150" class="img-thumbnail">
                            @else
                                No image
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Sub Categories</strong><br>
                            @if($category->children->count() > 0)
                                <ul>
                                    @foreach($category->children as $child)
                                        <li>{{$child->title}}</li>
                                    @endforeach
                                </ul>
                            @else
                                No sub categories
                            @endif
                        </div>

                        <a href="{{route('categories.index')}}" class="btn btn-secondary">Back</a>
                        <a href="{{route('categories.edit' , $category->id)}}" class="btn btn-primary">edit</a>

                    </div>
                </div>
            </div>
        </div>

        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
