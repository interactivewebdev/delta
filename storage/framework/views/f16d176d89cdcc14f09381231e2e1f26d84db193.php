<?php $__env->startSection('custom-css'); ?>
    <style>
        h3 {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            color: #333;
        }

        .btn-send {
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            width: 80%;
            margin-left: 3px;
        }

        .help-block.with-errors {
            color: #ff5050;
            margin-top: 5px;

        }

        .card {
            margin-left: 10px;
            margin-right: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-content'); ?>
    <div class="product-banner-image">
        <figure>
            <img src="<?php echo e(url('assets/front/images/3.jpg')); ?>" width="100%">
        </figure>
    </div>
    <div class="container">
        <div class="product-heading">
            <h3>Forgot Password</h3>
            <nav>
                <ol class="product-breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li>Forgot Password</li>
                </ol>
            </nav>
        </div>
        <p>&nbsp;</p>
        <?php if(Session::has('error')): ?>
            <p><?php echo e(Session::get('error')); ?></p>
        <?php endif; ?>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-6">
                <div class="text-left mt-5">
                    <h3>Forgot your password?</h3>
                    Do not close this window! We will send you a code by email with which you can reset your password.<br>
                    Enter your username below, as chosen during registration.
                </div>

                <div class="row ">
                    <div class="col-lg-12 mx-auto">
                        <div class="card mt-2 mx-auto bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form id="login-form" role="form" method="POST"
                                        action="<?php echo e(url('distributor/forgot')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Username *</label>
                                                        <input type="text" name="username" class="form-control"
                                                            placeholder="Please enter your username *" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit"
                                                        class="btn btn-success btn-send  pt-2 btn-block
                                                        value="Login">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-5"><em>&raquo; <a
                                            href="<?php echo e(url('/distributor/register')); ?>">login/signup</a></em></div>
                            </div>
                        </div>
                        <!-- /.8 -->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\dbc\resources\views/front/forgot.blade.php ENDPATH**/ ?>