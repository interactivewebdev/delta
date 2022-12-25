<?php $__env->startSection('page-content'); ?>
    <div class="container faq">
        <p>&nbsp;</p>
        <h4 style="flex-basis:100%;">Frequently Asked Questions</h4>
        <p>&nbsp;</p>
        <div class="accordion" id="accordionExample">
            <?php if(count($categories) > 0): ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header" style="background-color:#859ea5 !important;" onclick="checkExpansion(this)"
                            id="heading<?php echo e($item->id); ?>">
                            <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse<?php echo e($item->id); ?>"
                                aria-expanded="false" aria-controls="collapse<?php echo e($item->id); ?>">
                                <div class="icon-outer collap">+</div>
                                <div class="icon-outer expan d-none">-</div>
                                <?php echo e($item->title); ?>

                                </h2>
                        </div>
                        <div id="collapse<?php echo e($item->id); ?>" class="collapse" aria-labelledby="heading<?php echo e($item->id); ?>"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <?php if(count($item->faqs) > 0): ?>
                                    <?php $__currentLoopData = $item->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12" style="margin-bottom:20px;">
                                                <div class="font-weight-bold"><?php echo e($row->title); ?></div>
                                                <p class="align-justify"><?php echo e($row->description); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    No question & answers added yet...
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                No faq added yet...
            <?php endif; ?>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
    <script>
        function checkExpansion(obj) {
            console.log($(obj).prop('id'));
            if ($('#' + $(obj).prop('id') + ' .expan').hasClass('d-none')) {
                $('.collap').removeClass('d-none');
                $('.expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .collap').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .expan').removeClass('d-none');
            } else {
                $('.collap').removeClass('d-none');
                $('.expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .expan').addClass('d-none');
                $('#' + $(obj).prop('id') + ' .collap').removeClass('d-none');

            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/faq.blade.php ENDPATH**/ ?>