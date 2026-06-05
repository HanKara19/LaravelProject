@extends('layouts.admin')
@section('title') add category
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
                <h3 class="mb-0">Add Category</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
<!--begin::Quick Example-->
<div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title">Quick Example</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Parent</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                         <option value="0">Main Category</option>
                         @foreach ( $categories as $category )
                            <option value="{{ $category->id }}"> @if($category->parent_id && $category->parent_id !=0)
                                 {{ $category->full_path}} @endif
                                 {{ $category->title}}</option>
                         @endforeach
                        </select>
                        </div> 
                      <div class="mb-3">
                        <label for="title" class="form-label">title</label>
                        <input type="text" class="form-control"id="title" name="title"/>
                        </div>
                        <div class="mb-3">
                        <label for="title" class="form-label">keywords</label>
                        <input type="text" class="form-control"id="keywords" name="keywords"/>
                        </div>
                        <div class="mb-3">
                        <label for="title" class="form-label">description</label>
                        <input type="text" class="form-control"id="description" name="description"/>
                        </div>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image" />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>
                      <div class="mb-3">
                        <label for="title" class="form-label">status</label>
                        <select id="status"  name="status" class="form-control" >
                         <option value="1">True</option>
                         <option value="0">False</option>
                        </select>
                        </div> 
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->


            </div>
          <!--end:: Container-->
          </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      @endsection