<?php $__env->startSection('page-content'); ?>
    <div id="blog">
        <h1 style="flex-basis:100%;">Careers</h1>
        <nav aria-label="breadcrumb" style="margin-top:-90px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Careers</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="row blogs">
                    <?php if(count($careers) > 0): ?>
                        <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h6 class="card-title"><a href="<?php echo e(url('careers/detail/' . $item->id)); ?>"
                                                class="text-capitalize"><?php echo e(substr($item->title, 0, 36)); ?></a></h6>
                                        <small class="text-muted">Job Type: <?php echo e($item->job_type); ?></small>
                                    </div>
                                    <div class="card-body" style="height:225px !important;">
                                        <div class="row">
                                            <div class="col-6"><strong>Experience:</strong>: <?php echo e($item->experience); ?></div>
                                            <div class="col-6"><strong>No. of positions:</strong>: <?php echo e($item->positions); ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12"><strong>Place:</strong>: <?php echo e($item->place); ?>

                                            </div>
                                        </div>
                                        <p class="card-text"><strong>Functional Area:</strong><br><?php echo substr($item->functional_area, 0, 250); ?>

                                        </p>
                                        <p class="card-text"><strong>Job Description:</strong><br><?php echo substr($item->job_description, 0, 250); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        No careers posted yet...
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/careers.blade.php ENDPATH**/ ?>