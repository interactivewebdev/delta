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
                    <h3>Categories</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Categories</li>
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
                        <h5>Listing of categories
                            <a href="<?php echo e(route('category-form')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Category</a>
                        </h5>
                        
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive product-table">
                            <table class="display" id="category-list">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Parent</th>
                                        <th>Order</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><a href="javascript:void(0)"><img src="<?php echo e($value->image); ?>" width="100"
                                                        alt=""></a>
                                            </td>
                                            <td><?php echo e($value->title); ?></td>
                                            <td><?php echo e($value->parent); ?></td>
                                            <td><?php echo e($value->level); ?></td>
                                            <td class="font-success"><?php echo e($value->status ? 'Active' : 'Inactive'); ?></td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td>
                                                <?php if($value->status == 0): ?>
                                                    <a href="<?php echo e(url('/category/active/' . $value->category_id)); ?>"
                                                        class="btn btn-success btn-xs" type="button"
                                                        data-original-title="btn btn-success btn-xs"
                                                        title="">Active</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('/category/deactive/' . $value->category_id)); ?>"
                                                        class="btn btn-info btn-xs" type="button"
                                                        data-original-title="btn btn-info btn-xs"
                                                        title="">Deactive</a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('/category/delete/' . $value->category_id)); ?>"
                                                    class="btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</a>
                                                <a href="<?php echo e(url('/category/edit/' . $value->category_id)); ?>"
                                                    class="btn btn-primary btn-xs" type="button"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/categories.blade.php ENDPATH**/ ?>