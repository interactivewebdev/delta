@extends('layouts.app');

@section('custom-js-script')
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#product-list').DataTable();
        })(jQuery);
    </script>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Products</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid list-products">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Listing of products
                            <a href="{{ route('product-form') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Product</a>
                        </h5>
                        {{-- <span>The searching functionality provided by
                            DataTables is useful for quickly search through the information in the table - however the
                            search is global, and you may wish to present controls that search on specific columns.</span> --}}
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive product-table">
                            <table class="display" id="product-list">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $value)
                                        <tr>
                                            <td><a href="javascript:void(0)"><img src="{{ $value->image }}" width="100"
                                                        alt=""></a>
                                            </td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->category }}</td>
                                            <td class="font-success">{{ $value->status ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    <a href="{{ url('/product/active/' . $value->product_id) }}"
                                                        class="btn btn-success btn-xs" type="button"
                                                        data-original-title="btn btn-success btn-xs"
                                                        title="">Active</a>
                                                @else
                                                    <a href="{{ url('/product/deactive/' . $value->product_id) }}"
                                                        class="btn btn-info btn-xs" type="button"
                                                        data-original-title="btn btn-info btn-xs"
                                                        title="">Deactive</a>
                                                @endif
                                                <a href="{{ url('/product/delete/' . $value->product_id) }}"
                                                    class="btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</a>
                                                <a href="{{ url('/product/edit/' . $value->product_id) }}"
                                                    class="btn btn-primary btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
