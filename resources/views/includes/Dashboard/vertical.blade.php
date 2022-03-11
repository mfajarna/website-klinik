            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>

                            <li>
                                <a href="{{ route('menu.dashboard.index') }}">
                                    <i data-feather="home"></i>
                                    <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            

                            <li class="menu-title" data-key="t-apps">Admin Menu</li>

                            <li>
                                <a href="{{ route('menu.dokter.index') }}">
                                    <i data-feather="shopping-cart"></i>
                                    <span data-key="t-ecommerce">Data Dokter</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.dokter-poli.index') }}">
                                    <i data-feather="message-square"></i>
                                    <span data-key="t-chat">Konfigurasi Dokter Poli</span>
                                </a>
                            </li>

                        

                            <li class="menu-title" data-key="t-menu">Dokter Menu</li>

                            

                            <li class="menu-title" data-key="t-apps">Konfigurasi Klinik</li>
                            <li>
                                <a href="{{ route('menu.poli.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Master Poli</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.antrian.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Konfigurasi Antrian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->
