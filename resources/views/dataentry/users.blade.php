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
                    <h3>Dataentry Users</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Dataentry Users</li>
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
                        <h5>Listing of dataentry users
                            <a href="{{ url('admin/dataentry/user-form') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Dataentry User</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive product-table">
                            @if (count($users) > 0)
                                <table class="display" id="doc_users_list">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $value)
                                            <tr>
                                                <td class="text-start">
                                                    {{ $value->name }}
                                                    @if ($value->approve == 0)
                                                        <br><span class="badge bg-warning text-white">Pending</span>
                                                    @elseif ($value->approve == 1)
                                                        <br><span class="badge bg-success text-white">Approved</span>
                                                    @else
                                                        <br><span class="badge bg-danger text-white">Rejected</span>
                                                    @endif
                                                </td>
                                                <td class="text-start">{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td class="font-success">{{ $value->status ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/dataentry/assign/' . $value->id) }}"
                                                        class="btn btn-primary btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Assign
                                                        Access</a>
                                                    <a href="{{ url('/admin/dataentry/edit/' . $value->id) }}"
                                                        class="btn btn-primary btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                                    <a href="{{ url('/admin/dataentry/delete/' . $value->id) }}"
                                                        class="btn btn-danger btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</a>
                                                    @if ($value->status == 0)
                                                        <a href="{{ url('/admin/dataentry/active/' . $value->id) }}"
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Active</a>
                                                    @else
                                                        <a href="{{ url('/admin/dataentry/deactive/' . $value->id) }}"
                                                            class="btn btn-info btn-xs" type="button"
                                                            data-original-title="btn btn-info btn-xs"
                                                            title="">Deactive</a>
                                                    @endif

                                                    @if ($value->approve == 0)
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
                                                    @endif


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                No dataentry users found...
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
