@extends('layouts.app');

@section('custom-js-script')
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#documents-list').DataTable();
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
                    <h3>Documents</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Documents</li>
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
                        <h5>Listing of documents
                            <a href="{{ url('/admin/document-form') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Document</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            @if (count($documents) > 0)
                                <table class="display" id="documents-list">
                                    <thead>
                                        <tr>
                                            <th style="width:150px !important;">Name</th>
                                            <th>Category</th>
                                            <th style="width:100px !important;">Document</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($documents as $key => $value)
                                            <tr>
                                                <td class="text-start">{{ $value->document_name }}</td>
                                                <td>{{ $value->category_name }}</td>
                                                <td style="width:100px !important; text-align:center;"><a
                                                        href="{{ $value->document }}" target="_blank"><i
                                                            class="fa-solid fa-file"></i></a>
                                                </td>
                                                <td>{{ $value->country_name }}</td>
                                                <td class="font-success">{{ $value->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    @if ($value->status == 0)
                                                        <a href="{{ url('/admin/document/active/' . $value->id) }}"
                                                            class="btn btn-success btn-xs edit-btn" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Active</a>
                                                    @else
                                                        <a href="{{ url('/admin/document/deactive/' . $value->id) }}"
                                                            class="btn btn-info btn-xs edit-btn" type="button"
                                                            data-original-title="btn btn-info btn-xs"
                                                            title="">Deactive</a>
                                                    @endif
                                                    <a href="{{ url('/admin/document/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-xs edit-btn" type="button"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</a>
                                                    <a href="{{ url('/admin/document/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-xs edit-btn" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No documents found...
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
