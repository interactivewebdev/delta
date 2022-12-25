;

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        "use strict";
        (function($) {
            "use strict";
            $('#documents-list').DataTable();
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
                    <h3>Documents</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Documents</li>
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
                        <h5>Listing of documents
                            <a href="<?php echo e(url('/admin/document-form')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Add New Document</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <?php if(count($documents) > 0): ?>
                                <table class="display" id="documents-list">
                                    <thead>
                                        <tr>
                                            <th style="width:150px !important;">Name</th>
                                            <th>Category</th>
                                            <th style="width:100px !important;">Document</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-start"><?php echo e($value->document_name); ?></td>
                                                <td><?php echo e($value->category_name); ?></td>
                                                <td style="width:100px !important; text-align:center;"><a
                                                        href="<?php echo e($value->document); ?>" target="_blank"><i
                                                            class="fa-solid fa-file"></i></a>
                                                </td>
                                                <td><?php echo e($value->country_name); ?></td>
                                                <td class="font-success"><?php echo e($value->status ? 'Active' : 'Inactive'); ?></td>
                                                <td>
                                                    <?php if($value->status == 0): ?>
                                                        <a href="<?php echo e(url('/admin/document/active/' . $value->id)); ?>"
                                                            class="btn btn-success btn-xs edit-btn" type="button"
                                                            data-original-title="btn btn-success btn-xs"
                                                            title="">Active</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(url('/admin/document/deactive/' . $value->id)); ?>"
                                                            class="btn btn-info btn-xs edit-btn" type="button"
                                                            data-original-title="btn btn-info btn-xs"
                                                            title="">Deactive</a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(url('/admin/document/delete/' . $value->id)); ?>"
                                                        class="btn btn-danger btn-xs edit-btn" type="button"
                                                        data-original-title="btn btn-danger btn-xs"
                                                        title="">Delete</a>
                                                    <a href="<?php echo e(url('/admin/document/edit/' . $value->id)); ?>"
                                                        class="btn btn-primary btn-xs edit-btn" type="button"
                                                        data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                No documents found...
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/documents.blade.php ENDPATH**/ ?>