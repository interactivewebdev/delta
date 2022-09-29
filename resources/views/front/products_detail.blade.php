@extends('layouts.front')
@section('page-content')
    <div class="product-banner-image">
        <figure>
            <img src="{{ $product->banner_image }}" height="175" width="100%">
        </figure>
    </div>
    <div class="container">
        <div class="product-heading">
            <h3>{{ $page_heading }}</h3>
            <nav>
                <ol class="product-breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    @if ($parent_nav != '')
                        <li>{!! $parent_nav !!}
                    @endif
                    @if ($leaf_nav != '')
                        <li>{!! $leaf_nav !!}
                    @endif
                    @if ($leaf != '')
                        <li>{!! $leaf !!}
                    @endif
                </ol>
            </nav>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <h4>{{ $product->title }}</h4>
                        <p>{!! $product->description !!}</p>
                        @if (count($attributes) > 0)
                            @foreach ($attributes as $item)
                                <div class="row">
                                    <div class="col-md-3" style="font-size:14px; font-weight:500;">{{ $item->title }}</div>
                                    <div class="col-md-9" style="font-size:14px;">{{ $item->value }}</div>
                                </div>
                            @endforeach
                        @endif

                        <p>&nbsp;</p>
                        <h5>{{ $product->adv_heading }}</h5>
                        <p>&nbsp;</p>
                        <div class="row">
                            @if ($product->adv_img1 != '' && $product->adv_title1)
                                <div class="col-md-3 adv-box">
                                    <div>
                                        <img src="{{ $product->adv_img1 }}" class="adv-icon">
                                        <h6>{{ $product->adv_title1 }}</h6>
                                        <p>{{ $product->adv_desc1 }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($product->adv_img2 != '' && $product->adv_title2 != '')
                                <div class="col-md-3 adv-box">
                                    <div>
                                        <img src="{{ $product->adv_img2 }}" class="adv-icon">
                                        <h6>{{ $product->adv_title2 }}</h6>
                                        <p>{{ $product->adv_desc2 }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($product->adv_img3 != '' && $product->adv_title3 != '')
                                <div class="col-md-3 adv-box">
                                    <div>
                                        <img src="{{ $product->adv_img3 }}" class="adv-icon">
                                        <h6>{{ $product->adv_title3 }}</h6>
                                        <p>{{ $product->adv_desc3 }}</p>
                                    </div>
                                </div>
                            @endif

                            @if ($product->adv_img4 != '' && $product->adv_title4 != '')
                                <div class="col-md-3 adv-box">
                                    <div>
                                        <img src="{{ $product->adv_img4 }}" class="adv-icon">
                                        <h6>{{ $product->adv_title4 }}</h6>
                                        <p>{{ $product->adv_desc4 }}</p>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <p>&nbsp;</p>
                        {!! $product->description1 !!}
                        <p>&nbsp;</p>
                    </div>
                    <div class="col-md-4">
                        <div class="product-image">

                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php for($i=0; $i<count($product_images)+1; $i++){?>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $i }}"
                                        {{ $i == 0 ? 'class="active"' : '' }}></li>
                                    <?php }?>

                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ $product->image }}" class="d-block w-100"
                                            alt="{{ $product->title }}">
                                    </div>

                                    @if (count($product_images) > 0)
                                        @php $num=1; @endphp
                                        @foreach ($product_images as $pslide)
                                            <div class="carousel-item">
                                                <img src="{{ $pslide->image }}" class="d-block w-100"
                                                    alt="{{ $pslide->title }}">
                                            </div>
                                            @php $num++; @endphp
                                        @endforeach
                                    @endif

                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="request-form-message d-none"></div>
                                <div class="request-form">
                                    <h5>Interested in this product?</h5>
                                    <div style="font-size:small;">Please fill in your details, DeltaBioCare representative
                                        will
                                        contact you soon</div>
                                    <div style="font-size:small;" class="request-form-validate-message d-none text-warning">
                                        All fields are mandatory. Please fill all the fields carefully.</div>
                                    <form id="productEnquiry">
                                        <input type="hidden" name="productid" value="{{ $product->product_id }}">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Name, Last & First">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="company" class="form-control"
                                                    placeholder="Company name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email Address">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <button type="button" onclick="submitEnqForm(this.form)"
                                                    class="btn-submit btn-primary-submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-5">
                                <h5>Distributor Zone</h5>
                            </div>
                            <div class="col-md-7 text-right">
                                @if (isset($_SESSION['distributor_logged_in']) && $_SESSION['distributor_logged_in'])
                                    Hi {{ $_SESSION['dst_name'] }}, <a
                                        href="{{ url('/logout/distributor/' . $product->product_id) }}">Logout</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 zone-box">
                                <div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="how-to-use-tab" data-toggle="tab"
                                                href="#how-to-use" role="tab" aria-controls="home"
                                                aria-selected="true">How to use</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ingredients-tab" data-toggle="tab"
                                                href="#ingredients" role="tab" aria-controls="profile"
                                                aria-selected="false">Ingredients</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="documents-tab" data-toggle="tab" href="#documents"
                                                role="tab" aria-controls="contact"
                                                aria-selected="false">Documents</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="how-to-use" role="tabpanel"
                                            aria-labelledby="how-to-use-tab" style="position: relative">
                                            @if (count($type1) > 0)
                                                {{-- @if (isset($_SESSION['distributor_logged_in']) && $_SESSION['distributor_logged_in']) --}}
                                                @foreach ($type1 as $val)
                                                    <p>
                                                    <h5>{{ $val->main_title }}</h5>
                                                    @foreach ($val->attachments as $item)
                                                        @if ($item->link != '')
                                                            <a href="{{ $item->link }}"
                                                                onClick="return verifyDistributor()"
                                                                target="_blank">{{ $item->title }}</a><br />
                                                        @else
                                                            <?php $path = pathinfo($item->attachment);
                                                            $extn = strtolower($path['extension']); ?>
                                                            @if ($extn == 'html' || $extn == 'htm')
                                                                <a href="{{ $item->attachment }}" target="_blank"
                                                                    onClick="return verifyDistributor()">{{ $item->title }}</a><br />
                                                            @else
                                                                <a href="{{ url('open/document/' . urlencode(str_replace(' ', '', $item->title)) . '/' . base64_encode($item->attachment)) }}"
                                                                    onClick="return verifyDistributor()">{{ $item->title }}</a><br />
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    </p>
                                                @endforeach
                                                {{-- @else --}}
                                                <div class="row distributor-document-zone">
                                                    <div class="col-12 text-center">
                                                        Direct access to technical information and documents
                                                    </div>
                                                    <div class="col-12 text-center"><a href="{{ url('user/register') }}"
                                                            class="btn btn-primary btn-lg">Sign In</a></div>
                                                    <div class="col-12 text-center">Not yet registered ? <a
                                                            href="{{ url('user/register') }}">Create your
                                                            account now</a></div>
                                                </div>
                                                {{-- @endif --}}
                                            @else
                                                Not any document provided
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="ingredients" role="tabpanel"
                                            aria-labelledby="ingredients-tab">
                                            @if (count($type2) > 0)
                                                @if (isset($_SESSION['distributor_logged_in']) && $_SESSION['distributor_logged_in'])
                                                    @foreach ($type2 as $val)
                                                        <p>
                                                        <h5>{{ $val->main_title }}</h5>
                                                        @foreach ($val->attachments as $item)
                                                            @if ($item->link != '')
                                                                <a href="{{ $item->link }}"
                                                                    onClick="return verifyDistributor()"
                                                                    target="_blank">{{ $item->title }}</a><br />
                                                            @else
                                                                <a href="{{ url('open/document/' . urlencode(str_replace(' ', '', $item->title)) . '/' . base64_encode($item->attachment)) }}"
                                                                    onClick="return verifyDistributor()">{{ $item->title }}</a><br />
                                                            @endif
                                                        @endforeach
                                                        </p>
                                                    @endforeach
                                                @else
                                                    Please <a href="javascript:void(0)"
                                                        onClick="return verifyDistributor()">click here to login</a> as
                                                    distributor to get attachments.
                                                @endif
                                            @else
                                                Not any document provided
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="documents" role="tabpanel"
                                            aria-labelledby="documents-tab">
                                            @if (count($type3) > 0)
                                                @if (isset($_SESSION['distributor_logged_in']) && $_SESSION['distributor_logged_in'])
                                                    @foreach ($type3 as $val)
                                                        <p>
                                                        <h5>{{ $val->main_title }}</h5>
                                                        @foreach ($val->attachments as $item)
                                                            @if ($item->link != '')
                                                                <a href="{{ $item->link }}"
                                                                    onClick="return verifyDistributor()"
                                                                    target="_blank">{{ $item->title }}</a><br />
                                                            @else
                                                                <a href="{{ url('open/document/' . urlencode(str_replace(' ', '', $item->title)) . '/' . base64_encode($item->attachment)) }}"
                                                                    onClick="return verifyDistributor()">{{ $item->title }}</a><br />
                                                            @endif
                                                        @endforeach
                                                        </p>
                                                    @endforeach
                                                @else
                                                    Please <a href="javascript:void(0)"
                                                        onClick="return verifyDistributor()">click here to login</a> as
                                                    distributor to get attachments.
                                                @endif
                                            @else
                                                Not any document provided
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="distributorLogin" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Distributor Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="loginForm">
                                <div class="alert alert-danger d-none" id="log_msg"></div>
                                <div class="form-row login">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        value="">
                                </div>
                                <div class="form-row login">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        value="">
                                </div>
                            </form>
                            <div class="form-row login">
                                <a href="javascript:void(0)" id="forgot" class="font-italic">&raquo;&nbsp;forgot
                                    password</a>
                            </div>
                            <!-- <div class="form-row">
                                                                                                                                       <a href="javascript:void(0)" id="register" class="font-italic">&raquo;&nbsp;register</a>
                                                                                                                                    </div> -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="loginUser()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- forgot password -->
    <div class="modal fade" id="forgotpassword" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="forgotPwd">
                                <div class="alert alert-danger d-none" id="forgot_msg"></div>
                                <div class="form-row">
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Username or email address" value="">
                                </div>
                            </form>
                            <div class="form-row">
                                <a href="javascript:void(0)" id="login" class="font-italic">&raquo;&nbsp;login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="forgotPassword()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- register -->
    <div class="modal fade" id="registersection" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="register">
                                <div class="alert alert-danger d-none" id="reg_msg"></div>
                                <div class="form-row">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                        value="">
                                </div>
                                <div class="form-row">
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                                <div class="form-row">
                                    <input type="text" class="form-control" name="name" placeholder="Full name"
                                        value="">
                                </div>
                                <div class="form-row">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Address" value="">
                                </div>
                                <div class="form-row">
                                    <input type="number" class="form-control" name="phone" placeholder="Phone number"
                                        value="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="userRegister()">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script language="javascript">
        function verifyDistributor() {
            var isLoggedIn = '';
            isLoggedIn =
                '{{ isset($_SESSION['distributor_logged_in']) && $_SESSION['distributor_logged_in'] ? $_SESSION['distributor_logged_in'] : '' }}';
            //console.log(isLoggedIn);
            if (isLoggedIn)
                return true;
            else {
                $('#distributorLogin').modal('show');
                return false;
            }
        }

        $('#forgot').on('click', function() {
            //$('#action').prop('value', 'forgot');
            $('#distributorLogin').modal('hide');
            $('#forgotpassword').modal('show');
        });

        $('#login').on('click', function() {
            $('#forgotpassword').modal('hide');
            $('#distributorLogin').modal('show');
        });

        $('#register').on('click', function() {
            $('#distributorLogin').modal('hide');
            $('#registersection').modal('show');
        });

        function userRegister() {
            let user = $('form#register').serializeArray();
            let data = [];
            let newObj = {};
            $.each(user, function(idx, obj) {
                newObj[obj.name] = obj.value;
            });

            $.ajax({
                    method: "POST",
                    url: "{{ url('register/distributor') }}",
                    data: newObj
                })
                .done(function(msg) {
                    $('#reg_msg').removeClass('d-none').html(msg);
                    setTimeout(() => {
                        $('#registersection').modal('hide');
                    }, 1000);
                });
        }

        function forgotPassword() {
            let user = $('form#forgotPwd').serializeArray();
            let data = [];
            let newObj = {};
            $.each(user, function(idx, obj) {
                newObj[obj.name] = obj.value;
            });

            $.ajax({
                    method: "POST",
                    url: "{{ url('forgot/distributor') }}",
                    data: newObj
                })
                .done(function(msg) {
                    $('#forgot_msg').removeClass('d-none').html(msg);
                    setTimeout(() => {
                        $('#forgotpassword').modal('hide');
                    }, 1000);
                });
        }

        function loginUser() {
            let user = $('form#loginForm').serializeArray();
            let data = [];
            let newObj = {};
            $.each(user, function(idx, obj) {
                newObj[obj.name] = obj.value;
            });

            $.ajax({
                    method: "POST",
                    url: "{{ url('login/distributor') }}",
                    data: newObj
                })
                .done(function(msg) {
                    $('.login').hide();
                    $('#log_msg').removeClass('d-none').html(msg);
                    setTimeout(() => {
                        $('#distributorLogin').modal('hide');
                        window.location.reload();
                    }, 500);
                });
        }

        function submitEnqForm(form) {
            var data = {
                productid: form.productid.value,
                name: form.name.value,
                email: form.email.value,
                company: form.company.value,
                phone: form.phone.value
            };

            if (data.name != '' && data.email != '' && data.phone != '' && data.company != '') {
                $.ajax({
                        method: "POST",
                        url: "{{ url('enquiry/product') }}",
                        data: data
                    })
                    .done(function(msg) {
                        $('.request-form-validate-message').addClass('d-none');
                        $('.request-form').addClass('d-none');
                        $('.request-form-message').removeClass('d-none').html(msg);
                    });
            } else {
                $('.request-form-validate-message').removeClass('d-none');
            }
        }
    </script>
@endsection
