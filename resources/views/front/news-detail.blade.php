@extends('layouts.front')
@section('page-content')
    <div class="content-banner-image">
        <figure>
            <img src="{{ $blog->image }}">
        </figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-over-image">{{ $blog->title }}</div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;">{!! $blog->description !!}</div>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
