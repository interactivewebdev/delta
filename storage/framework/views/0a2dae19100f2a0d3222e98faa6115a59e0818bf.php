<?php $__env->startSection('page-content'); ?>
<div class="product-banner-image">
    <figure>
        <?php if($header_image == ''): ?>
            <img src="<?php echo e(url('assets/front/images/3.jpg')); ?>" width="100%">
        <?php else: ?>
            <img src="<?php echo e($header_image); ?>" width="100%">
        <?php endif; ?>       
    </figure>
</div>
<div class="container">
    <div class="product-heading">
        <h3><?php echo e($page_heading); ?></h3>
        <nav>
            <ol class="product-breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <?php if($parent_nav != ''): ?>
                <li><?php echo e($parent_nav); ?>

                <?php endif; ?>
                <?php if($leaf_nav != ''): ?>
                <li><?php echo e($leaf_nav); ?>

                <?php endif; ?>
            </ol>
        </nav>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-3 col-sm-12 page-head"><?php echo e($page_heading); ?></div>
        <div class="col-md-9 col-sm-12 top-filter">
            <div class="form-row">
                <div class="col-md-<?php echo e(12-((count($top_filters)*2)+2)); ?>">&nbsp;</div>
                <?php $__currentLoopData = $top_filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group col-md-2 col-sm-12 float-right">
                        <label for="top_filter_<?php echo e($filter['filter_id']); ?>"><?php echo e($filter['title']); ?></label>
                        <select class="form-control top_filter" id="top_filter_<?php echo e($filter['filter_id']); ?>">
                            <option value="">--Select--</option>
                            <?php $__currentLoopData = $filter['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($rec->category_filter_id); ?>" <?php echo e((isset($_REQUEST['top_filter']) && $_REQUEST['top_filter'] == $rec->category_filter_id)?"selected":""); ?>><?php echo e($rec->value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group col-md-2 col-sm-12 float-right">
                    <label for="alphabetical">Alphabetical</label>
                    <select class="form-control" id="alphabetical">
                    <option value="asc" <?php if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == "asc"): ?> selected <?php endif; ?>>A-Z</option>
                    <option value="desc" <?php if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == "desc"): ?> selected <?php endif; ?>>Z-A</option>
                    </select>
                </div>
            </div>                    
        </div>
    </div>
    <?php if(count($products) > 0): ?>
    <div class="row">
        <div class="col-md-3 left-filter">
            <form method="post" name="product_filter" action="<?php echo e(url('/product/search/'.$category_id)); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="category_id" value="<?php echo e($category_id); ?>">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php if(count($filters) > 0): ?>
                        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="panel panel-default side-filter">
                                <div class="panel-heading" role="tab" id="heading<?php echo e($obj['filter_id']); ?>">
                                    <div class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($obj['filter_id']); ?>" aria-expanded="true" aria-controls="collapse<?php echo e($obj['filter_id']); ?>">
                                        <i class="more-less fa fa-plus-square-o" aria-hidden="true"></i> <?php echo e($obj['title']); ?>

                                        </a>
                                    </div>
                                </div>
                                <?php $flag = false;
                                foreach($obj['attributes'] as $rec) {
                                    if(in_array($rec->category_filter_id, $left_filters)) {
                                        $flag = true;
                                        break;
                                    }
                                }
                                ?>
                                <div id="collapse<?php echo e($obj['filter_id']); ?>" class="panel-collapse collapse <?php echo e(($flag)?'show':''); ?>" role="tabpanel" aria-labelledby="heading<?php echo e($obj['filter_id']); ?>">
                                    <div class="panel-body">
                                        <?php $__currentLoopData = $obj['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group form-check">
                                            <input type="checkbox" value="<?php echo e($rec->category_filter_id); ?>" class="form-check-input" id="exampleCheck1" name="filter[]" <?php echo e((in_array($rec->category_filter_id, $left_filters))?"checked":""); ?>>
                                            <label class="form-check-label" for="exampleCheck1"><?php echo e(ucfirst(strtolower($rec->value))); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        No filters available.
                    <?php endif; ?>
                </div>
                <?php if(count($filters) > 0): ?>
                    <button type="submit" class="btn btn-primary">Submit</button>
                <?php endif; ?>
            </form>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="row list">
                            <div class="col-md-5 product-image">
                                <figure>
                                <a href="<?php echo e(url('/product/detail/'.urlencode(str_replace(' ', '', $item->title)).'/'.$item->product_id)); ?>"><img src="<?php echo e($item->list_image); ?>"></a>
                                </figure>
                            </div>
                            <div class="col-md-7 product-detail">
                                <div>
                                    <h4><a href="<?php echo e(url('/product/detail/'.urlencode(str_replace(' ', '', $item->title)).'/'.$item->product_id)); ?>"><?php echo e($item->title); ?></a></h4>
                                    <p id="short<?php echo e($item->product_id); ?>"><?php echo e(substr($item->short_desc,0,250)); ?>... <span><a href="javascript:void(0)" onclick="toggleDesc(<?php echo e($item->product_id); ?>)">read more</a></span></p>
                                    <p id="full<?php echo e($item->product_id); ?>" class="d-none"><?php echo e($item->short_desc); ?><br><span><a href="javascript:void(0)" onclick="showLess(<?php echo e($item->product_id); ?>)">show less</a></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>    
    <?php else: ?>
        <p style="text-align:center;">
            There are no products found matching your criteria….
            <br><small>Please search with other search criteria</small>
        </p>
    <?php endif; ?>
    <p>&nbsp;</p>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-plus-square-o fa-minus-square-o');
    }
    $('.panel').on('hidden.bs.collapse', toggleIcon);
    $('.panel').on('shown.bs.collapse', toggleIcon);
    $('#alphabetical').on('change', function(e) {
        var url = window.location.href.split('?');
        var baseUrl = url[0];
        var urlParams = new URLSearchParams(window.location.search);

        urlParams.set('sort', this.value);
        var qrystr = urlParams.toString();
        var link = baseUrl+'?'+qrystr;
        location.href = link;
    });
    $('.top_filter').on('change', function(e) {
        var url = window.location.href.split('?');
        var baseUrl = url[0];
        var urlParams = new URLSearchParams(window.location.search);

        urlParams.set('top_filter', this.value);
        var qrystr = urlParams.toString();
        var link = baseUrl+'?'+qrystr;
        location.href = link;
    });
    
    function toggleDesc(id){
        $('#short'+id).hide();
        $('#full'+id).removeClass('d-none');
    }
    
    function showLess(id){
        $('#short'+id).show();
        $('#full'+id).addClass('d-none');
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/products.blade.php ENDPATH**/ ?>