@extends('template')
@section('head')
    <style>
        :root {
            --primary-color: #000;
        }

        .signature-pad-form {
            touch-action: none;
            background-color: white;
        }

        .signature-pad {
            /* cursor: pointer; */
            border: 2px solid var(--primary-color);
            border-radius: 4px;
        }

        .clear-button {
            color: var(--primary-color);
        }

        .submit-button {
            width: 100%;
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1rem;
            color: #fff;
            cursor: pointer;
            margin-top: 2rem;
        }
    </style>
    <script>
        $(function() {
            $("#tanggal_rapat").datepicker();
        });
    </script>
@endsection
@section('body')
    <form class="row shadow needs-validation m-0 p-3 mx-5 rounded bg-white bg-opacity-75"
        action="{{ route('input_laporan') }}" method="POST" style="border-top: #006b1a 2px" enctype="multipart/form-data"
        novalidate>
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
                    yang mengambil studi lanjut tidak kunjung selesai (siapa), dosen berprestasi, dan segala hal lain
                    yang
                    berhubungan dengan dosen Fakultas Kedokteran</span></label>
            <textarea maxlength="1200" name="dosen" id="dosen" class="form-control" id="" cols="30"
                rows="10" required></textarea>
            <div class="invalid-feedback">
                Perihal dosen harus diisi.
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="tendik">Perihal Tendik<span class="text-danger">*</span><span class="fs__normal">Contoh :
                    tendik
                    yang perlu diberi penghargaan karena dedikasinya, tendik yang bermasalah (menolak tugas, tidak
                    mengerjakan tugas yang diberikan, memilih - milih pekerjaan, tidak professional), dan segala hal
                    lain
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
            <label for="lain_lain">Lain-lain <span class="fs__normal">Seluruh perihal yang tidak termasuk 4 perihal
                    diatas
                    dapat dituliskan disini</span></label>
            <textarea name="lain_lain" id="lain_lain" class="form-control" id="" cols="30" rows="10"
                maxlength="1200"> </textarea>
        </div>
        <div class="col-6 mb-3 fs__child">
            <label for="bukti_presensi_kehadiran">Bukti presensi kehadiran<span class="text-danger">*</span></label>
            <input type="file" name="bukti_presensi_kehadiran" id="bukti_presensi_kehadiran" class="form-control"
                id="" maxlength="1200" required></input>
            <div class="invalid-feedback">
                Bukti presensi harus diisi.
            </div>
        </div>
        <div class="col-6 mb-3 fs__child">
            <label for="file_pendukung_rapat">File pendukung rapat</label>
            <input type="file" name="file_pendukung_rapat" id="file_pendukung_rapat" class="form-control" id=""
                maxlength="1200"></input>
            <div class="invalid-feedback">
                File pendukung harus diisi.
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 signature-pad-form fs__child" id="form_tanda_tangan_kaprodi">
            <label for="tanda_tangan_kaprodi" class=" w-100 fs__child">Tanda tangan ketua program studi<span
                    class="text-danger">*</span></label>
            <input type="text" class="d-none" name="tanda_tangan_kaprodi" id="tanda_tangan_kaprodi" class="form-control"
                required>
            <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_kaprodi"></canvas>
            <p><a href="#" class="btn" id="clear_tanda_tangan_kaprodi">Clear</a></p>
            <div class="invalid-feedback">
                Tanda tangan kepala program studi harus diisi.
            </div>
            {{-- <button class="submit-button" id="submit_tanda_tangan_kaprodi">SUBMIT</button> --}}
        </div>
        <div class="col-lg-6 col-sm-12 signature-pad-form fs__child" id="form_tanda_tangan_kadep">
            <label for="tanda_tangan_kaprodi" class="fs__child  w-100">Tanda tangan ketua program studi<span
                    class="text-danger">*</span></label>
            <input type="text" class="d-none" name="tanda_tangan_kadep" id="tanda_tangan_kadep" class="form-control"
                required>
            <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_kadep"></canvas>
            <p><a href="#" class="btn" id="clear_tanda_tangan_kadep">Clear</a></p>
            <div class="invalid-feedback">
                Tanda tangan kepala departemen harus diisi.
            </div>
            {{-- <button class="submit-button" id="submit_tanda_tangan_kadep">SUBMIT</button> --}}
        </div>
        <button class="btn btn-green" type="submit">Submit
            form</button>
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
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#mahasiswa').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#dosen').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#tendik').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#sarpras').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#lain_lain').html(response)
            }
        });
    </script>
    <script>
        function set_canvas(id) {
            const canvas = document.getElementById('canvas_' + id);
            const form = document.getElementById('form_' + id);
            const clearButton = document.getElementById('clear_' + id);
            const submit = document.getElementById('submit_' + id);
            const ctx = canvas.getContext('2d');
            let writingMode = false;
            const handlePointerDown = (event) => {
                writingMode = true;
                ctx.beginPath();
                const [positionX, positionY] = getCursorPosition(event);
                ctx.moveTo(positionX, positionY);
            }
            const handlePointerUp = () => {
                writingMode = false;
            }
            const handlePointerMove = (event) => {
                if (!writingMode) return
                const [positionX, positionY] = getCursorPosition(event);
                ctx.lineTo(positionX, positionY);
                ctx.stroke();
                document.getElementById(id).value = canvas.toDataURL()
                // const imageURL = canvas.toDataURL();
            }
            const getCursorPosition = (event) => {
                positionX = event.clientX - event.target.getBoundingClientRect().x;
                positionY = event.clientY - event.target.getBoundingClientRect().y;
                console.log(positionX, positionY)
                return [positionX, positionY];
            }
            canvas.addEventListener('pointerdown', handlePointerDown, {
                passive: true
            });
            canvas.addEventListener('pointerup', handlePointerUp, {
                passive: true
            });
            canvas.addEventListener('pointermove', handlePointerMove, {
                passive: true
            });

            ctx.lineWidth = 3;
            ctx.lineJoin = ctx.lineCap = 'round';

            const clearPad = () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
            }
            clearButton.addEventListener('click', (event) => {
                event.preventDefault();
                document.getElementById(id).value = ''
                clearPad();
            })
        }
        set_canvas('tanda_tangan_kaprodi')
        set_canvas('tanda_tangan_kadep')
    </script>
@endsection
