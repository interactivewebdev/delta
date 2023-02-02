<body>
    <!--header-->
    <div class="header">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-none d-md-block" href="{{ url('/') }}"><img
                        srcset="{{ url('assets/front/images/Deltabiocare_logo.svg') }}" width="200"
                        alt="Delta Bio Care"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <a class="navbar-brand" href="{{ url('/') }}"><img
                            srcset="{{ url('assets/front/images/Deltabiocare_logo.svg') }}" alt="Delta Bio Care"
                            style="width:130px; margin-top:14px;"></a>
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
                        @foreach ($categories as $item)
                            <li class="nav-item {{ count($item->subcategories) > 0 ? 'dropdown' : '' }}">
                                @if (count($item->subcategories) > 0)
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ $item->title }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($item->subcategories as $row)
                                            @if (count($row->subcategories) > 0)
                                                <li><a class="dropdown-item" href="#"> {{ $row->title }}
                                                        &raquo</a>
                                                    <ul class="submenu dropdown-menu">
                                                        @foreach ($row->subcategories as $sub)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ url('/product/list/' . $sub->category_id) }}">{{ $sub->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a class="dropdown-item"
                                                        href="{{ url('/product/list/' . $row->category_id) }}">{{ $row->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <a class="nav-link"
                                        href="{{ url('/product/list/' . $item->category_id) }}">{{ $item->title }}</a>
                                @endif
                            </li>
                        @endforeach
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="{{ url('/blog') }}">Blog</a></li>
                                <li><a class="dropdown-item" href="{{ url('/news') }}">News</a></li>
                                <li><a class="dropdown-item" href="{{ url('/careers') }}">Careers</a></li>
                                <li><a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a></li>
                                <li><a class="dropdown-item" href="{{ url('/contact-us') }}">Contact Us</a></li>
                            </ul>
                        </li>
                        <li class="nav-item" style="margin-left:100px;">
                            @if (Session::has('distributor'))
                                <div class="nav-item text-success">Hello {{ Session::get('distributor')['name'] }}, <a
                                        href="{{ url('/distributor/logout') }}" style="font-size: 14px;">Logout</a>
                                </div>
                            @else
                                <a class="nav-link" href='{{ url('/distributor/register') }}'>Login/Signup</a>
                            @endif
                        </li>
                        <li class="nav-item dropdown pt-3">
                            <div id="google_translate_element"></div>
                        </li>
                        <li class="nav-item">
                            <div class="top-header d-none d-sm-block">
                                <!-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
                                <a href="https://twitter.com/DeltaBioCare" target="_blank"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/company/delta-bio-care/" target="_blank"><i
                                        class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
