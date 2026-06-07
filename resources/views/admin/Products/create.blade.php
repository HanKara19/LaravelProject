@extends('layouts.admin')
@section('title')
    Add Product
@endsection

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
                    <h3 class="mb-0">Add Product</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.product.index') }}">Product</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add Product
                        </li>
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

        <form action="{{ route('admin.product.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
                
                @include('admin.products.form')

                <button type="submit" class="btn btn-primary">
                    Save Product
                </button>

                <a href="{{ route('admin.product.index') }}"
                   class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->

</main>
<!--end::App Main-->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script>
   @endsection

   @section('footer')

<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

<style>
    .ck-editor__editable {
        min-height: 300px;
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const detailField = document.querySelector('#detail');

    if (detailField) {
        ClassicEditor
            .create(detailField)
            .catch(error => {
                console.error(error);
            });
    }
});
</script>

@endsection