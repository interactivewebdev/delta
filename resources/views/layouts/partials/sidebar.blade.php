<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ url('/assets/front/images/logo13.png') }}" alt=""><img class="img-fluid for-dark"
                    src="{{ url('/assets/front/images/logo13.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ url('/assets/front/images/logo13.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                src="{{ url('/assets/front/images/logo13.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"> </i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                            href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span></a></li>
                    @if (strtolower(Session::get('usertype')) == 'admin')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-user"></i><span>Users</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ url('admin/config') }}">Admin Configuration</a></li>
                                <li><a href="{{ url('#') }}">Data Entry User</a></li>
                                <li><a href="{{ url('admin/document/users') }}">Document User</a></li>
                                <li><a href="{{ url('admin/distributors') }}">Distributors</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (strtolower(Session::get('usertype')) == 'admin' || strtolower(Session::get('usertype')) == 'distributor')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-users"></i><span>Document</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ url('admin/document/categories') }}">Doc Category</a></li>
                                <li><a href="{{ url('admin/documents') }}">Documents</a></li>
                                <li><a href="{{ url('admin/doc_requests') }}">Doc Access Requests</a></li>
                                @if (strtolower(Session::get('usertype')) == 'admin')
                                    <li><a href="{{ url('admin/product/documents') }}">Product Documents</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if (strtolower(Session::get('usertype')) == 'admin')
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-basket-shopping"></i><span>Products</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('categories') }}">Categories</a></li>
                                <li><a href="{{ url('admin/map_filter') }}">Filter Categories</a></li>
                                <li><a href="{{ url('admin/filters') }}">Filter</a></li>
                                <li><a href="{{ route('products') }}">Products</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-book"></i><span>Complaint</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="javascript:void(0)">Links will come later</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-passport"></i><span>Website</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ url('/admin/fcategories') }}">Faq Category</a></li>
                                <li><a href="{{ url('/admin/faqs') }}">Faq's</a></li>
                                <li><a href="{{ url('/admin/blogs') }}">Blog</a></li>
                                <li><a href="{{ url('/admin/news') }}">News</a></li>
                                <li><a href="{{ url('/admin/contents') }}">Content</a></li>
                                <li><a href="{{ url('/admin/sliders') }}">Slider</a></li>
                                <li><a href="{{ url('/admin/benefits') }}">Benefits</a></li>
                                <li><a href="{{ url('/admin/addresses') }}">Addresses</a></li>
                                <li><a href="{{ url('/admin/meetus') }}">Meetus Addresses</a></li>
                                <li><a href="{{ url('/admin/careers') }}">Career</a></li>
                            </ul>
                        </li>

                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                                <i class="fa-solid fa-database"></i><span>Data</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ url('/admin/cookies') }}">Cookies</a></li>
                                <li><a href="{{ url('/admin/dist-activity') }}">Distributor Activity</a></li>
                                <li><a href="{{ url('/admin/imglib') }}">Image Library</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
