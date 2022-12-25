<?php $__env->startSection('page-content'); ?>
    <div class="content-banner-image">
        <figure>
            <img src="<?php echo e($blog->image); ?>">
        </figure>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-over-image"><?php echo e($blog->title); ?></div>
            </div>
        </div>
        <div style="clear:both;">&nbsp;</div>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12"><?php echo $blog->description; ?></div>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Recent Blogs -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-5">
                            <div class="card-header" style="background: #00997d !important;">Recent Posts</div>
                            <div class="card-body">
                                <table class="table table-hover table-borderless">
                                    <tbody>
                                        <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <div style="text-align:justify;">
                                                        <a href="<?php echo e(url('blog/detail/' . $item->id)); ?>"
                                                            class="text-capitalize"><?php echo e($item->title); ?></a>
                                                    </div>
                                                    <div><small>Posted on: <?php echo e($item->created); ?></small></div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/blog-detail.blade.php ENDPATH**/ ?>