@extends('layouts.front')
@section('page-content')
    <div style="display:flex; align-items: center; justify-content:center; height:100%;">
        <img src="{{ url('assets/images/pagenotfound.png') }}" width="400">
    </div>
    <div class="text-center">
        <h3>We couldn't find that page.</h3>
    </div>
    <div class="text-center mx-5 px-5">Look like we couldn't find that page. Please try again or contact with administrator
        if the problem persists.
    </div>
    <div class="text-center my-5 py-5">
        <a class="btn btn-info" href="{{ url('/') }}">Take me at Homepage</a>
    </div>
@endsection
