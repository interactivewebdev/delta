;

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#category-list').DataTable();
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Career</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Career</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid list-products">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e($title); ?>

                            <a href="<?php echo e(url('/admin/careers')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Back to Career Listing</a>
                        </h5>
                    </div>
                    <form class="theme-form" method="POST" enctype="multipart/form-data"
                        action="<?php echo e(url('/admin/career/store')); ?>">
                        <input type="hidden" name="id" value="<?php echo e(isset($career) ? $career->id : ''); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Job Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="title" placeholder="Title"
                                        value="<?php echo e(isset($career) ? $career->title : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Name of Positions <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="positions" placeholder="Positions"
                                        value="<?php echo e(isset($career) ? $career->positions : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Place <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="place" placeholder="Place"
                                        value="<?php echo e(isset($career) ? $career->place : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Job Type <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="job_type" placeholder="Job Type"
                                        value="<?php echo e(isset($career) ? $career->job_type : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Experience <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="experience" placeholder="Experience"
                                        value="<?php echo e(isset($career) ? $career->experience : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Functional Area <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="functional_area" placeholder="Functional Area"><?php echo e(isset($career) ? $career->functional_area : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Job Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="job_description" placeholder="Job Description"><?php echo e(isset($career) ? $career->job_description : ''); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/career/add.blade.php ENDPATH**/ ?>