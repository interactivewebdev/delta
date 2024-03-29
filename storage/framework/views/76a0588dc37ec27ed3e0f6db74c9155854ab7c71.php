<!DOCTYPE html>
<html>

<head>
    <title>Delta Bio Care</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(url('assets/front/favicon.ico')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="title" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- start menu -->
    <script src="https://kit.fontawesome.com/18830a4317.js" crossorigin="anonymous"></script>
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="<?php echo e(url('assets/front/css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="<?php echo e(url('assets/front/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        .goog-te-gadget .goog-te-combo {
            color: blue !important;
            margin: 0px !important;
        }
    </style>
    <?php echo $__env->yieldContent('custom-css'); ?>
</head>
<?php echo $__env->make('layouts.front-partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(request()->is('/')): ?>
    <?php echo $__env->make('layouts.front-partial.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('page-content'); ?>
<?php echo $__env->make('layouts.front-partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<?php echo $__env->yieldContent('custom-script'); ?>
<script>
    setTimeout(() => {
        var subscribed = "<?php echo e(isset($_COOKIE['subscribed']) ? $_COOKIE['subscribed'] : ''); ?>";
        console.log("subscribed", subscribed);
        if (subscribed == "")
            $('#newslettersection').modal('show');
    }, 50000);

    document.getElementById('close-btn').addEventListener('click', closePopup);

    function closePopup(e) {
        $('#newslettersection').modal('hide');
    }

    function subscribe() {
        let newsletter = $('form#newsletter').serializeArray();
        let data = [];
        let newObj = {};

        $.each(newsletter, function(idx, obj) {
            newObj[obj.name] = obj.value;
        });

        if (newObj.email != '') {
            $.ajax({
                    method: "POST",
                    url: "<?php echo e(url('/api/subscribe/newsletter')); ?>",
                    data: newObj
                })
                .done(function(msg) {
                    $('#newsletter_msg').removeClass('d-none').html(msg);
                    setTimeout(() => {
                        $('#newslettersection').modal('hide');
                    }, 1000);
                });
        } else {
            $('#newsletter_msg').removeClass('d-none').html("Please fill subscription form completely.");
        }
    }

    function pageSubscribe() {
        let newsletter = $('form#pagenewsletter').serializeArray();
        let data = [];
        let newObj = {};

        $.each(newsletter, function(idx, obj) {
            newObj[obj.name] = obj.value;
        });

        if (newObj.email != '') {
            $.ajax({
                    method: "POST",
                    url: "<?php echo e(url('subscribe/newsletter')); ?>",
                    data: newObj
                })
                .done(function(msg) {
                    $('form#pagenewsletter .form-row').addClass('d-none');
                    $('#pagenewsletter_msg').removeClass('d-none').html(msg);
                });
        } else {
            $('#pagenewsletter_msg').removeClass('d-none').html("Please fill subscription form completely.");
        }
    }

    function noSubscribe() {
        $.ajax({
                url: "<?php echo e(url('/nosubscribe/newsletter')); ?>",
            })
            .done(function(msg) {
                console.log(msg);
            });
    }

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: "en"
        }, 'google_translate_element');

        var $googleDiv = $("#google_translate_element .skiptranslate");
        var $googleDivChild = $("#google_translate_element .skiptranslate div");
        $googleDivChild.next().remove();

        $googleDiv.contents().filter(function() {
            return this.nodeType === 3 && $.trim(this.nodeValue) !== '';
        }).remove();
    }

    function changeLanguageByButtonClick(language) {
        var selectField = document.querySelector("#google_translate_element select");
        for (var i = 0; i < selectField.children.length; i++) {
            var option = selectField.children[i];
            // find desired langauge and change the former language of the hidden selection-field 
            //console.log(option.value, language);
            if (option.value == language) {
                console.log('here');
                selectField.selectedIndex = i;
                // trigger change event afterwards to make google-lib translate this side
                selectField.dispatchEvent(new Event('change'));
                break;
            }
        }

        window.location.reload();
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

</html>
<?php /**PATH D:\Projects\dbc\resources\views/layouts/front.blade.php ENDPATH**/ ?>