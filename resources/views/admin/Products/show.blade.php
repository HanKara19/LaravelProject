@extends('layouts.admin')

@section('title')
    Show Product
@endsection

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
                            <a href="#">Product</a>
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

        <div class="card mb-4">

            <div class="card-header">
                <h3 class="card-title">Product Detail</h3>
            </div>

            <div class="card-body p-0">

                <table class="table table-striped">

                    <tr>
                        <th style="width:200px">ID</th>
                        <td>{{ $product->id }}</td>
                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{ $product->category->title ?? 'No Category' }}</td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{ $product->title }}</td>
                    </tr>

                    <tr>
                        <th>Keywords</th>
                        <td>{{ $product->keywords }}</td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>{{ $product->description }}</td>
                    </tr>

                    <tr>
                        <th>Detail</th>
                        <td>{!! $product->detail !!}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>{{ $product->price }}</td>
                    </tr>

                    <tr>
                        <th>Stock</th>
                        <td>{{ $product->stock }}</td>
                    </tr>

                    <tr>
                        <th>Minimum Stock</th>
                        <td>{{ $product->minstock }}</td>
                    </tr>

                    <tr>
                        <th>Discount</th>
                        <td>{{ $product->discount }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($product->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Passive</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Image</th>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     width="150"
                                     class="img-thumbnail">
                            @else
                                No image
                            @endif
                        </td>
                    </tr>
                    <tr>
    <th>Gallery Images</th>
    <td>
        @if($product->images && $product->images->count() > 0)
            <div class="d-flex flex-wrap gap-2">
            @foreach($product->images as $image)
    <div class="text-center me-2">

        <img src="{{ asset('storage/' . $image->image) }}"
             width="120"
             height="120"
             class="img-thumbnail">

        <form action="{{ route('admin.product.image.delete', $image->id) }}"
              method="POST"
              class="mt-2">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this image?')">
                Delete
            </button>

        </form>

    </div>
@endforeach
            </div>
        @else
            No gallery images
        @endif
    </td>
</tr>
                    <tr>
                        <th>
                            <a href="{{ route('admin.product.index') }}"
                               class="btn btn-secondary">
                                Back
                            </a>
                        </th>

                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}"
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