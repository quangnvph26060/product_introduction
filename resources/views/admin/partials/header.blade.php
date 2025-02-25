<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a target="_blank" style="width: 90%;" href="https://sgomedia.vn/" class="logo">
                <img src="http://123.31.31.112:9797/backend/SGO VIET NAM (1000 x 375 px).png" alt="navbar brand"
                    class="navbar-brand img-fluid">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->

    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pe-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-search"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-search animated fadeIn">
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                    </a>
                    <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                        <li>
                            <div class="dropdown-title d-flex justify-content-between align-items-center">
                                Lịch sử chuyển khoản

                            </div>
                        </li>
                        <li>
                            <div class="scroll-wrapper message-notif-scroll scrollbar-outer"
                                style="position: relative;">
                                <div class="message-notif-scroll scrollbar-outer scroll-content"
                                    style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                                    <div class="notif-center px-3">
                                    </div>
                                </div>
                                <div class="scroll-element scroll-x">
                                    <div class="scroll-element_outer">
                                        <div class="scroll-element_size"></div>
                                        <div class="scroll-element_track"></div>
                                        <div class="scroll-bar"></div>
                                    </div>
                                </div>
                                <div class="scroll-element scroll-y">
                                    <div class="scroll-element_outer">
                                        <div class="scroll-element_size"></div>
                                        <div class="scroll-element_track"></div>
                                        <div class="scroll-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="http://123.31.31.112:9797/admin/order/ransfer-history">Xem tất cả<i
                                    class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item topbar-icon dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification"> 0</span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">
                                Bạn có 0 đơn hàng mới hôm nay
                            </div>
                        </li>
                        <li>
                            <div class="scroll-wrapper notif-scroll scrollbar-outer" style="position: relative;">
                                <div class="notif-scroll scrollbar-outer scroll-content"
                                    style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                                    <div class="notif-center">

                                        {{-- <small class="ms-3">4 ngày trước</small> --}}
                                        {{-- <a href="http://123.31.31.112:9797/admin/order/detail/57">
                                            <div class="notif-icon">

                                                <img width="22"
                                                    src="http://123.31.31.112:9797/backend/assets/img/image-default.jpg"
                                                    alt="">
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Nguyễn Tiến Đạt đặt hàng
                                                </span>
                                                <span class="time">
                                                    4 ngày trước
                                                </span>
                                            </div>
                                        </a> --}}


                                    </div>
                                </div>
                                <div class="scroll-element scroll-x">
                                    <div class="scroll-element_outer">
                                        <div class="scroll-element_size"></div>
                                        <div class="scroll-element_track"></div>
                                        <div class="scroll-bar"></div>
                                    </div>
                                </div>
                                <div class="scroll-element scroll-y">
                                    <div class="scroll-element_outer">
                                        <div class="scroll-element_size"></div>
                                        <div class="scroll-element_track"></div>
                                        <div class="scroll-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="see-all" href="http://123.31.31.112:9797/admin/order">Xem tất cả thông báo<i
                                    class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="http://123.31.31.112:9797/backend/assets/img/image-default.jpg" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <span class="profile-username">
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="scroll-wrapper dropdown-user-scroll scrollbar-outer" style="position: relative;">
                            <div class="dropdown-user-scroll scrollbar-outer scroll-content"
                                style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 0px;">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg">
                                            <img src="http://123.31.31.112:9797/backend/assets/img/image-default.jpg"
                                                alt="image profile" class="avatar-img rounded">
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p>
                                            <a href="">View Profile</a>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                </li>
                            </div>
                            <div class="scroll-element scroll-x">
                                <div class="scroll-element_outer">
                                    <div class="scroll-element_size"></div>
                                    <div class="scroll-element_track"></div>
                                    <div class="scroll-bar"></div>
                                </div>
                            </div>
                            <div class="scroll-element scroll-y">
                                <div class="scroll-element_outer">
                                    <div class="scroll-element_size"></div>
                                    <div class="scroll-element_track"></div>
                                    <div class="scroll-bar"></div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- End Navbar -->
</div>
