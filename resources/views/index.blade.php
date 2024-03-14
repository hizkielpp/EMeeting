@extends('template')
@section('head')
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

        .btn-logout {
            background-color: rgb(95, 95, 95);
            color: white;
            max-width: 200px;
            position: fixed;
            right: 0.375rem;
            top: 0.75rem;
        }

        .welcoming {
            left: 0.375rem;
            top: 0.75rem;
        }
    </style>
    <script>
        $(function() {
            $("#tanggalrapat").datepicker();
        });
    </script>
@endsection
@section('body')
    <form class="row needs-validation m-0 p-3 rounded bg-white bg-opacity-75 " style="border-top: #006b1a 2px" novalidate>
        <div class="col-12 text-center fs__title mb-3">Formulir E-Meeting</div>
        <div class="col-12 mb-3">Form ini berfungsi untuk melaporkan hasil rapat yang sudah dilakukan di masing - masing
            Departemen maupun Program Studi</div>
        <div class="col-12 mb-3 fs__child">
            Tanggal Rapat<span class="text-danger">*</span><input type="text" class="fs__normal form-control"
                id="tanggalrapat" required>
            <div class="invalid-feedback">
                Tanggal harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="mahasiswa">Perihal Mahasiswa<span class="text-danger">*</span></label>
            <textarea name="mahasiswa" id="mahasiswa" class="form-control" id="" cols="30" rows="2" required></textarea>
            <div class="invalid-feedback">
                Perihal mahasiswa harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="dosen">Perihal Dosen<span class="text-danger">*</span></label>
            <textarea maxlength="1200" name="dosen" id="dosen" class="form-control" id="" cols="30"
                rows="2" required></textarea>
            <div class="invalid-feedback">
                Perihal dosen harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="tendik">Perihal Tendik<span class="text-danger">*</span></label>
            <textarea maxlength="1200" name="tendik" id="tendik" class="form-control" id="" cols="30"
                rows="2" required></textarea>
            <div class="invalid-feedback">
                Perihal tendik harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="sarpras">Perihal sarana prasarana<span class="text-danger">*</span></label>
            <textarea maxlength="1200" name="sarpras" id="sarpras" class="form-control" id="" cols="30"
                rows="2" required></textarea>
            <div class="invalid-feedback">
                Perihal sarana prasarana harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="lain-lain">Lain-lain</label>
            <textarea name="lain-lain" id="lain-lain" class="form-control" id="" cols="30" rows="2"
                maxlength="1200"></textarea>
            <div class="invalid-feedback">
                Perihal lain-lain harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="lain-lain">Bukti presensi kehadiran<span class="text-danger">*</span></label>
            <input type="file" name="lain-lain" id="lain-lain" class="form-control" id="" maxlength="1200"
                required></input>
            <div class="invalid-feedback">
                Bukti presensi harus diisi.
            </div>
        </div>
        <button class="btn btn-green" type="submit">Submit form</button>
    </form>
@endsection
@section('foot')
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
@endsection
