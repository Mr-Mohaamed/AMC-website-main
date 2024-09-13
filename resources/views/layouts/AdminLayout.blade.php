<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$web->name_en }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ @$web->img3 }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ @$web->img3 }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ @$web->img3 }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ @$web->img3 }}">
    <link rel="manifest" href="{{ @$web->img3 }}">
    <meta name="msapplication-TileImage" content="{{ @$web->img3 }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('newAdmin/assets') }}/js/config.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/simplebar/simplebar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('newAdmin/assets/css/style.css') }}">
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('newAdmin/vendors') }}/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="{{ asset('newAdmin/assets') }}/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('newAdmin/assets') }}/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="{{ asset('newAdmin/assets') }}/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('newAdmin/assets') }}/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="{{ asset('newAdmin/assets') }}/css/newcss.css">
    <link href="{{ asset('newAdmin') }}/vendors/flatpickr/flatpickr.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://kit.fontawesome.com/e30f0b6d88.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <link rel="stylesheet" href="{{ asset('CDN/Datatable/dataTable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CDN/Datatable/dataTables.bootstrap5.min.css') }}">
    <script src="{{ asset('CDN/Datatable/dataTables.min.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    @if (config('app.locale') == 'ar')
        <script>
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        </script>
    @else
        <script>
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        </script>
    @endif
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid">
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-inverted">
                <script>
                    var navbarStyle = localStorage.getItem("navbarStyle");
                    if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                    }
                </script>
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">
                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Toggle Navigation"
                            data-bs-original-title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                    class="toggle-line"></span></span></button>
                    </div><a class="navbar-brand" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center py-3">
                            <img class="me-2" src="{{ @$web->img }}" alt="" width="40">
                            <span class="font-sans-serif" style="font-size: 14px">{{ @$web->name_en }}</span>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                            {{-- Web Dtails --}}
                            <div class="row navbar-vertical-label-wrapper  mb-2">
                                <div class="col-auto navbar-vertical-label"> {{ __('validation.Web_details') }} </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider" />
                                </div>
                            </div>
                            <div>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.Banners') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.Banners') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.Blog') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.Blog') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.BlogPosts') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.BlogPosts') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.home.sections') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1">
                                                {{ __('validation.Home_section') }} </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.Partners') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.Partners') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.services') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.services') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.web') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1">
                                                {{ __('validation.Web_details') }} </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.Q&A') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1"> {{ __('validation.Q&A') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('admin.Testimonials') }}" role="button">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon"><span class="far fa-user"></span>
                                            </span><span class="nav-link-text ps-1">
                                                {{ __('validation.Testimonials') }} </span>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            {{-- End Web Dtails --}}


                            {{-- Users --}}
                            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                <div class="col-auto navbar-vertical-label"> {{ __('validation.Team') }} </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider" />
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.users') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="far fa-user"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.Team') }} </span>
                                    </div>
                                </a>
                            </li>
                            {{-- End Users --}}

                            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                <div class="col-auto navbar-vertical-label"> {{ __('validation.Products') }} </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider" />
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.all.items') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="fas fa-archive"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.Products') }}
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.Subscription') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="fas fa-archive"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.Subscription') }}
                                        </span>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.technologies') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="fas fa-archive"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.technologies') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.Integrations') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="fas fa-archive"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.Integrations') }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.contact') }}" role="button">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon"><span class="fas fa-archive"></span>
                                        </span><span class="nav-link-text ps-1"> {{ __('validation.Contact') }}
                                        </span>
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>

            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg"
                    data-move-target="#navbarVerticalNav" data-navbar-top="combo">
                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center">
                            <img class="me-2" src="{{ asset('uplade/HomeDeatils') }}/{{ @$web->img }}"
                                alt="" width="40">
                            <span class="font-sans-serif logo_name">{{ @$web->name_en }}</span>
                        </div>
                    </a>
                    @include('Navbar.NavbarEn')
                </nav>
                @yield('Admin-Contain')
            </div>
        </div>
    </main>
    <script src="{{ asset('CDN/sweetalert/sweetalert2.js') }}"></script>

    <script src="{{ asset('newAdmin/vendors') }}/popper/popper.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/anchorjs/anchor.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/is/is.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/echarts/echarts.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/fontawesome/all.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/lodash/lodash.min.js"></script>
    <script src="{{ asset('newAdmin/vendors') }}/list.js/list.min.js"></script>
    <script src="{{ asset('newAdmin/assets') }}/js/flatpickr.js"></script>
</body>

</html>
