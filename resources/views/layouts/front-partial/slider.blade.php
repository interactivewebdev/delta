<?php
$slides = count($sliderInfo);
$num = 0;
?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i=0; $i<$slides; $i++){?>
        <li data-target="#carouselExampleCaptions" data-slide-to="{{ $i }}"
            {{ $i == 0 ? 'class="active"' : '' }}></li>
        <?php }?>
    </ol>
    <div class="carousel-inner">
        @foreach ($sliderInfo as $slide)
            <div class="carousel-item  {{ $num == 0 ? 'active' : '' }}">
                <img src="{{ $slide->image }}" class="d-block w-100 slideshow" alt="...">
                <div class="carousel-caption d-none d-md-block"
                    style="text-align:left; left:5%; text-shadow: #000000 2px 2px 15px;bottom: 200px;font-family: verdana, arial;">
                    <h2>{!! $slide->title !!}</h2>
                    @if ($slide->link != '')
                        <a href="{{ $slide->link }}" class="btn btn-primary">Read more</a>
                    @endif
                </div>
            </div>
            <?php $num++; ?>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
