<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    {{-- <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" /> --}}

</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid" style="background:url('{{ asset('storage/images') . '/' . $imagen->path }}');background-size:cover; background-position:center; background-repeat:no-repeat;">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="text-center mb-3">
                        <img src="{{ asset('images/logo2.png') }}" alt="" height="100">
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Inicio de sesión</h4>
                    <p class="text-muted mb-4">Introduzca su correo electrónico y contraseña para acceder a su cuenta.
                    </p>

                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{-- <a href="#" class="text-muted float-end"><small>Olvidaste tu contraseña?</small></a> --}}
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signin">Recuerdame</label>
                            </div>
                        </div>
                        <div class="d-grid mb-0 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Acceder
                            </button>
                        </div>
                    </form>
                    <!-- end form-->
                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        {{-- <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">I love the color!</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> It's a elegent templete. I love it very
                    much! . <i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    - Hyper Admin User
                </p>
            </div>
        </div> --}}
    </div>

    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
