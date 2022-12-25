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
                    <h3>Profile</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="<?php echo e(url('/')); ?>"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <main>
            <div class="py-5 text-center">
                <h2>Your Profile</h2>
                <p class="lead">You can check and edit profile. and It will be changed everywhere, after editing your
                    profile from next time you will get updated profile.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Profile Detail</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder=""
                                    value="<?php echo e(Session::get('name')); ?>" required="">
                                <div class="invalid-feedback">
                                    Valid name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        value="<?php echo e(Session::get('username')); ?>" required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="" value=""
                                    required="">
                                <div class="invalid-feedback">
                                    Your password is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    value="<?php echo e(Session::get('email')); ?>">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" required=""
                                    value="<?php echo e(Session::get('phone')); ?>">
                                <div class="invalid-feedback">
                                    Please enter your phone.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="company" class="form-label">Company </label>
                                <input type="text" class="form-control" id="company"
                                    value="<?php echo e(Session::get('company')); ?>" placeholder="Name of company">
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" required="">
                                    <option value="">Choose...</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id); ?>"
                                            <?php echo e($c->id == Session::get('country') ? 'selected' : ''); ?>>
                                            <?php echo e($c->name . ' (' . $c->iso_code_2 . ')'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to update</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/profile-edit.blade.php ENDPATH**/ ?>