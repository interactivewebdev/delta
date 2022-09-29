@extends('layouts.front')
@section('page-content')
    <div class="content">
        <div class="container">
            @if (count($benefits) > 0)
                <div class="benefits">
                    <h2 style="text-align:center; margin:50px 0; font-weight:normal;">Benefits with DeltaBioCare</h2>
                    <div class="row" style="margin:50px 0;">
                        @foreach ($benefits as $row)
                            <div class="col-md-3 partition">
                                <div style="text-align:center; padding-bottom:10px;"><img src="{{ $row->image }}"
                                        class="content-short-image"></div>
                                <div style="height:75px;">
                                    <h4 style="text-align:center; font-weight:normal;">{{ $row->title }}</h4>
                                </div>
                                <div style="text-align:center;">{{ $row->short_desc }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="row" style="margin:50px 0; background:#fafafa; padding:100px 20px;">
                <div class="col-md-3">
                    <h1 class="underline">{{ $about->title }}</h1>
                    <img src="{{ $about->list_image }}" class="content-image">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8" style="text-align:justify; line-height:30px;">
                    {{ nl2br(substr($about->short_desc, 0, 725)) }}...
                    <div><a class="btn btn-xs btn-outline-primary" href="{{ url('/about') }}">READ MORE</a></div>
                </div>
            </div>
            @if (count($news) > 0)
                <h2 style="text-align:center; margin-bottom:50px;">News</h2>
                <div class="row">
                    <div class="col-md-12">
                        @if (count($news) >= 1)
                            <div class="row" style="margin:50px 0;">
                                <div class="col-md-8">
                                    <div>
                                        <h4 style="font-weight:normal;" class="underline">{{ $news[0]->title }}</h4>
                                    </div>
                                    <div style="text-align:justify;">{{ substr($news[0]->short_desc, 0, 500) }}</div>
                                    <div style="margin:30px 0"><a class="btn btn-outline-primary"
                                            href="{{ url('news/detail/' . $news[0]->id) }}" style=>READ MORE</a></div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    @if ($news[0]->list_image != '')
                                        <img src="{{ $news[0]->list_image }}" class="news-image">
                                    @else
                                        <img src="{{ url('assets/front/images/Placeholder.png') }}" class="news-image">
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if (count($news) == 2)
                            <div class="row" style="margin:50px 0;background-color: #fafafa; padding:50px 10px;">
                                <div class="col-md-3">
                                    @if ($news[1]->list_image != '')
                                        <img src="{{ $news[1]->list_image }}" class="news-image">
                                    @else
                                        <img src="{{ url('assets/front/images/Placeholder.png') }}" class="news-image">
                                    @endif
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <div>
                                        <h4 style="font-weight:normal;" class="underline">{{ $news[1]->title }}</h4>
                                    </div>
                                    <div style="text-align:justify;">{{ substr($news[1]->short_desc, 0, 500) }}</div>
                                    <div style="margin:30px 0"><a class="btn btn-outline-primary"
                                            href="{{ url('news/detail/' . $news[1]->id) }}" style=>READ MORE</a></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <p>&nbsp;</p>
                        <a href="{{ url('/news') }}" class="btn btn-outline-primary">More News</a>
                        <p>&nbsp;</p>
                    </div>
                </div>
            @endif

            @if (count($meetus) > 0)
                <div class="row" style="margin-top:20px; margin-bottom:50px;">
                    <div class="col-md-12" style="background-color: #fafafa; padding:10px 20px;">
                        <h2 style="text-align: center;">MEET US</h2>
                        <div class="row">
                            @foreach ($meetus as $val)
                                <div class="col-md-3 meetbox">
                                    @if ($val->image == '')
                                        {{ $val->address }}
                                    @else
                                        <a href="{{ $val->link }}" target="_blank"><img src="{{ $val->image }}"
                                                style="width:270px; height:180px;"></a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
