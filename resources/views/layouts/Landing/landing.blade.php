<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('includes.Landing.meta')

        <title>@yield('title') | Klinik Citra Sehat</title>

        @stack('before-style')

        @include('includes.Landing.style')

        @stack('after-style')


    </head>

    <body data-layout="horizontal" data-topbar="dark" class="pace-done ">
        <div class="pace pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
          </div>
        <div class="pace-activity"></div></div>

        <div class="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24"> <span class="logo-txt">Website Klinik Citra</span>
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24"> <span class="logo-txt">Website Klinik Citra</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">

                        </div>

                        <div class="dropdown d-none d-sm-inline-block">

                        </div>

                        <div class="dropdown d-none d-sm-inline-block">

                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1">

                        </div>

                        <div class="dropdown d-inline-block">
 
                        </div>

                        <div class="dropdown d-inline-block">

                        </div>

                        <div class="dropdown d-inline-block">

                        </div>
            
                    </div>
                </div>
            </header>

            <div class="topnav active">
                <div class="container-fluid active">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu active">

                        <div class="collapse navbar-collapse active" id="topnav-menu-content">
                            <ul class="navbar-nav active">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none active" href="{{ route('index') }}" id="topnav-dashboard" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg><span data-key="t-dashboard">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('pendaftaran.index') }}" id="topnav-dashboard" role="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg><span data-key="t-extra-pages">Pendaftaran Pemeriksaan</span></div>
                                    </a>

                                </li>



                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            @include('sweetalert::alert')

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @stack('before-script')

        @include('includes.Landing.script')

        @stack('after-script')

    </body>
</html>