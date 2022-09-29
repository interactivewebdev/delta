@extends('layouts.front')
@section('page-content')
    <div id="blog">
        <h1 style="flex-basis:100%;">Careers</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Careers</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="row blogs">
                    @if (count($careers) > 0)
                        @foreach ($careers as $item)
                            <div class="col-md-4">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h6 class="card-title"><a href="{{ url('careers/detail/' . $item->id) }}"
                                                class="text-capitalize">{{ substr($item->title, 0, 36) }}</a></h6>
                                        <small class="text-muted">Posted on: {{ $item->created }}</small>
                                    </div>
                                    @if ($news[0]->list_image != '')
                                        <a href="{{ url('news/detail/' . $item->id) }}">
                                            <figure><img src="{{ $item->list_image }}" class="card-img-top hoverEffect"
                                                    alt="{{ $item->title }}"></figure>
                                        </a>
                                    @else
                                        <a href="{{ url('news/detail/' . $item->id) }}">
                                            <figure><img src="{{ url('assets/images/Placeholder.png') }}"
                                                    class="card-img-top hoverEffect" alt="{{ $item->title }}"></figure>
                                        </a>
                                    @endif

                                    <div class="card-body">
                                        <p class="card-text">{!! substr($item->short_desc, 0, 250) !!}</p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-link"><a href="{{ url('news/detail/' . $item->id) }}"
                                                class="text-warning">READ MORE
                                                &raquo;</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No careers posted yet...
                    @endif
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
