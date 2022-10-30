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
        @if (Session::has('error'))
            <p>{{ Session::get('error') }}</p>
        @endif
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
                                    <form id="login-form" role="form" method="POST" action="{{ url('user/login') }}">
                                        @csrf
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Username *</label>
                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Please enter your email address *" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Password *</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Please enter your password *" required>
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
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                    @endif
                                    <form id="register-form" role="form" method="POST"
                                        action="{{ url('user/register') }}">
                                        @csrf
                                        <div class="controls">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Username *</label>
                                                        <input type="text" name="username" class="form-control"
                                                            placeholder="Please enter your username *" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password *</label>
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Please enter your password *" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Name *</label>
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Please enter your name *" required>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Company Email *</label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Please enter your email *" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="Please enter your phone">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Country *</label>
                                                        <select name="country" class="form-control" required>
                                                            <option value="">-- Select --</option>
                                                            @foreach ($countries as $cn)
                                                                <option value="{{ $cn->id }}">{{ $cn->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Company</label>
                                                        <input type="text" name="company" class="form-control"
                                                            placeholder="Please enter your company">

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
