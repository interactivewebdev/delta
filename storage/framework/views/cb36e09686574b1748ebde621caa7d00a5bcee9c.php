<?php $__env->startSection('page-content'); ?>
    <div style="display:flex; align-items: center; justify-content:center; height:100%;">
        <img src="<?php echo e(url('assets/images/filenotfound.jpg')); ?>" width="200">
    </div>
    <div class="text-center">
        <h3>We couldn't find that file.</h3>
    </div>
    <div class="text-center mx-5 px-5">Look like we couldn't find that page. Please try again or contact with administrator
        if the problem persists.
    </div>
    <div class="text-center my-5 py-5">
        <a class="btn btn-info" href="<?php echo e(url('/')); ?>">Take me at Homepage</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/errors/file_404.blade.php ENDPATH**/ ?>