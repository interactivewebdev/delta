@extends('layouts.app');
@section('custom-css-tags')
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('custom-script-tags')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js">
    </script>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Add New Product</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Add New Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Account Info</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Personal Info</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Payment Info</small></a></li>
                <li><a href="#step-4">Step 4<br /><small>Confirm details</small></a></li>
            </ul>
            <div class="mt-4">
                <div id="step-1">
                    <div class="row">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Repeat password"
                                required> </div>
                    </div>
                </div>
                <div id="step-2">
                    <div class="row">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Address" required>
                        </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="City" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="State" required>
                        </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Country" required>
                        </div>
                    </div>
                </div>
                <div id="step-3" class="">
                    <div class="row">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Number"
                                required> </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Card Holder Name"
                                required> </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="CVV" required> </div>
                        <div class="col-md-6"> <input type="text" class="form-control" placeholder="Mobile Number"
                                required> </div>
                    </div>
                </div>
                <div id="step-4" class="">
                    <div class="row">
                        <div class="col-md-12"> <span>Thanks For submitting your details with
                                BBBootstrap.com. we will send you a confirmation email. We will review your
                                details and revert back.</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-css-styles')
    <style>
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline:
                0;
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
    </style>
@endsection

@section('custom-js-script')
    <script>
        $(document).ready(function() {

            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,
            });

        });
    </script>
@endsection
