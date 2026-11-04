<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Three Falcons')</title>
    <meta name="description" content="Pagination options datatables examples" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: [
                    "Poppins:300,400,500,600,700",
                    "Roboto:300,400,500,600,700",
                ],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/demo/demo12/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{{ asset('frontend/svg/Hero/MiniLogo.svg') }}" />
    @stack('styles')
</head>

<body
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        <header id="m_header" class="m-grid__item m-header" m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- BEGIN: Brand -->
                    <div class="m-stack__item m-brand m-brand--skin-dark">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="{{ route('user.index') }}" class="m-brand__logo-wrapper">
                                    <h1>Three Falcons</h1>
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                                    <span></span>

                                </a>
                                <!-- END -->
                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>

                                </a>
                                <!-- END -->
                                <!-- BEGIN: Responsive Header Menu Toggler -->
                                <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                                    class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <!-- END -->
                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                                    class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>
                                <!-- BEGIN: Topbar Toggler -->

                            </div>
                        </div>
                    </div>
                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <!-- BEGIN: Topbar -->
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver  m-stack--general ">
                            <div class="m-stack__item ">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="m-nav__item" style="align-content: center">
                                        <h4 class="m--font-info" style="padding-top: 8px;">
                                            {{ auth()->user()->name }}
                                        </h4>
                                    </li>
                                    <li id="" class="m-nav__item" style="align-content: center">
                                        <form action="{{ route('admin.auth.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn m-btn--pill m-btn--air    btn-outline-danger m-btn m-btn--outline-2x">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END: Topbar -->
                    </div>
                </div>
            </div>
        </header>
        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
                <i class="la la-close"></i>
            </button>
            <div id="m_aside_left" class="m-grid__item m-aside-left m-aside-left--skin-dark">
                <!-- BEGIN: Aside Menu -->
                <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark"
                    m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                    <ul class="m-menu__nav">
                        {{-- <li class="m-menu__item {{ request()->routeIs('dashboard') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('dashboard') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-line-graph"></i><span
                                    class="m-menu__link-text">Dashboard</span></a>
                        </li> --}}
                        <li class="m-menu__item {{ request()->routeIs('user.index') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('user.index') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-users-1"></i><span
                                    class="m-menu__link-text">Users</span></a>
                        </li>
                        <li class="m-menu__section ">
                            <h4 class="m-menu__section-text">Pages</h4>
                            <i class="m-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('home.edit') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('home.edit') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon   flaticon-home-2"></i><span class="m-menu__link-text">Home
                                    Page</span></a>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('about.edit') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('about.edit') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i class="m-menu__link-icon  fa fa-users"></i><span
                                    class="m-menu__link-text">About
                                    us</span></a>
                        </li>
                        <li class="m-menu__section ">
                            <h4 class="m-menu__section-text">Sections</h4>
                            <i class="m-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('project.index') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('project.index') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon  flaticon-globe"></i><span
                                    class="m-menu__link-text">Projects</span></a>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('services.index') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('services.index') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon  fa fa-layer-group"></i><span
                                    class="m-menu__link-text">Services</span></a>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('contactUs.index') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('contactUs.index') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon flaticon-support"></i><span
                                    class="m-menu__link-text">Contact us</span></a>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('faq.index') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('faq.index') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon fa fa-question-circle"></i><span
                                    class="m-menu__link-text">FAQs</span></a>
                        </li>
                        <li class="m-menu__item {{ request()->routeIs('hero.edit') ? 'm-menu__item--active' : '' }}"
                            aria-haspopup="true">
                            <a href="{{ route('hero.edit') }}" class="m-menu__link"><span
                                    class="m-menu__item-here"></span><i
                                    class="m-menu__link-icon  fa fa-images"></i><span
                                    class="m-menu__link-text">Hero</span></a>
                        </li>

                    </ul>
                </div>
                <!-- END: Aside Menu -->
            </div>
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <!-- BEGIN: Subheader -->
                <div class="m-subheader">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="m-subheader__title">@yield('page-title', '')</h3>
                        </div>
                    </div>
                </div>
                <!-- END: Subheader -->
                <div class="m-content" style=" padding: 10px 10px;">
                    @yield('content')
                </div>
            </div>
            <!-- end:: Body -->
        </div>
        <!-- begin::Footer -->
        <footer class="m-grid__item m-footer">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            2026 &copy; Three Falcons
                        </span>
                    </div>
                    <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                        <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">About</span>
                                </a>
                            </li>
                            <li class="m-nav__item">
                                <a href="#" class="m-nav__link">
                                    <span class="m-nav__link-text">Privacy</span>
                                </a>
                            </li>
                            <li class="m-nav__item m-nav__item">
                                <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center"
                                    data-placement="left">
                                    <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->

    <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->

    <!--begin::Global Theme Bundle -->
    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/demo12/base/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts -->
    @stack('scripts')
    <!--end::Page Scripts -->
</body>

</html>
