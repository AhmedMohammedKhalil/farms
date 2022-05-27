<!doctype html>
<html class="no-js" lang="Ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Farms') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png')}}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/backToTop.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontAwesome5Pro.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">


    @livewireStyles()
    <style>





    </style>
    @stack('css')
</head>
<body style="">


    <!-- pre loader area start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-icon text-center d-sm-flex align-items-center justify-content-center">
                    <img class="loading-logo rounded-circle" src="{{ asset('assets/img/preloader.jpeg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- pre loader area end -->

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
    </div>
    <!-- back to top end -->

    <!-- header-start -->
    <header>
        <div class="header__area header-area-white">
            <div class="header-white-area theme-bg-secondary-h1" id="header-sticky" style="background: #F7F7F7">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-xl-10 col-lg-9 col-md-9 col-9 d-flex align-items-center">
                            <div class="main-menu-h1 main-menu main-menu-white text-center">
                                <nav id="mobile-menu">
                                    <ul>
                                        @auth('admin')
                                            <li><a href="javascript:void(0)">{{ auth('admin')->user()->name }}</a>
                                                <ul class="sub-menu-h1 sub-menu ">
                                                    <li><a href="{{ route('admin.profile') }}">البروفايل</a></li>
                                                    <li><a href="{{ route('admin.logout') }}">خروج</a></li>
                                                </ul>
                                            </li>
                                        @endauth
                                        @auth('farm')
                                        <li><a href="javascript:void(0)">{{ auth('farm')->user()->name }}</a>
                                            <ul class="sub-menu-h1 sub-menu ">
                                                <li><a href="{{ route('farm.profile') }}">البروفايل</a></li>
                                                <li><a href="{{ route('farm.logout') }}">خروج</a></li>
                                            </ul>
                                        </li>
                                        @endauth

                                        @auth('user')
                                            <li><a href="javascript:void(0)">{{ auth('user')->user()->name }}</a>
                                                <ul class="sub-menu-h1 sub-menu ">
                                                    <li><a href="{{ route('user.profile') }}">البروفايل</a></li>
                                                    <li><a href="{{ route('user.cart') }}">عربة المشتريات</a></li>
                                                    <li><a href="{{ route('user.logout') }}">خروج</a></li>
                                                </ul>
                                            </li>

                                        @endauth

                                        @if(!auth('admin')->check() && !auth('user')->check() && !auth('farm')->check())
                                            <li><a href="javascript:void(0)">تسجيل دخول</a>
                                                <ul class="sub-menu-h1 sub-menu ">
                                                    <li><a href="{{ route('admin.login') }}">الأدمن</a></li>
                                                    <li><a href="{{ route('farm.login') }}">المزرعة</a></li>
                                                    <li><a href="{{ route('user.login') }}">المستخدم</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                        <li><a href="{{ route('home') }}">الرئيسية</a></li>
                                        <li><a href="{{ route('products') }}">المنتجات</a></li>
                                        <li><a href="{{ route('about') }}">من نحن</a></li>
                                        <li><a href="{{ route('compare') }}">مقارنة</a></li>
                                        <li><a href="{{ route('search') }}">بحث</a></li>

                                    </ul>
                                </nav>
                            </div>
                            <div class="side-menu-icon d-lg-none text-end">
                                <a href="javascript:void(0)" class="info-toggle-btn f-right sidebar-toggle-btn"><i class="fal fa-bars"></i></a>
                            </div>

                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-3 col-3">
                            <div class="logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/favicon.png') }}" style="width: 150px;height:100px" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- sidebar area start -->
    <div class="sidebar__area">
        <div class="sidebar__wrapper">
            <div class="sidebar__close">
                <button class="sidebar__close-btn" id="sidebar__close-btn">
                  <i class="fal fa-times"></i>
               </button>
            </div>
            <div class="sidebar__content">
                <div class="sidebar__logo mb-40" dir="ltr">
                    <a href="{{ route('home') }}">
                  <img src="{{ asset('assets/img/favicon.png') }}" alt="logo">
                  </a>
                </div>
                <div class="mobile-menu fix"></div>
            </div>
        </div>
    </div>
    <!-- sidebar area end -->
    <div class="body-overlay"></div>
    <!-- sidebar area end -->
        <main>
            @yield('content')
        </main>
    <!-- footer -->
    <footer>
        <div class="cover" style="background-image: url('{{ asset('assets/img/sep.png') }}'); height:11px;">
        </div>
        <div class="copy-right-area theme-bg-common pt-30">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="w-auto">
                        <p class="mb-30 copy-right-text-1">
                              &copy;جميع الحقوق محفوظة @
                              <span dir="ltr">
                                2022 -
                                National Farms
                              </span>
                              </p>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/backToTop.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @livewireScripts()
    @stack('js')
    <script>
    $( document ).ready(function() {
        livewire.on('refreshProduct', data => {
            $('.modal-backdrop').remove();
        });
    });
    </script>
</body>
</html>
