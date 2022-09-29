@extends('layouts.front')
@section('page-content')
    <div class="container faq">
        <p>&nbsp;</p>
        <h4 style="flex-basis:100%;">Frequently Asked Questions</h4>
        <p>&nbsp;</p>
        <div class="accordion" id="accordionExample">
            @if (count($categories) > 0)
                @foreach ($categories as $item)
                    <div class="card">
                        <div class="card-header" style="background-color:#859ea5 !important;" onclick="checkExpansion(this)"
                            id="heading{{ $item->id }}">
                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{ $item->id }}"
                                aria-expanded="false" aria-controls="collapse{{ $item->id }}">
                                <div class="icon-outer collap">+</div>
                                <div class="icon-outer expan d-none">-</div>
                                {{ $item->title }}
                                </h2>
                        </div>
                        <div id="collapse{{ $item->id }}" class="collapse" aria-labelledby="heading{{ $item->id }}"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @if (count($item->faqs) > 0)
                                    @foreach ($item->faqs as $row)
                                        <div class="row">
                                            <div class="col-md-12" style="margin-bottom:20px;">
                                                <div class="font-weight-bold">{{ $row->title }}</div>
                                                <p class="align-justify">{{ $row->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    No question & answers added yet...
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                No faq added yet...
            @endif
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@endsection

@section('custom-script')
    <script>
        function checkExpansion(obj) {
            console.log($(obj).prop('id'));
            if ($('#' + $(obj).prop('id') + ' .expan').hasClass('d-none')) {
                $('.collap').removeClass('d-none');
                $('.expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .collap').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .expan').removeClass('d-none');
            } else {
                $('.collap').removeClass('d-none');
                $('.expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .collap').removeClass('d-none');

            }
        }
    </script>
@endsection
