<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo-sgo.png') }}" alt="navbar brand" class="navbar-brand"
                    height="80" width="100" style="margin-top: 10px" />
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ route('dashboard') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('config.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Cấu hình</p>

                    </a>

                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-box"></i>
                        <p>Sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.product') }}">
                                    <span class="sub-item">Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.categories.index') }}">
                                    <span class="sub-item">Danh sách danh mục</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayoutsBusinesses">
                        <i class="fas fa-briefcase"></i>
                        <p>Doanh nghiệp</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayoutsBusinesses">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('businesses.index') }}">
                                    <span class="sub-item">Danh sách doanh nghiệp</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('businesses.create') }}">
                                    <span class="sub-item">Thêm doanh nghiệp</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayoutsSerivce">
                        <i class="fab fa-servicestack"></i>
                        <p>Dịch vụ</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayoutsSerivce">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('service.index') }}">
                                    <span class="sub-item">Danh sách dịch vụ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('service.create') }}">
                                    <span class="sub-item">Thêm dịch vụ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayoutsWebsite">
                        <i class="fab fa-internet-explorer"></i>
                        <p>Website</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayoutsWebsite">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('website.index') }}">
                                    <span class="sub-item">Danh sách website</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('website.create') }}">
                                    <span class="sub-item">Thêm website</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#introduction_categories">
                        <i class="fas fa-window-maximize"></i>
                        <p>Chuyên mục giới thiệu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="introduction_categories">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('introduction_categories.index') }}">
                                    <span class="sub-item">Danh sách danh mục giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('introduction_categories.create') }}">
                                    <span class="sub-item">Thêm danh mục giới thiệu</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#introduction_posts">
                        <i class="fas fa-table"></i>
                        <p>Bài viết giới thiệu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="introduction_posts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('website.index') }}">
                                    <span class="sub-item">Danh sách website</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('introduction_categories.index') }}">
                                    <span class="sub-item">Danh sách danh mục giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('introduction_posts.index') }}">
                                    <span class="sub-item">Danh sách bài viết giới thiệu</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#website_feature">
                        <i class="fas fa-receipt"></i>
                        <p>Tính năng trang web</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="website_feature">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('website_feature.index') }}">
                                    <span class="sub-item">Danh sách tính năng trang web</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('website_feature.create') }}">
                                    <span class="sub-item">Thêm tính năng trang web</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#process">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>Quá trình</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="process">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('process.index') }}">
                                    <span class="sub-item">Danh sách quá trình</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('process.create') }}">
                                    <span class="sub-item">Thêm quá trình</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#product_advantages">
                        <i class="fas fa-vote-yea"></i>
                        <p>Lợi ích sản phẩm</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="product_advantages">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('product_advantages.index') }}">
                                    <span class="sub-item">Danh sách lợi ích</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product_advantages.create') }}">
                                    <span class="sub-item">Thêm lợi ích</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#news">
                        <i class="far fa-newspaper"></i>
                        <p> Bài viết và Tin tức</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="news">
                        <ul class="nav nav-collapse">

                            <li>
                                <a href="{{ route('post.index') }}">
                                    <span class="sub-item">Danh sách bài viết</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('news.index') }}">
                                    <span class="sub-item">Danh sách tin tức</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('news_categories.index') }}">
                                    <span class="sub-item">Danh sách danh mục tin tức</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
