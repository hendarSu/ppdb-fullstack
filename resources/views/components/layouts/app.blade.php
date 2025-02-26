<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
        <meta name="author" content="Zoyothemes" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- Datatables css -->
        <link href="{{ asset('assets') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        @livewireStyles
    </head>

    <body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">

         @if( $isPortal)
        <!-- Topbar Start -->
        <div class="topbar-custom">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                            <li>
                                <button class="button-toggle-menu nav-link">
                                    <i data-feather="menu" class="noti-icon"></i>
                                </button>
                            </li>
                            <li class="d-none d-lg-block">
                                <div class="position-relative topbar-search">
                                    <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="Search...">
                                    <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <!-- <img src="assets/images/users/user-11.jpg" alt="user-image" class="rounded-circle"> -->
                                    <span class="pro-user-name ms-1">
                                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="#" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>My Account</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <!-- item-->
                                    <a href="/logout" class="dropdown-item notify-item">
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        <span>Logout</span>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>
            <!-- end Topbar -->

            @include('components.layouts.sidebar') <!-- Ensure this line is correct and the sidebar file exists -->

        @else
            <nav class="navbar navbar-expand-lg fixed-top nav sticky bg-white" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" class="card-logo card-logo-light" alt="logo dark" height="45">
                        <img src="{{ asset('assets/images/logo.png') }}" class="card-logo card-logo-dark" alt="logo light" height="45">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Form PPDB</a>
                            </li>
                            <li class="nav-item">
                                <a class=" btn btn-primary mt-2" href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    </div><!-- end collapse -->
                </div><!-- end container -->
            </nav>
         @endif
        <!-- Start Page Content here -->
        {{ $slot }}
        <!-- End Page content -->
    </div>
    <!-- END wrapper -->

    @if( $isPortal)
        <!-- Vendor -->
        <script src="{{ asset('assets') }}/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
        <script src="{{ asset('assets') }}/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="{{ asset('assets') }}/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="{{ asset('assets') }}/libs/feather-icons/feather.min.js"></script>

        <!-- Datatables js -->
        <script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>

        <!-- dataTables.bootstrap5 -->
        <script src="{{ asset('assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

        <!-- App js-->
        <script src="{{ asset('assets') }}/js/app.js"></script>

        <!-- Script Component-->
        @livewireScripts
        <!-- Apexcharts JS -->
        <script src="{{ asset('assets') }}/libs/apexcharts/apexcharts.min.js"></script>

        <script src="{{ asset('assets') }}/js/pages/dashboard.init.js"></script>
    @else
        @livewireScripts
    @endif

</body>
</html>
