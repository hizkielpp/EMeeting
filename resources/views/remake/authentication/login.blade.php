<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <style>
        .bc {
            color: black !important;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('logo_undip.png') }}" width="150" alt="">
                                </div>
                                <p class="text-center h2">EMeeting</p>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" name="username" class="form-control bc"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input id="password" type="password" name="password"
                                                class="form-control bc">
                                            <iconify-icon class="input-group-text"
                                                onclick="if($('#password').attr('type')=='password'){$('#password').attr('type','text');this.icon ='mdi:eye';}else{$('#password').attr('type','password');this.icon ='mdi:eye-off';};"
                                                style="cursor: pointer" icon="mdi:eye-off"></iconify-icon>
                                            {{-- <iconify-icon class="input-group-text" style="cursor: pointer"
                                                icon="mdi:eye-off"></iconify-icon> --}}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign
                                        In</button>
                                    <span class="text-center">Hubungi IT Fakultas Kedokteran untuk penanganan lupa
                                        password</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
