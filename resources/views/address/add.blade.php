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
                    <h3>Address</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Address</li>
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
                        <h5>{{ $title }}
                            <a href="{{ url('/admin/addresses') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Back to Address Listing</a>
                        </h5>
                    </div>
                    <form class="theme-form" method="POST" enctype="multipart/form-data"
                        action="{{ url('/admin/address/store') }}">
                        <input type="hidden" name="id" value="{{ isset($address) ? $address->id : '' }}">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Country <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="country">
                                        <option value="">-- Select --</option>
                                        @foreach ($countries as $cn)
                                            <option value="{{ $cn->iso_code_2 }}"
                                                {{ isset($address) && $address->country == $cn->iso_code_2 ? 'selected' : '' }}>
                                                {{ $cn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">City <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="city" placeholder="City"
                                        value="{{ isset($address) ? $address->city : '' }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" placeholder="Address"
                                        value="{{ isset($address) ? $address->address : '' }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Latitude <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lat" placeholder="latitude"
                                        value="{{ isset($address) ? $address->lat : '' }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Longitude <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lon" placeholder="longitude"
                                        value="{{ isset($address) ? $address->lon : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
