@extends('layouts.front')
@section('page-content')
    <div class="content-banner-image">
        <figure>
            <img src="{{ $content->image }}">
        </figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-over-image">{{ $content->title }}</div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;">{!! $content->short_desc !!}</div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;">{!! $content->description !!}</div>
                </div>
                @php $x=1; @endphp
                @foreach ($page_sections as $section)
                    <div class="page-section {{ $x % 2 != 0 ? 'section' : '' }}">
                        @if ($section->image != '')
                            <div class="section-image"><img src="{{ $section->image }}"></div>
                        @endif
                        <div class="section-title">{{ $section->title }}</div>
                        <div class="section-desc">{{ $section->description }}</div>
                    </div>
                    @php $x++; @endphp
                @endforeach
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
