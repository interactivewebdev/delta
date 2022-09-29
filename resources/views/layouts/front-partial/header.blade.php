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
                            srcset="{{ url('assets/images/Deltabiocare_logo.svg') }}" alt="Delta Bio Care"
                            style="width:130px; margin-top:45px;"></a>
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
                        <!-- <li class="nav-item active">
       <a class="nav-link" href="<?php //echo base_url('/');
       ?>"><i class="fa fa-home" aria-hidden="true" style="font-size:20px;"></i> <span class="sr-only">(current)</span></a>
      </li> -->
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
                        <li class="nav-item"><a href="{{ url('/user/register') }}" class="nav-link">Login/Signup</a>
                        </li>
                        <li class="nav-link">
                            <div class="top-header d-none d-sm-block">
                                <!-- <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> -->
                                <a href="https://twitter.com/DeltaBioCare" target="_blank"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                                <a href="https://www.linkedin.com/company/delta-bio-care/" target="_blank"><i
                                        class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </li>
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
     <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
     </form> -->
                </div>
            </nav>
        </div>
    </div>
