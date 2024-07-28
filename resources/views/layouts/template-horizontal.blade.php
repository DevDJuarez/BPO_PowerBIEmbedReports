<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema') }}</title>

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    {{-- <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /> --}}
    @yield('css')

</head>

<body class="loading" data-layout="topnav"
    data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": true}'>
    <div class="wrapper">
        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom topnav-navbar">
                    <div class="container-fluid">

                        <!-- LOGO -->
                        <a href="" class="topnav-logo">
                            <span class="topnav-logo-lg">
                                <img src="{{ asset('images/logo2.png') }}" alt="" height="50">
                            </span>
                            <span class="topnav-logo-sm">
                                <img src="{{ asset('images/logo2.png') }}" alt="" height="50">
                            </span>
                        </a>

                        <ul class="list-unstyled topbar-menu float-end mb-0">

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                    id="topbar-userdrop" href="#" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}"
                                            alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                                        <span class="account-position">Suscriptor</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                                    aria-labelledby="topbar-userdrop">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Bienvenido !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{ route('business.perfil.show') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Mi Cuenta</span>
                                    </a>
                                    <!-- item-->
                                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Cerrar Sesión</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        </ul>
                        <a class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end Topbar -->
                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('contenido')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © DJ
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
    </div>
    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    @yield('js')
</body>

</html>
