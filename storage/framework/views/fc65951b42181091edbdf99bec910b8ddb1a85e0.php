;

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#list').DataTable();
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css-styles'); ?>
    <style>
        a.edit-btn {
            margin: 5px;
            display: block;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Careers</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Careers</li>
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
                        <h5>Listing of Careers
                            <a href="<?php echo e(url('/admin/career-form')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Career</a>
                        </h5>
                        
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="display" id="list">
                                <thead>
                                    <tr>
                                        <th style="width:20%;">Title</th>
                                        <th>Positions</th>
                                        <th>Place</th>
                                        <th>Job Type</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->title); ?></td>
                                            <td><?php echo e($value->positions); ?></td>
                                            <td><?php echo e($value->place); ?></td>
                                            <td><?php echo e($value->job_type); ?></td>
                                            <td><?php echo e($value->experience); ?></td>
                                            <td><?php echo $value->status ? '<span class="font-success">Active</span>' : '<span class="font-danger">Inactive</span>'; ?>

                                            </td>
                                            <td>
                                                <?php if($value->status == 0): ?>
                                                    <a href="<?php echo e(url('/admin/career/active/' . $value->id)); ?>"
                                                        class="btn btn-success btn-xs edit-btn"
                                                        data-original-title="btn btn-success btn-xs"
                                                        title="">Active</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('/admin/career/deactive/' . $value->id)); ?>"
                                                        class="btn btn-info btn-xs edit-btn"
                                                        data-original-title="btn btn-info btn-xs"
                                                        title="">Deactive</a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('/admin/career/delete/' . $value->id)); ?>"
                                                    class="btn btn-danger btn-xs edit-btn"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</a>
                                                <a href="<?php echo e(url('/admin/career/edit/' . $value->id)); ?>"
                                                    class="btn btn-primary btn-xs edit-btn"
                                                    data-original-title="btn btn-danger btn-xs" title="">Edit</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/career/list.blade.php ENDPATH**/ ?>