@extends('layouts.app');

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Categories</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Add New Documents</li>
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
                            <a href="{{ url('/admin/documents') }}" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Back to Documents Listing</a>
                        </h5>
                    </div>
                    <form class="theme-form" method="POST" enctype="multipart/form-data"
                        action="{{ url('/admin/document/store') }}">
                        <input type="hidden" name="id" value="{{ isset($document) ? $document->id : '' }}">
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
                                <label class="col-sm-3 col-form-label">Main Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($category['parent'] as $value)
                                            <option
                                                {{ isset($document) && $document->category_id == $value['id'] ? 'selected' : '' }}
                                                value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Sub Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="subcategory_id" id="subcategory_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($category['sub'] as $value)
                                            <option
                                                {{ isset($document) && $document->subcategory_id == $value['id'] ? 'selected' : '' }}
                                                value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Sub Sub Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="subsubcategory_id" id="subsubcategory_id">
                                        <option value="">-- Select --</option>
                                        @foreach ($category['subsub'] as $value)
                                            <option
                                                {{ isset($document) && $document->subsubcategory_id == $value['id'] ? 'selected' : '' }}
                                                value="{{ $value['id'] }}">{{ $value['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name of Document</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="document_name" placeholder="Title"
                                        value="{{ isset($document) ? $document->document_name : '' }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Upload Document</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="document">
                                    <small class="form-text text-muted">[Document size: upto 2 mb]</small>
                                    @if (isset($document) && $document->document != '')
                                        <br><a href="{{ $document->document }}"><i class="fa-solid fa-file"></i> <span
                                                class="font-black">{{ pathinfo($document->document)['basename'] }}</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="country">
                                        <option value="">-- Select --</option>
                                        @foreach ($country as $value)
                                            <option
                                                {{ isset($document) && $document->country == $value->id ? 'selected' : '' }}
                                                value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Valid Upto</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="valid_upto" type="date"
                                        value="{{ isset($document) ? $document->valid_upto : '' }}">
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

@section('custom-js-script')
    <script>
        jQuery(document).ready(function($) {
            // //----- Open model CREATE -----//
            // jQuery('#btn-add').click(function() {
            //     jQuery('#btn-save').val("add");
            //     jQuery('#myForm').trigger("reset");
            //     jQuery('#formModal').modal('show');
            // });

            // Change category dynamically in dropdown
            $("#category_id").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    id: e.target.value,
                };
                var type = "POST";
                var ajaxurl = 'getDocSubCategory';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        var dropdown = $('#subcategory_id');
                        dropdown.empty();
                        dropdown.append(
                            $('<option>', {
                                value: '',
                                text: '-- Select --'
                            }, '</option>'));
                        $.each(data, function(index, item) {
                            dropdown.append(
                                $('<option>', {
                                    value: item.id,
                                    text: item.title
                                }, '</option>'));
                        })

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $("#subcategory_id").change(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    id: e.target.value,
                };
                var type = "POST";
                var ajaxurl = 'getDocSubCategory';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        var dropdown = $('#subsubcategory_id');
                        dropdown.empty();
                        dropdown.append(
                            $('<option>', {
                                value: '',
                                text: '-- Select --'
                            }, '</option>'));
                        $.each(data, function(index, item) {
                            dropdown.append(
                                $('<option>', {
                                    value: item.id,
                                    text: item.title
                                }, '</option>'));
                        })

                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
