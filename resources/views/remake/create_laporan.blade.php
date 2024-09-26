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
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="../assets/images/logos/logo-light.svg" alt="" />
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
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">UI COMPONENTS</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Buttons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Alerts</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Card</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Forms</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:text-field-focus-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Typography</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6"
                                class="fs-6"></iconify-icon>
                            <span class="hide-menu">AUTH</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:user-plus-rounded-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Register</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"
                                class="fs-6"></iconify-icon>
                            <span class="hide-menu">EXTRA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone"
                                        class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Icons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:planet-3-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Sample Page</span>
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
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Rapat</label>
                                        <input type="text" name="nama_rapat" class="form-control">
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Tanggal Rapat<span class="text-danger">*</span><input name="tanggal_rapat"
                                            value="03/19/2024" type="text" class="fs__normal form-control"
                                            id="tanggal_rapat" required>
                                        <div class="invalid-feedback">
                                            Tanggal harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Jam Rapat<span class="text-danger">*</span><input name="tanggal_rapat"
                                            type="time" class="fs__normal form-control" id="jam_rapat" required>
                                        <div class="invalid-feedback">
                                            Jam rapat harus diisi.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat</label>
                                        <input type="text" name="tempat" class="form-control">
                                    </div>
                                    <div class="mb-3 fs__child form-label">
                                        Susunan Acara<span class="text-danger">*</span>
                                        <div id="su" class="mb-3"></div>
                                        <div id="add-su-button" class="btn btn-primary">Tambah Susunan</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pemimpin rapat</label>
                                        <input type="text" name="pemimpin_rapat" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pencatat/Notulis</label>
                                        <input type="text" name="pencatat" class="form-control">
                                    </div>

                                    <div class="mb-3 fs__child form-label">
                                        Peserta rapat<span class="text-danger">*</span>
                                        <div id="pr" class="mb-3"></div>
                                        <div id="add-pr-button" class="btn btn-primary">Tambah Peserta Rapat</div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6 col-sm-12 signature-pad-form fs__child"
                                            id="form_tanda_tangan_kadep">
                                            <label for="nama_jabatan_pejabat" class="fs__child  w-100">Jabatan
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_jabatan_pejabat"
                                                name="nama_jabatan_pejabat" class="form-control">
                                            <label for="tanda_tangan_kadep" class="fs__child  w-100">Tanda tangan
                                                Pejabat<span class="text-danger">*</span></label>
                                            <input type="text" class="d-none" name="tanda_tangan_kadep"
                                                id="tanda_tangan_kadep" class="form-control" required>
                                            <canvas width="400px" class="signature-pad"
                                                id="canvas_tanda_tangan_kadep"></canvas>
                                            <p><a href="#" class="btn"
                                                    id="clear_tanda_tangan_kadep">Clear</a>
                                            </p>
                                            <div class="invalid-feedback">
                                                Tanda tangan kepala departemen harus diisi.
                                            </div>
                                            <label for="nama_pejabat" class="fs__child  w-100">Nama Pejabat
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="nama_pejabat" name="nama_pejabat"
                                                class="form-control">
                                            <label for="NIP_pejabat" class="fs__child  w-100">NIP Pejabat
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="NIP_pejabat" name="NIP_pejabat"
                                                class="form-control">
                                            {{-- <button class="submit-button" id="submit_tanda_tangan_kadep">SUBMIT</button> --}}
                                        </div>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox"
                                                onclick="if(this.checked)? $('#container-KSM').addClass('d-none') : $('#container-KSM').removeClass('d-none')"
                                                class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Bersama dengan
                                                KSM</label>
                                        </div>
                                        <div id="container-KSM"
                                            class="col-lg-6 col-sm-12 signature-pad-form fs__child d-none"
                                            id="form_tanda_tangan_ksm">
                                            <label for="tanda_tangan_ksm" class="fs__child  w-100">Tanda tangan
                                                KSM</label>
                                            <input type="text" class="d-none" name="tanda_tangan_ksm"
                                                id="tanda_tangan_ksm" class="form-control" required>
                                            <canvas width="400px" class="signature-pad"
                                                id="canvas_tanda_tangan_ksm"></canvas>
                                            <p><a href="#" class="btn" id="clear_tanda_tangan_ksm">Clear</a>
                                            </p>
                                            <div class="invalid-feedback">
                                                Tanda tangan kepala departemen harus diisi.
                                            </div>
                                            {{-- <button class="submit-button" id="submit_tanda_tangan_kadep">SUBMIT</button> --}}
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        class DynamicInputManager {
            constructor(containerId, addButtonId, className) {
                this.container = document.getElementById(containerId);
                this.addButton = document.getElementById(addButtonId);
                this.className = className;
                this.inputCount = 0;
                this.addButton.addEventListener('click', () => this.addInput());
            }

            addInput() {
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
        set_canvas('tanda_tangan_kadep')
        set_canvas('tanda_tangan_ksm')
    </script>
    </script>
</body>

</html>
