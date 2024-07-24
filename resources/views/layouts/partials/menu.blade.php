<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('home') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/logo2.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo2.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        @if (auth()->user()->empresa_id == null)


        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Administración</li>
            <li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Inicio </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('usuarios.index') }}" class="side-nav-link">
                    <i class="uil-user"></i>
                    <span> Usuarios </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('empresas.index') }}" class="side-nav-link">
                    <i class="uil-building"></i>
                    <span> Empresas </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Configuración</li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                    aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <i class="uil-bright"></i>
                    <span> General </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('login.imagen') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--
            <li class="side-nav-item">
                <a href="widgets.html" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span> Widgets </span>
                </a>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                    aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                                aria-controls="sidebarSecondLevel">
                                <span> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                                aria-controls="sidebarThirdLevel">
                                <span> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                            aria-controls="sidebarFourthLevel">
                                            <span> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
        @endif
    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
