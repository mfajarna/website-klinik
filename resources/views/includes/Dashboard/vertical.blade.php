            <!-- ========== Left Sidebar Start ========== -->

            @if (Auth::user()->role == "superadmin")
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
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="menu-title" data-key="t-apps">Customer Service Menu</li>

                            <li>
                                <a href="{{ route('menu.admin.index') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Data Customer Service</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.dokter.index') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Data Dokter</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.dokter-poli.index') }}">
                                    <i data-feather="settings"></i>
                                    <span data-key="t-chat">Konfigurasi Dokter Poli</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{ route('menu.upload-kegiatan.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Upload Jadwal Kegiatan</span>
                                </a>
                            </li>

                           <li class="menu-title" data-key="t-menu">Dokter Menu</li>
                           <li>
                            <a href="{{ route('menu.absensi-dokter.index') }}">
                                <i data-feather="users"></i>
                                <span data-key="t-calendar">Absensi Dokter</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ route('menu.riwayat-kesehatan.index') }}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-calendar">Riwayat Kesehatan Pasien</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>     
            @endif

            @if (Auth::user()->role == 'dokter')
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
                        

                           <li class="menu-title" data-key="t-menu">Dokter Menu</li>
                           <li>
                            <a href="{{ route('menu.absensi-dokter.index') }}">
                                <i data-feather="users"></i>
                                <span data-key="t-calendar">Absensi Dokter</span>
                            </a>
                        </li>
                            <li>
                                <a href="{{ route('menu.riwayat-kesehatan.index') }}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-calendar">Riwayat Kesehatan Pasien</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>  
            @endif

            @if (Auth::user()->role == 'admin')
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                           
                            <li class="menu-title" data-key="t-menu">Dokter Menu</li>

                            <li>
                                <a href="{{ route('menu.dokter.index') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Pendaftaran Dokter</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{ route('menu.dokter.alldokter') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Data Dokter</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.absensi-dokter.index') }}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-calendar">Kehadiran Dokter</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.dokter-poli.index') }}">
                                    <i data-feather="settings"></i>
                                    <span data-key="t-chat">Konfigurasi Dokter Poli</span>
                                </a>
                            </li>
                            
                            <li class="menu-title" data-key="t-apps">Pasien Menu</li>


                            <li>
                                <a href="{{ route('menu.pendaftaran.index') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Pendaftaran Pasien</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.pendaftaran.allpasien') }}">
                                    <i data-feather="user"></i>
                                    <span data-key="t-ecommerce">Data Pasien</span>
                                </a>
                            </li>


                            <li class="menu-title" data-key="t-apps">Konfigurasi Klinik</li>
                            <li>
                                <a href="{{ route('menu.poli.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Master Poli</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('menu.antrian.index') }}">
                                    <i data-feather="settings"></i>
                                    <span data-key="t-calendar">Konfigurasi Antrian</span>
                                </a>
                            </li>

                            <li class="mt-4">
                                <a href="{{ route('menu.upload-kegiatan.index') }}">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Upload Jadwal Kegiatan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>  
            @endif

            @if (Auth::user()->role == 'pasien')
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
                        

                           <li class="menu-title" data-key="t-menu">Pasien Menu</li>
                            <li>
                                <a href="{{ route('menu.daftar-berobat.index') }}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-calendar">Daftar Berobat</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('menu.riwayat-berobat-pasien.index') }}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-calendar">Riwayat Berobat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>  
            @endif

            <!-- Left Sidebar End -->
