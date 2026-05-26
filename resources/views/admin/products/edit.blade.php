@extends('layouts.admin')
@section('title') Edit Product@endsection
@section('content')
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mt-5">Edit Product</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Submenu</li>
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
                <form action="{{route('admin.product.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.products.form')

                    <button type="submit" class="btn btn-primary">
                        Save Product
                    </button>

                    <a href="{{route('admin.product.index')}}" class="btn btn-secondary">
                        Back
                    </a>
                </form>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    @section('footer')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <style>
            .ck-editor__editable {
                min-height: 300px;
            }


            :root {

                --ck-color-base-background: #222736;
                --ck-color-base-border: #2a3042;
                --ck-color-base-text: #ced4da;


                --ck-color-toolbar-background: #2a3042;
                --ck-color-toolbar-border: #32394e;


                --ck-color-button-default-background: transparent;
                --ck-color-button-default-hover-background: #32394e;
                --ck-color-button-default-active-background: #3b435c;
                --ck-color-button-on-background: #3b435c;
                --ck-color-button-on-color: #ffffff;


                --ck-color-text: #ced4da;


                --ck-color-dropdown-panel-background: #2a3042;
                --ck-color-dropdown-panel-border: #32394e;


                --ck-color-list-background: #2a3042;
                --ck-color-list-button-hover-background: #32394e;


                --ck-color-panel-background: #2a3042;
                --ck-color-panel-border: #32394e;


                --ck-color-input-background: #222736;
                --ck-color-input-border: #32394e;
                --ck-color-input-text: #ced4da;
            }

            .ck-focused {
                border-color: #4b546b !important;
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded' , function (){
                const detailElement = document.querySelector('#detail');

                if(detailElement){
                    ClassicEditor
                        .create(detailElement)
                        .catch(error=>{
                            console.error(error);
                        });
                }
            });
        </script>
    @endsection
@endsection
