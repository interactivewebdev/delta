<?php $__env->startSection('page-content'); ?>
    <div class="content">
        <div class="container">
            <?php if(count($benefits) > 0): ?>
                <div class="benefits">
                    <h2 style="text-align:center; margin:50px 0; font-weight:normal;">Benefits with DeltaBioCare</h2>
                    <div class="row" style="margin:50px 0;">
                        <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 partition">
                                <div style="text-align:center; padding-bottom:10px;"><img src="<?php echo e($row->image); ?>"
                                        class="content-short-image"></div>
                                <div style="height:75px;">
                                    <h4 style="text-align:center; font-weight:normal;"><?php echo e($row->title); ?></h4>
                                </div>
                                <div style="text-align:center;"><?php echo e($row->short_desc); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row" style="margin:50px 0; background:#fafafa; padding:100px 20px;">
                <div class="col-md-3">
                    <h1 class="underline"><?php echo e($about->title); ?></h1>
                    <img src="<?php echo e($about->list_image); ?>" class="content-image">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-8" style="text-align:justify; line-height:30px;">
                    <?php echo e(nl2br(substr($about->short_desc, 0, 725))); ?>...
                    <div><a class="btn btn-xs btn-outline-primary" href="<?php echo e(url('/about')); ?>">READ MORE</a></div>
                </div>
            </div>
            <?php if(count($news) > 0): ?>
                <h2 style="text-align:center; margin-bottom:50px;">News</h2>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(count($news) >= 1): ?>
                            <div class="row" style="margin:50px 0;">
                                <div class="col-md-8">
                                    <div>
                                        <h4 style="font-weight:normal;" class="underline"><?php echo e($news[0]->title); ?></h4>
                                    </div>
                                    <div style="text-align:justify;"><?php echo e(substr($news[0]->short_desc, 0, 500)); ?></div>
                                    <div style="margin:30px 0"><a class="btn btn-outline-primary"
                                            href="<?php echo e(url('news/detail/' . $news[0]->id)); ?>" style=>READ MORE</a></div>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <?php if($news[0]->list_image != ''): ?>
                                        <img src="<?php echo e($news[0]->list_image); ?>" class="news-image">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('assets/front/images/Placeholder.png')); ?>" class="news-image">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(count($news) == 2): ?>
                            <div class="row" style="margin:50px 0;background-color: #fafafa; padding:50px 10px;">
                                <div class="col-md-3">
                                    <?php if($news[1]->list_image != ''): ?>
                                        <img src="<?php echo e($news[1]->list_image); ?>" class="news-image">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('assets/front/images/Placeholder.png')); ?>" class="news-image">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <div>
                                        <h4 style="font-weight:normal;" class="underline"><?php echo e($news[1]->title); ?></h4>
                                    </div>
                                    <div style="text-align:justify;"><?php echo e(substr($news[1]->short_desc, 0, 500)); ?></div>
                                    <div style="margin:30px 0"><a class="btn btn-outline-primary"
                                            href="<?php echo e(url('news/detail/' . $news[1]->id)); ?>" style=>READ MORE</a></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center;">
                        <p>&nbsp;</p>
                        <a href="<?php echo e(url('/news')); ?>" class="btn btn-outline-primary">More News</a>
                        <p>&nbsp;</p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(count($meetus) > 0): ?>
                <div class="row" style="margin-top:20px; margin-bottom:50px;">
                    <div class="col-md-12" style="background-color: #fafafa; padding:10px 20px;">
                        <h2 style="text-align: center;">MEET US</h2>
                        <div class="row">
                            <?php $__currentLoopData = $meetus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 meetbox">
                                    <?php if($val->image == ''): ?>
                                        <?php echo e($val->address); ?>

                                    <?php else: ?>
                                        <a href="<?php echo e($val->link); ?>" target="_blank"><img src="<?php echo e($val->image); ?>"
                                                style="width:270px; height:180px;"></a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/home.blade.php ENDPATH**/ ?>