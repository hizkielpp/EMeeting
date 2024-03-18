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
    <form class="row needs-validation m-0 p-3 mx-5 rounded bg-white bg-opacity-75" action="{{ route('input_laporan') }}"
        method="POST" style="border-top: #006b1a 2px" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="col-12 text-center fs__title mb-3">Formulir E-Meeting</div>
        <div class="col-12 mb-3">Form ini berfungsi untuk melaporkan hasil rapat yang sudah dilakukan di masing - masing
            Departemen maupun Program Studi</div>
        <div class="col-12 mb-3 fs__child">
            Tanggal Rapat<span class="text-danger">*</span><input name="tanggal_rapat" value="03/19/2024" type="text"
                class="fs__normal form-control" id="tanggal_rapat" required>
            <div class="invalid-feedback">
                Tanggal harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="mahasiswa">Perihal Mahasiswa<span class="text-danger">*</span><br><span class="fs__normal">Contoh :
                    mahasiswa bermasalah,
                    prestasi mahasiswa, dan segala hal lain yang berhubungan dengan mahasiswa Fakultas
                    Kedokteran</span></label>
            <textarea name="mahasiswa" id="mahasiswa" class="form-control" id="" cols="30" rows="10" required></textarea>
            <div class="invalid-feedback">
                Perihal mahasiswa harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="dosen">Perihal Dosen<span class="text-danger">*</span><span class="fs__normal">Contoh : dosen
                    yang mengambil studi lanjut tidak kunjung selesai (siapa), dosen berprestasi, dan segala hal lain yang
                    berhubungan dengan dosen Fakultas Kedokteran</span></label>
            <textarea maxlength="1200" name="dosen" id="dosen" class="form-control" id="" cols="30"
                rows="10" required></textarea>
            <div class="invalid-feedback">
                Perihal dosen harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="tendik">Perihal Tendik<span class="text-danger">*</span><span class="fs__normal">Contoh : tendik
                    yang perlu diberi penghargaan karena dedikasinya, tendik yang bermasalah (menolak tugas, tidak
                    mengerjakan tugas yang diberikan, memilih - milih pekerjaan, tidak professional), dan segala hal lain
                    yang berhubungan dengan tendik Fakultas Kedokteran</span></label>
            <textarea maxlength="1200" name="tendik" id="tendik" class="form-control" id="" cols="30"
                rows="10" required></textarea>
            <div class="invalid-feedback">
                Perihal tendik harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="sarpras">Perihal sarana prasarana<span class="text-danger">*</span><span class="fs__normal">Contoh
                    : tindak lanjut perbaikan sarana prasarana yang rusak, kebutuhan penunjang perkuliahan yang segera
                    dibutuhkan, dan segala hal lain yang berhubungan dengan sarana prasarana di Fakultas
                    Kedokteran</span></label>
            <textarea maxlength="1200" name="sarpras" id="sarpras" class="form-control" id="" cols="30"
                rows="10" required></textarea>
            <div class="invalid-feedback">
                Perihal sarana prasarana harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="lain-lain">Lain-lain <span class="fs__normal">Seluruh perihal yang tidak termasuk 4 perihal diatas
                    dapat dituliskan disini</span></label>
            <textarea name="lain-lain" id="lain-lain" class="form-control" id="" cols="30" rows="10"
                maxlength="1200"> </textarea>
        </div>
        <div class="col-3 mb-3 fs__child">
            <label for="bukti_presensi">Bukti presensi kehadiran<span class="text-danger">*</span></label>
            <input type="file" name="bukti_presensi" id="bukti_presensi" class="form-control" id=""
                maxlength="1200" required></input>
            <div class="invalid-feedback">
                Bukti presensi harus diisi.
            </div>
        </div>
        <div class="col-3 mb-3 fs__child">
            <label for="file_pendukung">File pendukung rapat</label>
            <input type="file" name="file_pendukung" id="file_pendukung" class="form-control" id=""
                maxlength="1200"></input>
            <div class="invalid-feedback">
                File pendukung harus diisi.
            </div>
        </div>
        <div class="col-3 mb-3 fs__child">
            <label for="tanda_tangan_kadep">Tanda tangan ketua departemen<span class="text-danger">*</span></label>
            <input type="file" name="tanda_tangan_kadep" id="tanda_tangan_kadep" class="form-control" id=""
                maxlength="1200" required></input>
            <div class="invalid-feedback">
                Tanda tangan ketua program studi harus diisi.
            </div>
        </div>
        <div class="col-3 mb-3 fs__child">
            <label for="tanda_tangan_kaprodi">Tanda tangan ketua program studi<span class="text-danger">*</span></label>
            <input type="file" name="tanda_tangan_kaprodi" id="tanda_tangan_kaprodi" class="form-control"
                id="" maxlength="1200" required></input>
            <div class="invalid-feedback">
                Tanda tangan ketua program studi harus diisi.
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
    <script>
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/3/50',
            success: function(response) {
                $('#mahasiswa').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/3/50',
            success: function(response) {
                $('#dosen').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/3/50',
            success: function(response) {
                $('#tendik').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/3/50',
            success: function(response) {
                $('#sarpras').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/3/50',
            success: function(response) {
                $('#lain-lain').html(response)
            }
        });
    </script>
@endsection
