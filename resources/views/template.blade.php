<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.9.2.custom/css/base/jquery-ui-1.9.2.custom.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.1-web/css/all.min.css') }}">
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js') }}"></script>
    <style>
        .bg {
            /* Background Color */
            background-color: #97da94;
        }

        .fs__title {
            font-size: 40px;
        }

        .fs__child {
            font-size: 20px;
        }

        .fs__normal {
            font-size: 16px;
        }

        .btn-green {
            background-color: #006b1a;
            color: white;
            max-width: 200px;
        }

        .btn-menu {
            background-color: rgb(95, 95, 95);
            color: white;
            max-width: 200px;
            position: fixed;
            right: 0.375rem;
            top: 0.75rem;
        }
    </style>
    @yield('head')
</head>

<body class="bg p-5 @yield('class-body') ">
    @if (Auth::check())
        <div class="dropdown">
            <i class="fa-solid fa-bars btn btn-menu fs__title" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-item fs__child">Hai Prodi Kedokteran</li>
                <li><a class="dropdown-item fs__child {{ Request::is('/*') ? 'active' : '' }}"
                        href="{{ url('/') }}"><i class="fa-solid fa-sheet-plastic"></i>
                        Tulis
                        Laporan</a></li>
                <li><a class="dropdown-item fs__child {{ Request::is('riwayat_laporan*') ? 'active' : '' }}"
                        href="{{ url('riwayat_laporan') }}"><i class="fa fa-history" aria-hidden="true"></i>
                        Riwayat
                        Laporan</a></li>
                <li><a class="dropdown-item fs__child" href="{{ url('logout') }}"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>
                        Logout</a>
                </li>
            </ul>
        </div>
    @endif
    @yield('body')
</body>
<script></script>
@yield('foot')


</html>
