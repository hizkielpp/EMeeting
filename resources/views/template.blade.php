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
            /* The image used */
            background-image: url("img/bg_primary.webp");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: repeat;
            background-size: cover;
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

<body class="bg p-5">
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-warning" role="alert">
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::get('success', false))
        <?php $data = Session::get('success'); ?>
        @if (is_array($data))
            @foreach ($data as $msg)
                <div class="alert alert-warning" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $msg }}
                </div>
            @endforeach
        @else
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
    @endif
    @if (Auth::check())
        <div class="dropdown">
            <i class="fa-solid fa-bars btn btn-menu fs__title" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-item fs__child">Hai Prodi Kedokteran</li>
                <li><a class="dropdown-item fs__child {{ Request::is('/*') ? 'active' : '' }}"
                        href="{{ url('/') }}"><i class="fa-solid fa-sheet-plastic"></i>
                        Tulis
                        Laporan</a></li>
                <li><a class="dropdown-item fs__child {{ Request::is('riwayatLaporan*') ? 'active' : '' }}"
                        href="{{ url('riwayatLaporan') }}"><i class="fa fa-history" aria-hidden="true"></i>
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
