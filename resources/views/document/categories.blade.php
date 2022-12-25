@extends('layouts.app');

@section('custom-js-script')
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#category-list').DataTable();
        })(jQuery);
    </script>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Document Categories</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Document Categories</li>
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
                        <h5>Listing of document categories
                            <a href="{{ url('admin/doc_category-form') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Document Category</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            @if (count($doc_categories) > 0)
                                <table class="display" id="category-list" style="width:98% !important;">
                                    <thead>
                                        <tr>
                                            <th width="30%">Name</th>
                                            <th width="30%">Parent</th>
                                            <th width="15%" class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doc_categories as $key => $value)
                                            <tr>
                                                <td class="text-start">{{ $value->title }}</td>
                                                <td>{{ $value->parent }}</td>
                                                <td class="text-center font-success">
                                                    {{ $value->status ? 'Active' : 'Inactive' }}</td>
                                                <td class="text-center">
                                                    @if ($value->status == 0)
                                                        <a href="{{ url('/admin/doc_category/active/' . $value->id) }}"
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Active</a>
                                                    @else
                                                        <a href="{{ url('/admin/doc_category/deactive/' . $value->id) }}"
                                                            class="btn btn-info btn-xs" type="button"
                                                            data-original-title="btn btn-info btn-xs"
                                                            title="">Deactive</a>
                                                    @endif
                                                    <a href="{{ url('/admin/doc_category/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</a>
                                                    <a href="{{ url('/admin/doc_category/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No document categories found...
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
