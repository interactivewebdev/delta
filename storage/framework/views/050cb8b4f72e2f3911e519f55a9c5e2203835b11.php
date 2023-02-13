<?php $__env->startSection('page-content'); ?>
    <div class="content-banner-image">
        <figure>
            <img src="<?php echo e($blog->image); ?>">
        </figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-over-image"><?php echo e($blog->title); ?></div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;"><?php echo $blog->description; ?></div>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/news-detail.blade.php ENDPATH**/ ?>