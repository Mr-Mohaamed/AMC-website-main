<!DOCTYPE html>
<html lang="en" dir={{ config('app.locale') == 'en' ? 'trl' : 'rtl' }}>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>{{ @$web->name_en }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ @$web->img3 }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ @$web->img3 }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ @$web->img3 }}">
    <link rel="mask-icon" href="{{ @$web->img3 }}" color="#fa7070">
    <meta name="msapplication-TileColor" content="#fa7070">
    <meta name="theme-color" content="#fa7070">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @if (config('app.locale') == 'en')
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/fontawesome/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/swiper/css/swiper.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/wow/css/animate.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/magnific-popup/css/magnific-popup.css"
            type="text/css">
        <link rel="stylesheet"
            href="{{ asset('Front') }}/dependencies/components-elegant-icons/css/elegant-icons.min.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/dependencies/simple-line-icons/css/simple-line-icons.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/assets/css/app.css" type="text/css">
    @else
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/bootstrap/css/bootstrap.min.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/fontawesome/css/all.min.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/swiper/css/swiper.min.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/wow/css/animate.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/magnific-popup/css/magnific-popup.css"
            type="text/css">
        <link rel="stylesheet"
            href="{{ asset('Front') }}/RTL/dependencies/components-elegant-icons/css/elegant-icons.min.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/dependencies/simple-line-icons/css/simple-line-icons.css"
            type="text/css">
        <link rel="stylesheet" href="{{ asset('Front') }}/RTL/assets/css/app.css" type="text/css">
    @endif
    <script src="https://kit.fontawesome.com/e30f0b6d88.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<style>
    .lds-roller {
        /* change color here */
        color: #1c4c5b
    }

    .lds-roller,
    .lds-roller div,
    .lds-roller div:after {
        box-sizing: border-box;
    }

    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7.2px;
        height: 7.2px;
        border-radius: 50%;
        background: currentColor;
        margin: -3.6px 0 0 -3.6px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 62.62742px;
        left: 62.62742px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 67.71281px;
        left: 56px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 70.90963px;
        left: 48.28221px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 70.90963px;
        left: 31.71779px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 67.71281px;
        left: 24px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 62.62742px;
        left: 17.37258px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12.28719px;
    }

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<body id="home-version-1" class="home-version-4" data-style="default">
    <a href="#main_content" data-type="section-switch" class="return-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <div class="page-loader">
        <div class="loader">
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div id="main_content">
        <header class="site-header header_trans-fixed" data-top="992">
            <div class="container">
                <div class="header-inner">
                    <div class="toggle-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="site-mobile-logo">
                        <a href="{{ route('front-home') }}" class="logo">
                            <img src="{{ asset(@$web->img) }}" alt="site logo" class="main-logo">
                            <img src="{{ asset(@$web->img) }}" alt="site logo" class="sticky-logo">
                        </a>
                    </div>
                    <nav class="site-nav">
                        <div class="close-menu">
                            <span>Close</span>
                            <i class="ei ei-icon_close"></i>
                        </div>

                        <div class="site-logo">
                            <a href="{{ route('front-home') }}" class="logo">
                                <img src="{{ asset(@$web->img) }}" alt="site logo" class="main-logo">
                                <img src="{{ asset(@$web->img) }}" alt="site logo" class="sticky-logo">
                            </a>
                        </div>
                        <!-- /.site-logo -->

                        <div class="menu-wrapper" data-top="992">
                            <ul class="site-main-menu">

                                <li><a class="'font-Regular  @if (Route::currentRouteName() == 'front-home') current_page @endif"
                                        href="{{ route('front-home') }}">{{ __('validation.Home') }}</a></li>
                                <li><a class="'font-Regular  @if (Route::currentRouteName() == 'front.about_us') current_page @endif"
                                        href="{{ route('front.about_us') }}">{{ __('validation.About') }}</a></li>
                                <li><a class="'font-Regular  @if (Route::currentRouteName() == 'front.contact') current_page @endif"
                                        href="{{ route('front.contact') }}">{{ __('validation.Contact') }}</a></li>
                                <li><a class="'font-Regular  @if (Route::currentRouteName() == 'front.Blogs') current_page @endif"
                                        href="{{ route('front.Blogs') }}">{{ __('validation.Blogs') }}</a></li>
                                <li><a class="'font-Regular  @if (Route::currentRouteName() == 'front.Pricing') current_page @endif"
                                        href="{{ route('front.Pricing') }}">{{ __('validation.Pricing') }}</a></li>
                                <li class="menu-item-has-children">
                                    <div class="dropdown">
                                        <div class="dropbtn">
                                            <img width="15%" class="mb-1"
                                                src="{{ asset('Front/media/NewBanners/globe.png') }}" alt="">
                                            @if (config('app.locale') == 'ar')
                                                AR
                                            @else
                                                EN
                                            @endif
                                            <img width="10%" class="mb-1"
                                                src="{{ asset('Front/media/NewBanners/chevron-down.png') }}"
                                                alt="">

                                        </div>
                                        <div class="dropdown-content">
                                            <a href="{{ route('Languaes.change', 'en') }}"> English</a>
                                            <a href="{{ route('Languaes.change', 'ar') }}"> Arabic</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        @yield('Front-container')
        <div>
            <div class="py-4 "
                style="overflow: visible;background-image:url({{ asset('Front/media/NewBanners/m2.png') }});background-position: center center;background-repeat: no-repeat;background-size: cover;">
            </div>
            <div
                style="overflow: visible;background-image:url({{ asset('Front/media/NewBanners/footer1.png') }});background-position: center center;background-repeat: no-repeat;background-size: cover;">
                <div class="mx-md-5 px-md-5 mx-3">
                    <div class="row flex-between px-md-0 px-4 pt-5">
                        <div class="col-md-4 ">
                            <img class="wow stickySlideUp" src="{{ asset(@$web->img2) }}" width="50%"
                                alt="logo">
                            <div class="row  wow stickySlideUp">
                                {{-- <span class="text-white col-md-9 mt-3 font-Regular "> --}}
                                <span class="text-white col-12 mt-3 font-Regular ">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et
                                    velit
                                    interdum, ac aliquet odio mattis.
                                </span>
                            </div>
                            <ul class="footer-social-link mt-4 mb-4 mb-md-0 mt-md-4 wow stickySlideUp">
                                <li>
                                    <a class="soical_icon" href="{{ @$web->facebook }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="soical_icon" href="{{ @$web->instagram }}">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="soical_icon" href="{{ @$web->youtube }}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="soical_icon" href="{{ @$web->linked_in }}">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-2 text-start wow stickySlideUp">
                            <h4 class="text-white  font-Regular"> {{ __('validation.quick_links') }}</h4>
                            <ul class="pl-0 pt-2" style="list-style: none">

                                <li class="my-2 ">
                                    <a class="font-Regular text-white "
                                        href="{{ route('front-home') }}">{{ __('validation.Home') }}</a>
                                </li>
                                <li class="my-2 ">
                                    <a class="font-Regular text-white "
                                        href="{{ route('front.about_us') }}">{{ __('validation.About') }}</a>
                                </li>
                                <li class="my-2 ">
                                    <a class="font-Regular text-white "
                                        href="{{ route('front.Pricing') }}">{{ __('validation.Pricing') }}</a>
                                </li>
                                <li class="my-2 ">
                                    <a class="font-Regular text-white "
                                        href="{{ route('front.contact') }}">{{ __('validation.Contact') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-start wow stickySlideUp">
                            <h4 class=" font-Regular text-white" style="visibility: visible;">
                                {{ __('validation.Contact') }}
                            </h4>
                            <ul class="pl-3 pt-2" style="list-style: none">
                                <li class="my-3 row ">
                                    <div class="soical_icon ">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <span class=" mx-2 text-white">
                                        {{ @$web->address }}
                                    </span>
                                </li>
                                <li class="my-3 row ">
                                    <div class="soical_icon ">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <span class=" mx-2 text-white font-Regular">
                                        {{ @$web->phone1 }} , {{ @$web->phone2 }}
                                    </span>
                                </li>
                                <li class="my-3 row ">
                                    <div class="soical_icon ">
                                        <i class="fa-solid fa-message"></i>
                                    </div>
                                    <span class=" mx-2 text-white font-Regular">
                                        {{ @$web->email }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row d-flex flex-center mt-3">
                        {{-- <div class="col-md-11"> --}}
                        <div class="col-12">
                            <hr class=" my-md-3  text-white "
                                style="background: white ;align-items: center; padding: 0.5px; ">
                        </div>
                    </div>
                    <div class="row flex-between pb-3 px-md-0 px-3">

                        <div class="  my-4 my-md-0">
                            <h6 class=" font-Light text-white mx-3"
                                style="visibility: visible; animation-name: pixFadeUp;">
                                {{ __('validation.footer') }}
                            </h6>
                        </div>
                        <div class="  mb-4 my-md-0">
                            <a class="font-Regular mx-3" style="color: #FFFFFB;" href="{{ route('front-home') }}">
                                {{ __('validation.PrivacyPolicy') }}
                            </a>
                            <a class="font-Regular mx-3" style="color: #FFFFFB;"
                                href="{{ route('front.about_us') }}">
                                {{ __('validation.TermsofService') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="whatapp-icon">
        <a href="https://wa.me/+{{ @$web->whatsapp }}" target="_blank">
            <img width="70%" src="{{ asset('Front/media/NewBanners/whatsapp1.png') }}" alt="">
        </a>
    </div>
    <script src="{{ asset('Front') }}/dependencies/jquery/jquery.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/swiper/js/swiper.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/jquery.appear/jquery.appear.js"></script>
    <script src="{{ asset('Front') }}/dependencies/wow/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('Front') }}/dependencies/countUp.js/countUp.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
    <script src="{{ asset('Front') }}/dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('Front') }}/dependencies/gmap3/js/gmap3.min.js"></script>
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&amp;ver=2.1.6'></script>
    <script src="{{ asset('CDN/sweetalert/sweetalert2.js') }}"></script>


    <!-- Site Scripts -->
    <script src="{{ asset('Front') }}/assets/js/typewriter.js"></script>
    <script src="{{ asset('Front') }}/assets/js/header.js"></script>
    <script src="{{ asset('Front') }}/assets/js/app.js"></script>

</body>

</html>
