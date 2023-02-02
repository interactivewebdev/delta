<?php $__env->startSection('page-content'); ?>
    <div id="blog">
        <h1 style="flex-basis:100%;">News</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">News</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="row blogs">
                    <?php if(count($news) > 0): ?>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h6 class="card-title"><a href="<?php echo e(url('news/detail/' . $item->id)); ?>"
                                                class="text-capitalize"><?php echo e(substr($item->title, 0, 36)); ?></a></h6>
                                        <small class="text-muted">Posted on: <?php echo e($item->created); ?></small>
                                    </div>
                                    <?php if($news[0]->list_image != ''): ?>
                                        <a href="<?php echo e(url('news/detail/' . $item->id)); ?>">
                                            <figure><img src="<?php echo e($item->list_image); ?>" class="card-img-top hoverEffect"
                                                    alt="<?php echo e($item->title); ?>"></figure>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('news/detail/' . $item->id)); ?>">
                                            <figure><img src="<?php echo e(url('assets/images/Placeholder.png')); ?>"
                                                    class="card-img-top hoverEffect" alt="<?php echo e($item->title); ?>"></figure>
                                        </a>
                                    <?php endif; ?>

                                    <div class="card-body">
                                        <p class="card-text"><?php echo substr($item->short_desc, 0, 250); ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-link"><a href="<?php echo e(url('news/detail/' . $item->id)); ?>"
                                                class="text-warning">READ MORE
                                                &raquo;</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        No news added yet...
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/news.blade.php ENDPATH**/ ?>