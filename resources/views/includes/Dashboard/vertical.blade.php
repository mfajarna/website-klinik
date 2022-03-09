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
                                <a href="apps-chat.html">
                                    <i data-feather="message-square"></i>
                                    <span data-key="t-chat">Rekam Kerja Dokter dan Bidan</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="mail"></i>
                                    <span data-key="t-email">Data Pasien</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Upload Kegiatan</span>
                                </a>
                            </li>
                
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="users"></i>
                                    <span data-key="t-contacts">History Pengguna</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="trello"></i>
                                    <span data-key="t-tasks">Daftar Akun</span>
                                </a>
                            </li>

                            <li class="menu-title" data-key="t-menu">Dokter Menu</li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Data Dokter</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Jadwal Kerja</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Data Diagnosa Pasien</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Posyandu</span>
                                </a>
                            </li>

                            <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span data-key="t-calendar">Riwayat Pemeriksaan</span>
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
