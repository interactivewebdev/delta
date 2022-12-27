;
<?php $__env->startSection('custom-css-tags'); ?>
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script-tags'); ?>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Upload Product Attachment</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Upload Product Attachment</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Upload file in Distributor Zone</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" enctype="multipart/form-data"
                        action="<?php echo e(url('/admin/product/uploadfile')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($product_id); ?>">
                        <input type="hidden" name="product_id" value="<?php echo e($product_id); ?>">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select type</label>
                                <select class="form-control form-select" name="type">
                                    <option value="">-- Select --</option>
                                    <option value="type 1"
                                        <?php echo e(isset($attachment) && $attachment->type == 'type 1' ? 'selected' : ''); ?>>
                                        How to use</option>
                                    <option value="type 2"
                                        <?php echo e(isset($attachment) && $attachment->type == 'type 2' ? 'selected' : ''); ?>>
                                        Ingredient</option>
                                    <option value="type 3"
                                        <?php echo e(isset($attachment) && $attachment->type == 'type 3' ? 'selected' : ''); ?>>Other
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label>Select existing main tite</label>
                                <select class="form-control form-select" name="main_title1">
                                    <option value="">-- Select --</option>
                                    <?php foreach($titles as $obj){?>
                                    <option value="<?php echo e($obj->main_title); ?>"><?php echo e($obj->main_title); ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label>Main Title</label>
                                <input type="text" class="form-control" value="<?php echo e($attachment->main_title); ?>"
                                    name="main_title" placeholder="Enter title">
                            </div>
                            <div class="form-group mt-4">
                                <label>Attachment Title</label>
                                <input type="text" class="form-control" name="title"
                                    placeholder="Enter attachment title" value="<?php echo e($attachment->title); ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label>Attachment Link</label>
                                <input type="text" class="form-control" name="link"
                                    placeholder="Enter attachment link" value="<?php echo e($attachment->link); ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label>Upload Document/HTML File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="attachment" id="attachment">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="progress d-none">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 110%"></div>
                                </div>
                                <div id="selectedFile" class="text-black"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-css-styles'); ?>
    <style>
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)
        }

        .btn-secondary:focus {
            box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
        }

        .close:focus {
            box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
        }

        .mt-200 {
            margin-top: 200px
        }

        .toolbar {
            display: block !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-js-script'); ?>
    <script>
        $(document).ready(function() {
            $('#attachment').on('click', function(e) {
                $('.progress').removeClass('d-none');
            });
            $('#attachment').on('change', function(e) {
                var path = e.target.value.split('\\');
                $('.progress').addClass('d-none');
                $('#selectedFile').html(path[path.length - 1]);
            });

            $('#HTMLattachment').on('click', function(e) {
                $('#HTMLprogress').removeClass('d-none');
            });
            $('#HTMLattachment').on('change', function(e) {
                var path = e.target.value.split('\\');
                $('#HTMLprogress').addClass('d-none');
                $('#HTMLselectedFile').html(path[path.length - 1]);
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/upload-document.blade.php ENDPATH**/ ?>