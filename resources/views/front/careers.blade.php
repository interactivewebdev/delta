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
                                        <small class="text-muted">Job Type: {{ $item->job_type }}</small>
                                    </div>
                                    <div class="card-body" style="height:225px !important;">
                                        <div class="row">
                                            <div class="col-6"><strong>Experience:</strong>: {{ $item->experience }}</div>
                                            <div class="col-6"><strong>No. of positions:</strong>: {{ $item->positions }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"><strong>Place:</strong>: {{ $item->place }}
                                            </div>
                                        </div>
                                        <p class="card-text"><strong>Functional Area:</strong><br>{!! substr($item->functional_area, 0, 250) !!}
                                        </p>
                                        <p class="card-text"><strong>Job Description:</strong><br>{!! substr($item->job_description, 0, 250) !!}
                                        </p>
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
