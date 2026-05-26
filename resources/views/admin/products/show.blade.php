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
                    <div class="card body p-0">
                        <table class="table table-striped" role="table">
                            <tr>
                                <th style="width: 200px">ID:</th>
                                <td>{{$product->id}}</td>
                            </tr>

                            <tr>
                                <th>Category:</th>
                                <td>
                                    @if($product->category)
                                        {{$product->category->full_path}}
                                    @else
                                    No category
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>User ID:</th>
                                <td>{{$product->user_id}}</td>
                            </tr>

                            <tr>
                                <th>Title:</th>
                                <td>{{$product->title}}</td>
                            </tr>

                            <tr>
                                <th>Keywords:</th>
                                <td>{{$product->keywords}}</td>
                            </tr>

                            <tr>
                                <th>Description:</th>
                                <td>{{$product->description}}</td>
                            </tr>

                            <tr>
                                <th>Detail:</th>
                                <td>{{$product->detail}}</td>
                            </tr>

                            <tr>
                                <th>Price:</th>
                                <td>{{$product->price}}</td>
                            </tr>

                            <tr>
                                <th>Stock:</th>
                                <td>{{$product->stock}}</td>
                            </tr>

                            <tr>
                                <th>Minimum Stock:</th>
                                <td>{{$product->minstock}}</td>
                            </tr>

                            <tr>
                                <th>Discount:</th>
                                <td>{{$product->discount}}</td>
                            </tr>

                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Passive</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Image:</th>
                                <td>
                                @if($product->image)
                                    <img src="{{asset('storage/' . $product->image)}}"
                                         width="300"
                                         class="img-fluid"
                                @else
                                    No Image
                                @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                        <a href="{{route('admin.product.index', $product->id)}}" class="btn btn-secondary">Back</a>
                        <a href="{{route('admin.product.edit' , $product->id)}}" class="btn btn-primary">Edit</a>

                    </div>
                </div>
            </div>
        </div>

        <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection
