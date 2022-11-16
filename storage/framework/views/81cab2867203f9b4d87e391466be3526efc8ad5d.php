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
                        <h5>Listing of products
                            <a href="<?php echo e(route('product-form')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Product</a>
                        </h5>
                        
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive product-table">
                            <table class="display" id="product-list">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><a href="javascript:void(0)"><img src="<?php echo e($value->image); ?>" width="100"
                                                        alt=""></a>
                                            </td>
                                            <td><?php echo e($value->title); ?></td>
                                            <td><?php echo e($value->category); ?></td>
                                            <td class="font-success"><?php echo e($value->status ? 'Active' : 'Inactive'); ?></td>
                                            <td><?php echo e($value->created_at); ?></td>
                                            <td>
                                                <?php if($value->status == 0): ?>
                                                    <a href="<?php echo e(url('/product/active/' . $value->product_id)); ?>"
                                                        class="btn btn-success btn-xs" type="button"
                                                        data-original-title="btn btn-success btn-xs"
                                                        title="">Active</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('/product/deactive/' . $value->product_id)); ?>"
                                                        class="btn btn-info btn-xs" type="button"
                                                        data-original-title="btn btn-info btn-xs"
                                                        title="">Deactive</a>
                                                <?php endif; ?>
                                                <a href="<?php echo e(url('/product/delete/' . $value->product_id)); ?>"
                                                    class="btn btn-danger btn-xs" type="button"
                                                    data-original-title="btn btn-danger btn-xs" title="">Delete</a>
                                                <a href="<?php echo e(url('/product/edit/' . $value->product_id)); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/products.blade.php ENDPATH**/ ?>