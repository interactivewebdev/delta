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
                    <h3>News</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> News</li>
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

                            <a href="<?php echo e(url('/admin/news')); ?>" class="mx-5 btn btn-primary btn-xs"
                                data-original-title="btn btn-danger btn-xs" title="">Back to News Listing</a>
                        </h5>
                    </div>
                    <form class="theme-form" method="POST" enctype="multipart/form-data"
                        action="<?php echo e(url('/admin/news/store')); ?>">
                        <input type="hidden" name="id" value="<?php echo e(isset($news) ? $news->id : ''); ?>">
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
                                <label class="col-sm-3 col-form-label">Category <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        <option value="">-- Select --</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                <?php echo e(isset($news) && $value->category_id == $news->category_id ? 'selected' : ''); ?>

                                                value="<?php echo e($value->category_id); ?>"><?php echo e($value->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Meta Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="metatitle" placeholder="Meta Title"
                                        value="<?php echo e(isset($news) ? $news->metatitle : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Meta Keyword <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="metakeyword" placeholder="Meta Keyword"
                                        value="<?php echo e(isset($news) ? $news->metakeyword : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Meta Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="metadesc"
                                        placeholder="Meta Description" value="<?php echo e(isset($news) ? $news->metadesc : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="title" placeholder="Title"
                                        value="<?php echo e(isset($news) ? $news->title : ''); ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Short Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="short_desc" placeholder="Short Description"><?php echo e(isset($news) ? $news->short_desc : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Description <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="7" name="description" placeholder="Description"><?php echo e(isset($news) ? $news->description : ''); ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">List Image <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="list_image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Banner Image <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Order <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="order_by" placeholder="Order"
                                        value="<?php echo e(isset($news) ? $news->order_by : ''); ?>">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/blog/news-add.blade.php ENDPATH**/ ?>