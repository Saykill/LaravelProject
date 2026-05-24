@section('title') Products List @endsection
@section('content')
    <!--begin::App Main-->
    @extends('layouts.admin')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-2 mt-5">
                        <a href="/admin/product/create" type="button" class="btn btn-info mt-5">Add Product</a>
                    </div>
                    <div class="col-sm-2  mt-5">
                        <h3 class="mt-5">Products List</h3>
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
                    <table class="table table-bordered mt-5">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th width="100">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                    @if($product->category)
                                        {{$product->category->full_path}}
                                    @else
                                        no category
                                    @endif
                                </td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->discount}}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{asset('storage/' . $product->image)}}" width="60">
                                    @endif
                                </td>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success">True</span>
                                    @else
                                        <span class="badge bg-danger">False</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{route('admin.product.edit' , $product->id )}}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{route('admin.product.destroy' , $product->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No product found.</td>
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
