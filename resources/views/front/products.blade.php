@extends('layouts.front')
@section('page-content')
<div class="product-banner-image">
    <figure>
        @if($header_image == '')
            <img src="{{url('assets/front/images/3.jpg')}}" width="100%">
        @else
            <img src="{{$header_image}}" width="100%">
        @endif       
    </figure>
</div>
<div class="container">
    <div class="product-heading">
        <h3>{{$page_heading}}</h3>
        <nav>
            <ol class="product-breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                @if($parent_nav != '')
                <li>{{$parent_nav}}
                @endif
                @if($leaf_nav != '')
                <li>{{$leaf_nav}}
                @endif
            </ol>
        </nav>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-3 col-sm-12 page-head">{{$page_heading}}</div>
        <div class="col-md-9 col-sm-12 top-filter">
            <div class="form-row">
                <div class="col-md-{{12-((count($top_filters)*2)+2)}}">&nbsp;</div>
                @foreach($top_filters as $filter)
                    <div class="form-group col-md-2 col-sm-12 float-right">
                        <label for="top_filter_{{$filter['filter_id']}}">{{$filter['title']}}</label>
                        <select class="form-control top_filter" id="top_filter_{{$filter['filter_id']}}">
                            <option value="">--Select--</option>
                            @foreach($filter['attributes'] as $rec)
                                <option value="{{$rec->category_filter_id}}" {{(isset($_REQUEST['top_filter']) && $_REQUEST['top_filter'] == $rec->category_filter_id)?"selected":""}}>{{$rec->value}}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
                <div class="form-group col-md-2 col-sm-12 float-right">
                    <label for="alphabetical">Alphabetical</label>
                    <select class="form-control" id="alphabetical">
                    <option value="asc" @if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == "asc") selected @endif>A-Z</option>
                    <option value="desc" @if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == "desc") selected @endif>Z-A</option>
                    </select>
                </div>
            </div>                    
        </div>
    </div>
    @if(count($products) > 0)
    <div class="row">
        <div class="col-md-3 left-filter">
            <form method="post" name="product_filter" action="{{url('/product/search/'.$category_id)}}">
                @csrf
                <input type="hidden" name="category_id" value="{{$category_id}}">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @if(count($filters) > 0)
                        @foreach($filters as $obj)
                            <div class="panel panel-default side-filter">
                                <div class="panel-heading" role="tab" id="heading{{$obj['filter_id']}}">
                                    <div class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$obj['filter_id']}}" aria-expanded="true" aria-controls="collapse{{$obj['filter_id']}}">
                                        <i class="more-less fa fa-plus-square-o" aria-hidden="true"></i> {{$obj['title']}}
                                        </a>
                                    </div>
                                </div>
                                @php $flag = false;
                                foreach($obj['attributes'] as $rec) {
                                    if(in_array($rec->category_filter_id, $left_filters)) {
                                        $flag = true;
                                        break;
                                    }
                                }
                                @endphp
                                <div id="collapse{{$obj['filter_id']}}" class="panel-collapse collapse {{($flag)?'show':''}}" role="tabpanel" aria-labelledby="heading{{$obj['filter_id']}}">
                                    <div class="panel-body">
                                        @foreach($obj['attributes'] as $rec)
                                        <div class="form-group form-check">
                                            <input type="checkbox" value="{{$rec->category_filter_id}}" class="form-check-input" id="exampleCheck1" name="filter[]" {{(in_array($rec->category_filter_id, $left_filters))?"checked":""}}>
                                            <label class="form-check-label" for="exampleCheck1">{{ucfirst(strtolower($rec->value))}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No filters available.
                    @endif
                </div>
                @if(count($filters) > 0)
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </form>
        </div>
        <div class="col-md-9">
            <div class="row">
                @foreach($products as $item)
                    <div class="col-md-6 col-sm-12">
                        <div class="row list">
                            <div class="col-md-5 product-image">
                                <figure>
                                <a href="{{url('/product/detail/'.urlencode(str_replace(' ', '', $item->title)).'/'.$item->product_id)}}"><img src="{{$item->list_image}}"></a>
                                </figure>
                            </div>
                            <div class="col-md-7 product-detail">
                                <div>
                                    <h4><a href="{{url('/product/detail/'.urlencode(str_replace(' ', '', $item->title)).'/'.$item->product_id)}}">{{$item->title}}</a></h4>
                                    <p id="short{{$item->product_id}}">{{substr($item->short_desc,0,250)}}... <span><a href="javascript:void(0)" onclick="toggleDesc({{$item->product_id}})">read more</a></span></p>
                                    <p id="full{{$item->product_id}}" class="d-none">{{$item->short_desc}}<br><span><a href="javascript:void(0)" onclick="showLess({{$item->product_id}})">show less</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>    
    @else
        <p style="text-align:center;">
            There are no products found matching your criteria….
            <br><small>Please search with other search criteria</small>
        </p>
    @endif
    <p>&nbsp;</p>
</div>
@endsection

@section('custom-script')
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-plus-square-o fa-minus-square-o');
    }
    $('.panel').on('hidden.bs.collapse', toggleIcon);
    $('.panel').on('shown.bs.collapse', toggleIcon);
    $('#alphabetical').on('change', function(e) {
        var url = window.location.href.split('?');
        var baseUrl = url[0];
        var urlParams = new URLSearchParams(window.location.search);

        urlParams.set('sort', this.value);
        var qrystr = urlParams.toString();
        var link = baseUrl+'?'+qrystr;
        location.href = link;
    });
    $('.top_filter').on('change', function(e) {
        var url = window.location.href.split('?');
        var baseUrl = url[0];
        var urlParams = new URLSearchParams(window.location.search);

        urlParams.set('top_filter', this.value);
        var qrystr = urlParams.toString();
        var link = baseUrl+'?'+qrystr;
        location.href = link;
    });
    
    function toggleDesc(id){
        $('#short'+id).hide();
        $('#full'+id).removeClass('d-none');
    }
    
    function showLess(id){
        $('#short'+id).show();
        $('#full'+id).addClass('d-none');
    }
</script>
@endsection