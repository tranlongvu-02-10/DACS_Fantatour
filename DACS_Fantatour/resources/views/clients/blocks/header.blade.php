<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Fantatour - {{ $title }}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('clients/assets/images/logos/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <!-- Import CSS for Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


    <!-- Icon Fonts -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/flaticon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/fontawesome-5.14.0.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <!-- UI Frameworks -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/jquery-ui.min.css') }}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/jquery.datetimepicker.min.css') }}">

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/style.css') }}">

    <!-- Login Page Styles -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/css-login/fonts/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/css-login/style.css') }}">

    <!-- Custom Overrides -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/custom-css.css') }}">
    
    {{-- User Profile  --}}
    <link rel="stylesheet" href="{{ asset('clients/assets/css/user-profile.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">


        
</head>
<body>
    <div class="page-wrapper">

        <!-- Preloader -->
       <div class="preloader"><div class="custom-loader"></div></div> 

        <!-- main header -->
        <header class="main-header header-one">
            <!--Header-Upper-->
            <div class="header-upper bg-white py-30 rpy-0">
                <div class="container-fluid clearfix">

                    <div class="header-inner rel d-flex align-items-center">
                        <div class="logo-outer">
                            <div class="logo"><a href="{{ route('home') }}"><img src="{{asset('clients/assets/images/logos/logo-two.png')}}" alt="Logo" title="Logo"></a></div>
                        </div>

                        <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                   <div class="mobile-logo">
                                       <a href="{{ route('home') }}">
                                            <img src="{{asset('clients/assets/images/logos/logo-two.png')}}" alt="Logo" title="Logo">
                                       </a>
                                   </div>
                                   
                                    <!-- Toggle Button -->
                                    <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="{{ Request::url() == route('home') ? 'active' : '' }}"><a
                                                href="{{ route('home') }}">Trang chủ</a></li>
                                        <li class="{{ Request::url() == route('about') ? 'active' : '' }}"><a
                                                href="{{ route('about') }}">Giới thiệu</a></li>
                                        <li
                                            class="dropdown {{ Request::is('tours') || Request::is('travel-guides') || Request::is('tour-detail/*') ? 'active' : '' }}">
                                            <a href="#">Tours</a>
                                            <ul>
                                                <li><a href="{{ route('tours') }}">Tours</a></li>
                                                <li><a href="{{ route('travel-guides') }}">Hướng dẫn viên</a></li>
                                            </ul>
                                        </li>

                                        <li class="{{ Request::url() == route('destination') ? 'active' : '' }}"><a
                                                href="{{ route('destination') }}">Điểm đến</a></li>
                                        <li class="{{ Request::url() == route('contact') ? 'active' : '' }}"><a
                                                href="{{ route('contact') }}">Liên Hệ</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                        
                        <!-- Nav Search -->
                        <div class="nav-search">
                            <button class="far fa-search"></button>
                            <form action="#" class="hide" method="GET">
                                <input type="text" name="keyword" placeholder="Search" class="searchbox" required>
                                <i class="fa fa-microphone" aria-hidden="true" style="margin: 0 16px"
                                    id="voice-search"></i>
                                <button type="submit" class="searchbutton far fa-search"></button>
                            </form>
                        </div>
                        <!-- Nav ngôn ngữ -->
                        <div class="dropdown lang-dropdown ms-3">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('clients/assets/images/flags/' . (app()->getLocale() == 'vi' ? 'vi.png' : 'en.jpg')) }}" alt="flag" width="20">
                                {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/lang/vi">
                                        <img src="{{ asset('clients/assets/images/flags/vi.png') }}" alt="Tiếng Việt" width="20"> Tiếng Việt
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/lang/en">
                                        <img src="{{ asset('clients/assets/images/flags/en.jpg') }}" alt="English" width="20"> English
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Menu Button -->
                        <div class="menu-btns py-10">
                            <a href="{{ route('tours') }}" class="theme-btn style-two bgc-secondary">
                                <span data-hover="Đặt ngay">Đặt ngay</span>
                                <i class="fal fa-arrow-right"></i>
                            </a>
                            <!-- menu sidbar -->
                            <div class="menu-sidebar">
                                    <li class="drop-down">
                                        <button class="dropdown-toggle bg-transparent" id="userDropdown" style="color: black">
                                            @if (session()->has('avatar'))
                                                @php
                                                    $avatar = session()->get('avatar', 'user_avatar.jpg');
                                                @endphp
                                                <img id="avatarPreview" class="img-account-profile rounded-circle mb-2"
                                                src="{{ asset('clients/assets/images/user-profile/' . $avatar) }}"
                                                    style="width: 36px; height: 36px;">
                                            @else
                                                <i class='bx bxs-user bx-tada icon-user' style="font-size: 36px; color: black;"></i>
                                            @endif
                                        </button>  
                                                <ul class="dropdown-menu" id="dropdownMenu">
                                                    @if (session()->has('username'))
                                                        <li>{{ session()->get('username') }}</li>
                                                        <li><a href="{{ route('user-profile') }}">Thông tin cá nhân</a></li>
                                                        <li><a href="{{ route('my-tours') }}">Tour đã đặt</a></li>
                                                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                                    @else
                                                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                    @endif
                                                </ul>
                                    </li>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </header>