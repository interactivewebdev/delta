@extends('layouts.app');

@section('custom-js-script')
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#doc_users_list').DataTable();
        })(jQuery);
    </script>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Document Requests</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Document Requests</li>
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
                        <h5>Listing of document requests</h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive product-table">
                            @if (count($requests) > 0)
                                <table class="display" id="doc_users_list">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Product</th>
                                            <th>Access In</th>
                                            <th>Request Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($requests as $key => $value)
                                            <tr>
                                                <td class="text-start">
                                                    {{ $value->name }}
                                                </td>
                                                <td class="text-start">{{ $value->title }}</td>
                                                <td class="text-start">{{ $value->accessin }}</td>
                                                <td class="text-start">{{ $value->request_date }}</td>
                                                <td>
                                                    <div class="m-1"><a
                                                            href="{{ url('/admin/dataentry/approve/' . $value->id) }}"
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Approve</a>
                                                        <a href="{{ url('/admin/dataentry/reject/' . $value->id) }}"
                                                            class="btn btn-danger btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs"
                                                            title="">Reject</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No document requests found...
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
