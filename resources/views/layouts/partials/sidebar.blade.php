<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ url('assets/images/logo/Deltabiocare_logo.svg') }}" alt=""><img
                    class="img-fluid for-dark" src="{{ url('assets/images/logo/Deltabiocare_logo.svg') }}"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                    src="{{ url('assets/images/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                src="{{ url('assets/images/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"> </i></div>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                            href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <i class="fa-solid fa-user"></i><span>Users</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="">Distributors</a></li>
                            <li><a href="">Admin Configuration</a></li>
                            <li><a href="#">Document User</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <i class="fa-regular fa-file"></i><span>Documents</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ url('admin/document/categories') }}">Category</a></li>
                            <li><a href="{{ url('admin/documents') }}">Documents</a></li>
                            <li><a href="#">Requests</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <i class="fa-solid fa-basket-shopping"></i><span>Products</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('categories') }}">Categories</a></li>
                            <li><a href="#">Filter Categories</a></li>
                            <li><a href="#">Filter</a></li>
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
                            <li><a href="#">Distributor Document Categories</a></li>
                            <li><a href="#">Faq's</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Content</a></li>
                            <li><a href="#">Slider</a></li>
                            <li><a href="#">Benefits</a></li>
                            <li><a href="#">Addresses</a></li>
                            <li><a href="#">Meetus Addresses</a></li>
                            <li><a href="#">Career</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#">
                            <i class="fa-solid fa-database"></i><span>Data</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Cookies</a></li>
                            <li><a href="#">Distributor Activity</a></li>
                            <li><a href="#">Image Library</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
