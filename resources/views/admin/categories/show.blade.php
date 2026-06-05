@extends('layouts.admin')

@section('title')
    Show Category
@endsection

@section('content')

<!--begin::App Main-->
<main class="app-main">

    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Show Category</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Category</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Show Category
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">

        <div class="card mb-4">

            <div class="card-header">
                <h3 class="card-title">Category Detail</h3>
            </div>

            <div class="card-body p-0">

                <table class="table table-striped">

                    <tr>
                        <th style="width:200px">ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>

                    <tr>
                        <th>Parent Category</th>
                        <td>{{ $category->full_path }}</td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{ $category->title }}</td>
                    </tr>

                    <tr>
                        <th>Keywords</th>
                        <td>{{ $category->keywords }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $category->description }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($category->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Passive</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Image</th>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}"
                                     width="150"
                                     class="img-thumbnail">
                            @else
                                No image
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Sub Categories</th>
                        <td>
                            @if($category->children->count() > 0)
                                <ul class="mb-0">
                                    @foreach($category->children as $child)
                                        <li>{{ $child->title }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No sub categories
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <a href="{{ route('admin.categories.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>
                        </th>

                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>
    <!--end::App Content-->

</main>
<!--end::App Main-->

@endsection