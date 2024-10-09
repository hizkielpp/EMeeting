<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.9.2.custom/css/base/jquery-ui-1.9.2.custom.css') }}">
    @yield('css')

    <style>
        .bc {
            color: black !important;
        }

        .fs-12 {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between p-5">
                    <a href="#" class="text-nowrap logo-img ml-2">
                        <img src="{{ asset('logo_undip.png') }}" width="100" alt="" />
                        <h2>EMeeting</h2>
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    @if (Auth::user()->role == 'pimpinan')
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('log_laporan_pimpinan') || Request::is('/') ? 'active' : '' }}"
                                    href="{{ route('monitor') }}" aria-expanded="false">
                                    <span>
                                        <iconify-icon icon="teenyicons:hd-screen-outline"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Monitor</span>
                                </a>
                            </li>
                        </ul>
                    @endif
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('create_laporan') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="teenyicons:cost-estimate-outline"></iconify-icon>
                                </span>
                                <span class="hide-menu">Buat Laporan</span>
                            </a>
                        </li>
                    </ul>
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('edit_password') ? 'active' : '' }}"
                                href="{{ route('edit_password') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="teenyicons:google-streetview-solid"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Ubah Password</span>
                            </a>
                        </li>
                    </ul>
                    @if (Auth::user()->role == 'bawahan')
                    @endif
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('log_laporan') || Request::is('edit_laporan') ? 'active' : '' }}"
                                href="{{ route('log_laporan') }}" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="teenyicons:history-outline"></iconify-icon>
                                </span>
                                <span class="hide-menu">Riwayat Laporan
                                </span>
                            </a>
                        </li>
                    </ul>
                    @if (Auth::user()->role == 'admin')
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('users') || Request::is('edit_user') ? 'active' : '' }}"
                                    href="{{ route('users') }}" aria-expanded="false">
                                    <span>
                                        <iconify-icon icon="teenyicons:address-book-solid"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Pengguna
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('units') ? 'active' : '' }}"
                                    href="{{ route('units') }}" aria-expanded="false">
                                    <span>
                                        <iconify-icon icon="mdi:building"></iconify-icon>
                                    </span>
                                    <span class="hide-menu">Unit
                                    </span>
                                </a>
                            </li>
                        </ul>
                    @endif
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <div class="mx-3 mt-2 d-block">
                                            Halo <br>{{ Auth::user()->username }}</div>

                                        <a href="{{ route('logout.perform') }}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    @yield('content')
                </div>
                <div class="py-6 px-6 text-center">
                    <p class="mb-0 fs-4">Developed by IT FK UNDIP</p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="{{ asset('jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js') }}"></script>
    @yield('js')
</body>

</html>
