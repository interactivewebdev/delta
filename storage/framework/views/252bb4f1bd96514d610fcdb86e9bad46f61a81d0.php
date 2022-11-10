<?php
$slides = count($sliderInfo);
$num = 0;
?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php for($i=0; $i<$slides; $i++){?>
        <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo e($i); ?>"
            <?php echo e($i == 0 ? 'class="active"' : ''); ?>></li>
        <?php }?>
    </ol>
    <div class="carousel-inner">
        <?php $__currentLoopData = $sliderInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item  <?php echo e($num == 0 ? 'active' : ''); ?>">
                <img src="<?php echo e($slide->image); ?>" class="d-block w-100 slideshow" alt="...">
                <div class="carousel-caption d-none d-md-block"
                    style="text-align:left; left:5%; text-shadow: #000000 2px 2px 15px;bottom: 200px;font-family: verdana, arial;">
                    <h2><?php echo e($slide->title); ?></h2>
                    <?php if($slide->link != ''): ?>
                        <a href="<?php echo e($slide->link); ?>" class="btn btn-primary">Read more</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php $num++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH D:\Projects\dbc\resources\views/layouts/front-partial/slider.blade.php ENDPATH**/ ?>