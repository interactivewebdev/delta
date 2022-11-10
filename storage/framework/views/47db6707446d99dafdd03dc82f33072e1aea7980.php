<div class="footer">
    <div class="container">
        <div class="footer-top-at">
            <div class="row">
                <div class="col-md-4 amet-sed">
                    <h4>MORE INFO</h4>
                    <ul class="nav-bottom">
                        <li><a href="<?php echo e(url('/blog')); ?>">Blogs</a></li>
                        <li><a href="<?php echo e(url('/news')); ?>">News</a></li>
                        <li><a href="<?php echo e(url('/faq')); ?>">FAQ</a></li>
                        <li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>
                    </ul>
                    <ul class="social">
                        <!-- <li><a href="#"><i> </i></a></li>						 -->
                        <li><a href="https://twitter.com/DeltaBioCare" target="_blank"><i class="twitter"> </i></a></li>
                        <li><a href="https://www.linkedin.com/in/delta-bio-care-51574a1a9/" target="_blank"><i
                                    class="gmail"> </i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 amet-sed ">
                    <h4>Subscribe</h4>
                    
                    <div>
                        <form id="pagenewsletter">
                            <div class="text-danger d-none" id="pagenewsletter_msg"></div>
                            <div class="form-row text-white">Subscribe to get our daily newsletter.</div>
                            <div class="form-row">
                                <input type="text" class="form-control" name="name" placeholder="Full name"
                                    value="" style="height: 25px; width: 250px;">
                            </div>
                            <div class="form-row">
                                <input type="email" class="form-control" name="email" placeholder="Email Address"
                                    value="" style="height: 25px; width: 250px;">
                            </div>
                            <div class="form-row">
                                <button type="button" class="btn btn-sm btn-primary"
                                    onclick="pageSubscribe()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 amet-sed">
                    <h4>About Us</h4>
                    <p><?php echo e(substr($aboutus->short_desc, 0, 350)); ?>...<a href="<?php echo e(url('about')); ?>"
                            class="text-white font-italic">read more</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-class">
        <p><strong>Copyright &copy; 2020-<?php echo e(date('Y')); ?>.</strong> DeltaBioCare All rights reserved.</p>
    </div>
</div>

<!-- Newsletter Subscription -->
<!-- register -->
<div class="modal fade" id="newslettersection" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top:100px;">
        <div class="modal-content" style="position:relative;">
            <div id="close-btn" onclick="noSubscribe()"><i class="fa fa-times-circle"></i></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12"><img src="<?php echo e(url('/assets/front/images/newsletter.jpg')); ?>"
                            class="newsletter-img"></div>
                    <div class="col-md-6 col-sm-12">
                        <form id="newsletter">
                            <?php echo csrf_field(); ?>
                            <div class="alert alert-danger d-none" id="newsletter_msg"></div>
                            <div class="form-row">Subscribe to get our daily newsletter.</div>
                            <div class="form-row">
                                <input type="text" class="form-control" name="name" placeholder="Full name"
                                    value="">
                            </div>
                            <div class="form-row">
                                <input type="email" class="form-control" name="email" placeholder="Email Address"
                                    value="">
                            </div>
                            <div class="form-row">
                                <!-- <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
      &nbsp;&nbsp; -->
                                <button type="button" class="btn btn-sm btn-primary"
                                    onclick="subscribe()">Submit</button>
                            </div>
                            <div class="form-row" style="font-size:10px; font-style:italic;">You will receive daily
                                updates in your inbox. Don't worry, we won't spam!</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of subscription -->
<?php /**PATH D:\Projects\dbc\resources\views/layouts/front-partial/footer.blade.php ENDPATH**/ ?>