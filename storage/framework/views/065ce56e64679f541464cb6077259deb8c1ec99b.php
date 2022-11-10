;

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#doc_users_list').DataTable();
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Document Users</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Document Users</li>
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
                        <h5>Listing of document users
                            <a href="<?php echo e(url('admin/doc_user-form')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Document User</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive product-table">
                            <?php if(count($users) > 0): ?>
                                <table class="display" id="doc_users_list">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-start"><?php echo e($value->name); ?></td>
                                                <td class="text-start"><?php echo e($value->email); ?></td>
                                                <td><?php echo e($value->phone); ?></td>
                                                <td class="font-success"><?php echo e($value->status ? 'Active' : 'Inactive'); ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('/admin/doc_user/edit/' . $value->id)); ?>"
                                                        class="btn btn-primary btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                                    <a href="<?php echo e(url('/admin/doc_user/delete/' . $value->id)); ?>"
                                                        class="btn btn-danger btn-xs" type="button"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</a>
                                                    <?php if($value->status == 0): ?>
                                                        <a href="<?php echo e(url('/admin/doc_user/active/' . $value->id)); ?>"
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Active</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(url('/admin/doc_user/deactive/' . $value->id)); ?>"
                                                            class="btn btn-info btn-xs" type="button"
                                                            data-original-title="btn btn-info btn-xs"
                                                            title="">Deactive</a>
                                                    <?php endif; ?>


                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                No document users found...
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/document/users.blade.php ENDPATH**/ ?>