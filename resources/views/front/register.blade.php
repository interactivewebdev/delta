@extends('layouts.front')
@section('custom-css')
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
@endsection
@section('page-content')
    <div class="product-banner-image">
        <figure>
            <img src="{{ url('assets/front/images/3.jpg') }}" width="100%">
        </figure>
    </div>
    <div class="container">
        <div class="product-heading">
            <h3>Login/Register</h3>
            <nav>
                <ol class="product-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    Login/Register
                </ol>
            </nav>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-6">
                <div class=" text-center mt-5 ">
                    <h3>Login</h3>
                </div>

                <div class="row ">
                    <div class="col-lg-12 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form id="login-form" role="form" method="POST" action="{{url('/user/login')}}">
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email Address *</label>
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Please enter your email address *"
                                                            required="required" data-error="Email address is required.">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Password *</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Please enter your password *" required="required"
                                                            data-error="Password is required.">
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
                            </div>
                        </div>
                        <!-- /.8 -->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
            <div class="col-6">
                <div class=" text-center mt-5 ">
                    <h3>Register</h3>
                </div>

                <div class="row ">
                    <div class="col-lg-12 mx-auto">
                        <div class="card mt-2 mx-auto p-4 bg-light">
                            <div class="card-body bg-light">
                                <div class="container">
                                    <form id="register-form" role="form" method="POST" action="{{url('/user/register')}}">>
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Firstname *</label>
                                                        <input id="form_name" type="text" name="name"
                                                            class="form-control" placeholder="Please enter your firstname *"
                                                            required="required" data-error="Firstname is required.">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_lastname">Lastname *</label>
                                                        <input id="form_lastname" type="text" name="surname"
                                                            class="form-control" placeholder="Please enter your lastname *"
                                                            required="required" data-error="Lastname is required.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Email *</label>
                                                        <input id="form_email" type="email" name="email"
                                                            class="form-control" placeholder="Please enter your email *"
                                                            required="required" data-error="Valid email is required.">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_need">Please specify your need *</label>
                                                        <select id="form_need" name="need" class="form-control"
                                                            required="required" data-error="Please specify your need.">
                                                            <option value="" selected disabled>--Select Your
                                                                Issue--
                                                            </option>
                                                            <option>Request Invoice for order</option>
                                                            <option>Request order status</option>
                                                            <option>Haven't received cashback yet</option>
                                                            <option>Other</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit"
                                                        class="btn btn-success btn-send  pt-2 btn-block                            "
                                                        value="Register">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
@endsection
