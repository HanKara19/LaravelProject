@extends('layouts.admin')
@section('title') Edit Category @endsection
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
                <h3 class="mb-0">Edit Category</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
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
       
       
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.categories.form', ['category' => $category, 'categories' => $categories])

        <button type="submit" class="btn btn-primary">Update</button>

        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
    </form>
    </div>

          <!--end:: Container-->
          </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      @endsection