@extends('layouts.app');

@section('custom-js-script')
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#list').DataTable();
        })(jQuery);
    </script>
@endsection

@section('custom-css-styles')
    <style>
        a.edit-btn {
            margin: 5px;
            display: block;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Benefits</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Benefits</li>
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
                        <h5>Listing of Benefits
                            <a href="{{ url('/admin/benefit-form') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Benefit</a>
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
                        <div class="table-responsive">
                            <table class="display" id="list">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th style="width:30%;">Title</th>
                                        <th>Short Desc</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($benefits as $key => $value)
                                        <tr>
                                            <td><img src="{{ $value->image }}" width="50" />
                                            </td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->short_desc }}</td>
                                            <td>{!! $value->status ? '<span class="font-success">Active</span>' : '<span class="font-danger">Inactive</span>' !!}
                                            </td>
                                            <td>
                                                @if ($value->status == 0)
                                                    <a href="{{ url('/admin/benefit/active/' . $value->id) }}"
                                                        class="btn btn-success btn-xs edit-btn"
                                                        data-original-title="btn btn-success btn-xs"
                                                        title="">Active</a>
                                                @else
                                                    <a href="{{ url('/admin/benefit/deactive/' . $value->id) }}"
                                                        class="btn btn-info btn-xs edit-btn"
                                                        data-original-title="btn btn-info btn-xs"
                                                        title="">Deactive</a>
                                                @endif
                                                <a href="{{ url('/admin/benefit/delete/' . $value->id) }}"
                                                    class="btn btn-danger btn-xs edit-btn"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</a>
                                                <a href="{{ url('/admin/benefit/edit/' . $value->id) }}"
                                                    class="btn btn-primary btn-xs edit-btn"
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
