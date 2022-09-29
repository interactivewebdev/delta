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
                <div class="text-over-image">{{ $blog->title }}</div>
            </div>
        </div>
        <div style="clear:both;">&nbsp;</div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">{!! $blog->description !!}</div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Recent Blogs -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5">
                            <div class="card-header" style="background: #00997d !important;">Recent Posts</div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        @foreach ($recentPosts as $item)
                                            <tr>
                                                <td>
                                                    <div style="text-align:justify;">
                                                        <a href="{{ url('blog/detail/' . $item->id) }}"
                                                            class="text-capitalize">{{ $item->title }}</a>
                                                    </div>
                                                    <div><small>Posted on: {{ $item->created }}</small></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection
