;

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#product-list').DataTable();
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css-styles'); ?>
    <style>
        a.edit-btn {
            margin: 0px 2px;
            display: inline;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Products</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Products</li>
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
                        <h5>Listing of product documents
                            <a href="<?php echo e(url('/admin/product/upload/' . $product_id)); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Product Document</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="display" id="product-list">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Attachment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($value->title); ?></td>
                                            <td><?php echo e($value->main_title); ?></td>
                                            <td>
                                                <?php if($value->type == 'type 1'): ?>
                                                    How to use
                                                <?php elseif($value->type == 'type 2'): ?>
                                                    Ingredient
                                                <?php else: ?>
                                                    Other
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($value->attachment); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/admin/product/upload/delete/' . $value->id)); ?>"
                                                    class="edit-btn btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title=""><i
                                                        class="fa-solid fa-trash"></i></a>
                                                <a href="<?php echo e(url('/admin/product/upload/' . $value->id . '/edit/')); ?>"
                                                    class="edit-btn btn btn-primary btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title=""><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/attachments.blade.php ENDPATH**/ ?>