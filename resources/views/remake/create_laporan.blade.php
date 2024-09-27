<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.9.2.custom/css/base/jquery-ui-1.9.2.custom.css') }}">
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
</head>


<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between p-2">
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
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}"
                                aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Buat Laporan</span>
                            </a>
                        </li>
                    </ul>
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
                                        <a href="./authentication-login.html"
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
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Tulis Notula</h5>
                        <div class="card">
                            <div class="card-body">
                                {{-- create notula --}}
                                <form class="needs-validation" action="{{ route('input_laporan') }}" method="POST"
                                    style="border-top: #006b1a 2px" enctype="multipart/form-data" novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Nama Rapat<span class="text-danger">*</span></label>
                                        <input type="text" value="Rapat" name="nama_rapat" class="form-control"
                                            required>
                                        <div class="invalid-feedback">
                                            Nama rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Tanggal Rapat<span class="text-danger">*</span><input name="tanggal_rapat"
                                            value="{{ date('m/d/Y') }}" type="text" class="fs__normal form-control"
                                            id="tanggal_rapat" required>
                                        <div class="invalid-feedback">
                                            Tanggal rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Jam Rapat<span class="text-danger">*</span><input name="jam_rapat"
                                            type="time" value="" class="fs__normal form-control"
                                            id="jam_rapat" required>
                                        <div class="invalid-feedback">
                                            Jam rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat<span class="text-danger">*</span></label>
                                        <input type="text" name="tempat" class="form-control" required
                                            value="Ruang A">
                                        <div class="invalid-feedback">
                                            Tempat rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Susunan Acara<span class="text-danger">*</span>
                                        <div id="su" class="mb-3">
                                        </div>
                                        <input id="validator_su" class="d-none" required>
                                        <div id="add-su-button" class="btn btn-primary">Tambah Susunan</div>
                                        <div class="invalid-feedback">
                                            Susunan acara harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pemimpin rapat<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="pemimpin_rapat" class="form-control" required
                                            value="Pak B">
                                        <div class="invalid-feedback">
                                            Pemimpin rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pencatat/Notulis<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="pencatat" class="form-control" required
                                            value="Pak C">
                                        <div class="invalid-feedback">
                                            Pencatat/Notulis harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Peserta rapat<span class="text-danger">*</span>
                                        <div id="pr" class="mb-3">
                                        </div>
                                        <input id="validator_pr" class="d-none" required>
                                        <div id="add-pr-button" class="btn btn-primary">Tambah Peserta Rapat</div>
                                        <div class="invalid-feedback">
                                            Peserta rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input type="checkbox"
                                            onclick="this.checked ? $('#container-KSM').removeClass('d-none') : $('#container-KSM').addClass('d-none')"
                                            class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Bersama dengan
                                            KSM</label>
                                    </div>
                                    <div class="row gap-2 mb-2" style="margin-left: 0.20rem!important">
                                        <div class="col-lg-5 col-sm-12 signature-pad-form fs__child m-0 p-0"
                                            id="form_tanda_tangan_pejabat">
                                            <label for="nama_jabatan_pejabat" class="fs__child  w-100">Jabatan pejabat
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_jabatan_pejabat"
                                                name="nama_jabatan_pejabat" class="form-control" required
                                                value="Ketua Prodi">
                                            <div class="invalid-feedback">
                                                Jabatan pejabat harus diisi.
                                            </div>
                                            <label for="tanda_tangan_pejabat" class="fs__child  w-100">Tanda tangan
                                                Pejabat<span class="text-danger">*</span></label>
                                            <input type="text" class="d-none" name="tanda_tangan_pejabat"
                                                id="tanda_tangan_pejabat" class="form-control" required>
                                            <canvas width="400px" class="signature-pad"
                                                id="canvas_tanda_tangan_pejabat"></canvas>
                                            <p><a href="#" class="btn"
                                                    id="clear_tanda_tangan_pejabat">Clear</a>
                                            </p>
                                            <div class="invalid-feedback">
                                                Tanda tangan pejabat harus diisi.
                                            </div>
                                            <label for="nama_pejabat" class="fs__child  w-100">Nama Pejabat
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_pejabat" name="nama_pejabat"
                                                class="form-control" required value="Pak D">
                                            <div class="invalid-feedback">
                                                Nama pejabat harus diisi.
                                            </div>
                                            <label for="NIP_pejabat" class="fs__child  w-100">NIP Pejabat
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="NIP_pejabat" name="NIP_pejabat"
                                                class="form-control" required value="25">
                                            <div class="invalid-feedback">
                                                NIP pejabat harus diisi.
                                            </div>
                                            {{-- <button class="submit-button" id="submit_tanda_tangan_pejabat">SUBMIT</button> --}}
                                        </div>
                                        <div id="container-KSM"
                                            class="col-lg-5 col-sm-12 signature-pad-form fs__child d-none m-0 p-0"
                                            id="form_tanda_tangan_ksm">
                                            <label for="nama_jabatan_KSM" class="fs__child  w-100">Jabatan Ketua KSM
                                                <span class="text-danger">*</span></label>
                                            <input type="text" value="Ketua KSM" id="nama_jabatan_KSM"
                                                name="nama_jabatan_KSM" class="form-control">
                                            <label for="tanda_tangan_ksm" class="fs__child  w-100">Tanda tangan
                                                KSM</label>
                                            <input type="text" class="d-none" name="tanda_tangan_ksm"
                                                id="tanda_tangan_ksm" class="form-control">
                                            <canvas width="400px" class="signature-pad"
                                                id="canvas_tanda_tangan_ksm"></canvas>
                                            <p><a href="#" class="btn" id="clear_tanda_tangan_ksm">Clear</a>
                                            </p>
                                            <label for="nama_KSM" class="fs__child  w-100">Nama Ketua KSM
                                            </label>
                                            <input type="text" id="nama_KSM" name="nama_KSM"
                                                class="form-control">
                                            <label for="NIP_KSM" class="fs__child  w-100">NIP Ketua KSM
                                            </label>
                                            <input type="text" id="NIP_KSM" name="NIP_KSM"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3 fs__child">
                                        <label for="bukti_presensi_kehadiran">Bukti presensi kehadiran<span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="bukti_presensi_kehadiran"
                                            id="bukti_presensi_kehadiran" class="form-control" id=""
                                            maxlength="1200" required></input>
                                        <div class="invalid-feedback">
                                            Bukti presensi harus diisi.
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3 fs__child">
                                        <label for="file_pendukung_rapat">File pendukung rapat</label>
                                        <input type="file" name="file_pendukung_rapat" id="file_pendukung_rapat"
                                            class="form-control" id="" maxlength="1200"></input>
                                        <div class="invalid-feedback">
                                            File pendukung harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Persoalan yang dibahas<span
                                                class="text-danger">*</span></label>
                                        <div>
                                            <label for="mahasiswa">Perihal Mahasiswa<span
                                                    class="text-danger">*</span><br><span class="fs__normal">Contoh :
                                                    mahasiswa bermasalah,
                                                    prestasi mahasiswa, dan segala hal lain yang berhubungan dengan
                                                    mahasiswa Fakultas
                                                    Kedokteran</span></label>
                                            <textarea name="mahasiswa" id="mahasiswa" class="form-control" id="" cols="30" rows="10"
                                                required></textarea>
                                            <div class="invalid-feedback">
                                                Perihal mahasiswa harus diisi.
                                            </div>
                                        </div>
                                        <div>
                                            <label for="dosen">Perihal Dosen<span class="text-danger">*</span>
                                                <br><span class="fs__normal">Contoh :
                                                    dosen
                                                    yang mengambil studi lanjut tidak kunjung selesai (siapa), dosen
                                                    berprestasi, dan segala hal lain
                                                    yang
                                                    berhubungan dengan dosen Fakultas Kedokteran</span></label>
                                            <textarea maxlength="1200" name="dosen" id="dosen" class="form-control" id="" cols="30"
                                                rows="10" required></textarea>
                                            <div class="invalid-feedback">
                                                Perihal dosen harus diisi.
                                            </div>
                                        </div>
                                        <div>
                                            <label for="tendik">Perihal Tendik<span
                                                    class="text-danger">*</span><br><span class="fs__normal">Contoh :
                                                    tendik
                                                    yang perlu diberi penghargaan karena dedikasinya, tendik yang
                                                    bermasalah (menolak tugas, tidak
                                                    mengerjakan tugas yang diberikan, memilih - milih pekerjaan, tidak
                                                    professional), dan segala hal
                                                    lain
                                                    yang berhubungan dengan tendik Fakultas Kedokteran</span></label>
                                            <textarea maxlength="1200" name="tendik" id="tendik" class="form-control" id="" cols="30"
                                                rows="10" required></textarea>
                                            <div class="invalid-feedback">
                                                Perihal tendik harus diisi.
                                            </div>
                                        </div>
                                        <div>
                                            <label for="sarpras">Perihal sarana prasarana<span
                                                    class="text-danger">*</span><br><span class="fs__normal">Contoh
                                                    : tindak lanjut perbaikan sarana prasarana yang rusak, kebutuhan
                                                    penunjang perkuliahan yang segera
                                                    dibutuhkan, dan segala hal lain yang berhubungan dengan sarana
                                                    prasarana di Fakultas
                                                    Kedokteran</span></label>
                                            <textarea maxlength="1200" name="sarpras" id="sarpras" class="form-control" id="" cols="30"
                                                rows="10" required></textarea>
                                            <div class="invalid-feedback">
                                                Perihal sarana prasarana harus diisi.
                                            </div>
                                        </div>
                                        <div>
                                            <label for="lain_lain">Lain-lain<br> <span class="fs__normal">Seluruh
                                                    perihal
                                                    yang tidak termasuk 4 perihal
                                                    diatas
                                                    dapat dituliskan disini</span></label>
                                            <textarea name="lain_lain" id="lain_lain" class="form-control" id="" cols="30" rows="10"
                                                maxlength="1200"> </textarea>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tanggapan_peserta_rapat">Tanggapan Peserta Rapat<span
                                                class="text-danger">*</span></label>
                                        <textarea maxlength="1200" name="tanggapan_peserta_rapat" id="tanggapan_peserta_rapat" class="form-control"
                                            cols="30" rows="10" required></textarea>
                                        <div class="invalid-feedback">
                                            Tanggapan peserta rapat harus diisi.
                                        </div>
                                    </div>
                                    <div>
                                        <label for="simpulan">Simpulan<span class="text-danger">*</span></label>
                                        <textarea maxlength="1200" name="simpulan" id="simpulan" class="form-control" cols="30" rows="10"
                                            required></textarea>
                                        <div class="invalid-feedback">
                                            Simpulan harus diisi.
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
    {{-- <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js') }}"></script>
    <script>
        $(function() {
            $("#tanggal_rapat").datepicker();
        });
    </script>
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
        class DynamicInputManager {
            constructor(containerId, addButtonId, className) {
                this.container = document.getElementById(containerId);
                this.addButton = document.getElementById(addButtonId);
                this.className = className;
                this.containerId = containerId;
                this.inputCount = 0;
                this.addButton.addEventListener('click', () => this.addInput());
            }

            addInput() {
                if (this.inputCount == 0) document.getElementById('validator_' + this.containerId).required = false
                // Increment input count
                this.inputCount++;

                // Create a div to hold the input and remove button
                const inputDiv = document.createElement('div');
                inputDiv.classList.add('mb-3', 'input-group');
                inputDiv.id = `input-group-${this.inputCount}`;


                // Numbering 
                const numbering = document.createElement('button');
                numbering.classList.add('btn', 'btn-primary');
                numbering.innerText = `${this.inputCount}.`;

                // Create the input element
                const input = document.createElement('input');
                input.type = 'text';
                input.name = this.className;
                input.required = true;
                input.classList.add('form-control');

                // Create the remove button
                const removeButton = document.createElement('button');
                removeButton.classList.add('btn', 'btn-danger');
                removeButton.innerText = 'Remove';
                removeButton.addEventListener('click', () => this.removeInput(inputDiv.id));

                // Append input and remove button to the div
                inputDiv.appendChild(numbering);
                inputDiv.appendChild(input);
                inputDiv.appendChild(removeButton);

                // Append the div to the container
                this.container.appendChild(inputDiv);
            }

            removeInput(inputDivId) {
                const inputDiv = document.getElementById(inputDivId);
                if (inputDiv) {
                    this.container.removeChild(inputDiv);
                }
                // Increment input count
                this.inputCount--;
                if (this.inputCount == 0) document.getElementById('validator_' + this.containerId).required = false
            }
        }
        // Initialize the manager
        document.addEventListener('DOMContentLoaded', () => {
            const dynamicInputManagerSu = new DynamicInputManager('su', 'add-su-button', 'susunan_acara[]');
            const dynamicInputManagerPr = new DynamicInputManager('pr', 'add-pr-button', 'peserta_rapat[]');
        });
        // Function create canvas
        function set_canvas(id) {
            const canvas = document.getElementById('canvas_' + id);
            const form = document.getElementById('form_' + id);
            const clearButton = document.getElementById('clear_' + id);
            const submit = document.getElementById('submit_' + id);
            const ctx = canvas.getContext('2d');
            var image = new Image();
            image.onload = function() {
                ctx.drawImage(image, 0, 0);
            };
            // generate dummy
            document.getElementById(id).value =
                'data:image/png;base64,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'
            image.src =
                'data:image/png;base64,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'
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
        set_canvas('tanda_tangan_pejabat')
        set_canvas('tanda_tangan_ksm')
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
                $('#simpulan').html(response)
            }
        });
        $.ajax({
            type: 'get',
            url: 'http://metaphorpsum.com/paragraphs/1/20',
            success: function(response) {
                $('#tanggapan_peserta_rapat').html(response)
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
</body>

</html>
