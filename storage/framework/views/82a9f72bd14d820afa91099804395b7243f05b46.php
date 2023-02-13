<?php $__env->startSection('page-content'); ?>
    <div class="content-banner-image">
        <figure>
            <img src="<?php echo e($content->image); ?>">
        </figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-over-image"><?php echo e($content->title); ?></div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;"><?php echo $content->short_desc; ?></div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align:justify;"><?php echo $content->description; ?></div>
                </div>
                <?php $x=1; ?>
                <?php $__currentLoopData = $page_sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="page-section <?php echo e($x % 2 != 0 ? 'section' : ''); ?>">
                        <?php if($section->image != ''): ?>
                            <div class="section-image"><img src="<?php echo e($section->image); ?>"></div>
                        <?php endif; ?>
                        <div class="section-title"><?php echo e($section->title); ?></div>
                        <div class="section-desc"><?php echo e($section->description); ?></div>
                    </div>
                    <?php $x++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/about.blade.php ENDPATH**/ ?>