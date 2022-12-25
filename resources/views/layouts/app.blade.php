<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="description"
        content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap"> --}}
    <link rel="icon" href="{{ url('assets/images/logo/favicon-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('assets/images/logo/favicon-icon.png') }}" type="image/x-icon">
    <title>Deltabiocare :: {{ ucfirst(strtolower(Session::get('usertype'))) }} Dashboard </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/photoswipe.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/datatables.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ url('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/responsive.css') }}">
    @yield('custom-css-tags')
    @yield('custom-css-styles')
    <style>
        .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .simplebar-offset {
            height: calc(100vh - 150px);
        }
    </style>
</head>

<body>
    <!-- Loader starts-->
    @include('layouts.partials.loader')
    <!-- Loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('layouts.partials.header')
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('layouts.partials.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                @yield('breadcrumb')
                <!-- Container-fluid starts-->
                @yield('content')
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            @include('layouts.partials.footer')
        </div>
    </div>
    <!-- latest jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ url('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ url('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ url('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ url('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ url('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ url('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ url('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ url('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ url('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ url('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ url('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ url('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ url('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ url('assets/js/notify/index.js') }}"></script>
    <script src="{{ url('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ url('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ url('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ url('assets/js/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ url('assets/js/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ url('assets/js/photoswipe/photoswipe.js') }}"></script>
    <script src="{{ url('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ url('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ url('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ url('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ url('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ url('assets/js/height-equal.js') }}"></script>
    <script src="{{ url('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ url('assets/js/script.js') }}"></script>
    <script src="{{ url('assets/js/theme-customizer/customizer.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    @yield('custom-script-tags')
    @yield('custom-js-script')
</body>

</html>
