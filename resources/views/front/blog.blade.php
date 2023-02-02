@extends('layouts.front')
@section('page-content')
    <div id="blog">
        <h1 style="flex-basis:100%;">Blogs</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
            </ol>
        </nav>
    </div>
    <div class="container">

        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-9">
                <div class="row blogs">
                    @if (count($blogs) > 0)
                        @foreach ($blogs as $item)
                            <div class="col-md-6">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h6 class="card-title"><a href="{{ url('blog/detail/' . $item->id) }}"
                                                class="text-capitalize">{{ substr($item->title, 0, 40) }}</a></h6>
                                        <small class="text-muted">Posted on: {{ $item->created }}</small>
                                    </div>
                                    <a href="{{ url('blog/detail/' . $item->id) }}">
                                        <figure><img src="{{ $item->list_image }}" class="card-img-top hoverEffect"
                                                alt="{{ $item->title }}"></figure>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">{!! substr($item->short_desc, 0, 250) !!}</p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-link"><a href="{{ url('blog/detail/' . $item->id) }}"
                                                class="text-warning">READ MORE &raquo;</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No blogs added yet...
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <!-- Search Blog -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5" style="height:300px;">
                            <div class="card-body">
                                <form name="searchForm" method="post" action="{{ url('/blog/search') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Sort By Date</label>
                                        <select class="form-control" name="sort" id="exampleFormControlSelect1">
                                            <option value="latest">Latest</option>
                                            <option value="oldest">Oldest</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Sort By Keyword</label>
                                        <input type="text" name="keyword" class="form-control"
                                            placeholder="Search Keyword">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                    <div style="text-align:justify;"><a
                                                            href="{{ url('blog/detail/' . $item->id) }}"
                                                            class="text-capitalize">{{ $item->title }}</a></div>
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
