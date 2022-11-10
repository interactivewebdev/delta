<body>
    <!--header-->
    <div class="header">
        <div>
            <div class="px-2">
                <div class="text-right"><a href='<?php echo e(url('/user/register')); ?>'
                        class='btn btn-primary pills-btn btn-xs'>Login | Signup</a></div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-none d-md-block" href="<?php echo e(url('/')); ?>"><img
                        srcset="<?php echo e(url('assets/front/images/Deltabiocare_logo.svg')); ?>" width="200"
                        alt="Delta Bio Care"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img
                            srcset="<?php echo e(url('assets/front/images/Deltabiocare_logo.svg')); ?>" alt="Delta Bio Care"
                            style="width:130px; margin-top:45px;"></a>
                </button>

                <div class="d-md-none d-sm-none d-lg-none" style="position: absolute; right: 10px;">
                    <!-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
                    <a href="https://twitter.com/DeltaBioCare" target="_blank"><i class="fa fa-twitter"
                            aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="https://www.linkedin.com/company/delta-bio-care/" target="_blank"><i class="fa fa-linkedin"
                            aria-hidden="true"></i></a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto top-nav">
                        <!-- <li class="nav-item active">
       <a class="nav-link" href="<?php //echo base_url('/');
       ?>"><i class="fa fa-home" aria-hidden="true" style="font-size:20px;"></i> <span class="sr-only">(current)</span></a>
      </li> -->
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item <?php echo e(count($item->subcategories) > 0 ? 'dropdown' : ''); ?>">
                                <?php if(count($item->subcategories) > 0): ?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><?php echo e($item->title); ?>

                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php $__currentLoopData = $item->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(count($row->subcategories) > 0): ?>
                                                <li><a class="dropdown-item" href="#"> <?php echo e($row->title); ?>

                                                        &raquo</a>
                                                    <ul class="submenu dropdown-menu">
                                                        <?php $__currentLoopData = $row->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a class="dropdown-item"
                                                                    href="<?php echo e(url('/product/list/' . $sub->category_id)); ?>"><?php echo e($sub->title); ?></a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a class="dropdown-item"
                                                        href="<?php echo e(url('/product/list/' . $row->category_id)); ?>"><?php echo e($row->title); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <a class="nav-link"
                                        href="<?php echo e(url('/product/list/' . $item->category_id)); ?>"><?php echo e($item->title); ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(url('/news')); ?>">News</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(url('/careers')); ?>">Careers</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(url('/faq')); ?>">FAQ</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="nav-link">
                            <div class="top-header d-none d-sm-block">
                                <!-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
                                <a href="https://twitter.com/DeltaBioCare" target="_blank"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/company/delta-bio-care/" target="_blank"><i
                                        class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
     <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form> -->
                </div>
            </nav>
        </div>
    </div>
<?php /**PATH D:\Projects\dbc\resources\views/layouts/front-partial/header.blade.php ENDPATH**/ ?>