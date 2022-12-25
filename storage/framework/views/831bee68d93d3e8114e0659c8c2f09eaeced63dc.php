
<?php $__env->startSection('custom-script'); ?>
    <script>
        $(document).ready(function() {
            $('#upd').click(function() {
                $('#subcategory').removeClass('d-none');
                $('#upd').addClass('d-none');
                $('#upa').removeClass('d-none');
            });

            $('#upa').click(function() {
                $('#subcategory').addClass('d-none');
                $('#upa').addClass('d-none');
                $('#upd').removeClass('d-none');
            });

            $('#supd').click(function() {
                $('#subsubcategory').removeClass('d-none');
                $('#supd').addClass('d-none');
                $('#supa').removeClass('d-none');
            });

            $('#supa').click(function() {
                $('#subsubcategory').addClass('d-none');
                $('#supa').addClass('d-none');
                $('#supd').removeClass('d-none');
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-content'); ?>
    <div class="content-banner-image">
        <figure>
            <img src="<?php echo e(url('../assets/front/images/b3.jpg')); ?>">
        </figure>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-4">
                <h4>Categories</h4>
                <div class="bg-secondary">
                    <ul class="list-group">
                        <?php if(count($categories) > 0): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-6"><?php echo e($cat['title']); ?></div>
                                        <div class="col-6" style="text-align: end !important;">
                                            <span id="upa" class="d-none">&#11165;</span>
                                            <span id="upd">&#11167;</span>
                                        </div>
                                    </div>
                                </li>
                                <?php if(count($cat['categories']) > 0): ?>
                                    <li id="subcategory" class="list-group-item d-none">
                                        <ul>
                                            <?php $__currentLoopData = $cat['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-6"><?php echo e($scat['title']); ?></div>
                                                        <div class="col-6" style="text-align: end !important;">
                                                            <span id="supa" class="d-none">&#11165;</span>
                                                            <span id="supd">&#11167;</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php if(count($scat['categories']) > 0): ?>
                                                    <li id="subsubcategory" class="list-group-item d-none">
                                                        <ul>
                                                            <?php $__currentLoopData = $scat['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sscat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="list-group-item"><?php echo e($sscat['title']); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!--/col-3-->
            <div class="col-sm-8">
                <section class="text-center container">
                    <div class="row py-lg-5">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <h1 class="fw-light text-primary"><?php echo e($distributor->name); ?></h1>
                            <h3 class="lead text-muted"><?php echo e($country->name); ?></h3>
                            <h3 class="lead text-muted"><?php echo e($distributor->company); ?></h3>
                            <div class="row">
                                <div class="col-6">Email: <?php echo e($distributor->email); ?></div>
                                <div class="col-6">Phone: <?php echo e($distributor->phone); ?></div>
                            </div>
                        </div>
                    </div>
                </section>
                <hr>

                <div class="album py-1 bg-light">
                    <div class="container">
                        <h3>Documents</h3>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php if(count($documents) > 0): ?>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-header text-center"><img
                                                    src="<?php echo e(url('assets/images/icons8-bookmark-documents-64.png')); ?>"
                                                    width="128" /></div>
                                            <div class="card-body">
                                                <h5><?php echo e($doc->document_name); ?></h5>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <a href="<?php echo e($doc->document); ?>" target="_blank"
                                                            class="btn btn-sm btn-outline-secondary">Download</a>
                                                    </div>
                                                    <small class="text-muted">Valid:
                                                        <?php echo e(date('d-m-Y', strtotime($doc->valid_upto))); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/col-9-->
    </div>
    <!--/row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/distributor_profile.blade.php ENDPATH**/ ?>