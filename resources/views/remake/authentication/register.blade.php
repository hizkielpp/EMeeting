<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Aplikasi EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
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
                                <form class="needs-validation" method="post" action="{{ route('register') }}"
                                    novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pengguna<br><span class="fs-12">nama
                                                lengkap dengan gelar</span></label>
                                        <input type="text" name="username" class="form-control bc" required>
                                        <div class="invalid-feedback">
                                            Nama pengguna harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Departemen/Prodi/Unit</label>
                                        <select name="fk_unit" class="form-control bc" id="" required>
                                            <option value="">--Pilih unit--</option>
                                            @foreach ($units as $value)
                                                <option value="{{ $value->id }}">{{ $value->nama_unit }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Nama Departemen/Prodi/Unit harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control bc" required>
                                        <div class="invalid-feedback">
                                            Email harus diisi.
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4">Registrasi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>
