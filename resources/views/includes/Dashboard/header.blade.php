<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('menu.dashboard.index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('/public/assets/images/LogoKlinikCS.jpg')}}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/public/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24"> <span class="logo-txt">Klinik Citra</span>
                    </span>
                </a>

                <a href="{{ route('menu.dashboard.index') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('/public/assets/images/LogoKlinikCS.jpg')}}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('/public/assets/images/LogoKlinikCS.jpg')}}" alt="" height="24"> <span class="logo-txt">Klinik Citra</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->

        </div>

        <div class="d-flex">




            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ url('/public/assets/images/users/avatar-1.jpg')}}"
                        alt="Header Avatar">       
                      
                    @if (Auth::user()->role == "admin")
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                        
                    @else
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                        
                    @endif
                    
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock font-size-16 align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onClick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                
                
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>