<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:26:27 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Fantatour-Booking</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('clients/assets/images/logos/favicon.png')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    
    <!-- Flaticon -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/flaticon.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/fontawesome-5.14.0.min.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/bootstrap.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/magnific-popup.min.css')}}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/nice-select.min.css')}}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/aos.css')}}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/slick.min.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/style.css')}}">
    {{-- date time picker  --}}
    <link rel="stylesheet" href="{{ asset('clients/assets/css/jquery.datetimepicker.min.css') }}" />
    {{-- custom css by longvu --}}
    <link rel="stylesheet" href="{{ asset('clients/assets/css/custom-css.css') }}" />
    
</head>
    <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"><div class="custom-loader"></div></div>

    <!-- main header -->
    <header class="main-header header-one white-menu menu-absolute">
        <!--Header-Upper-->
        <div class="header-upper py-30 rpy-0">
            <div class="container-fluid clearfix">

                <div class="header-inner rel d-flex align-items-center">
                    <div class="logo-outer">
                        <div class="logo"><a href="index.html"><img src="assets/images/logos/logo.png" alt="Logo" title="Logo"></a></div>
                    </div>

                    <div class="nav-outer mx-lg-auto ps-xxl-5 clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-lg">
                            <div class="navbar-header">
                               <div class="mobile-logo">
                                   <a href="index.html">
                                        <img src="assets/images/logos/logo.png" alt="Logo" title="Logo">
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
                                    <li class=" current"><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li class="dropdown"><a href="#">Tours</a>
                                        <ul>
                                            <li><a href="{{ route('tours') }}">Tour Sidebar</a></li>
                                            <li><a href="{{ route('travel-guides') }}">Tour Guide</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('destinations') }}">Destinations</a></li>
                                    <li class="dropdown"><a href="{{ route('') }}">Pages</a>
                                        <ul>
                                            <li><a href="{{ route('about') }}">faqs</a></li>
                                            <li class="dropdown"><a href="{{ route('') }}">Gallery</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="{{ route('') }}">blog</a>
                                        <ul>
                                            <li><a href="{{ route('') }}">blog List</a></li>
                                            <li><a href="{{ route('') }}">blog details</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </nav>
                        <!-- Main Menu End-->
                    </div>
                    
                    <!-- Nav Search -->
                    <div class="nav-search">
                        <button class="far fa-search"></button>
                        <form action="#" class="hide">
                            <input type="text" placeholder="Search" class="searchbox" required="">
                            <button type="submit" class="searchbutton far fa-search"></button>
                        </form>
                    </div>
                    
                    <!-- Menu Button -->
                    <div class="menu-btns py-10">
                        <a href="contact.html" class="theme-btn style-two bgc-secondary">
                            <span data-hover="Book Now">Book Now</span>
                            <i class="fal fa-arrow-right"></i>
                        </a>
                        <!-- menu sidbar -->
                        <div class="menu-sidebar">
                            <button class="bg-transparent">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </header>
   

