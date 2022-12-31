@extends('layouts.front')
@section('page-content')
    <div id="blog">
        <h1 style="flex-basis:100%;">Thanks</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanks</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="row blogs">
                    <h3>Thanks</h3>
                    <p>{{ Session::get('message') }}</p>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
