@extends('remake.template')
@section('css')
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
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ubah Notula</h5>
            {{-- create notula --}}
            <form class="needs-validation" action="{{ route('update_laporan') }}" method="POST" style="border-top: #006b1a 2px"
                enctype="multipart/form-data" novalidate>
                @method('PUT')
                @csrf
                <input type="hidden" name="id_laporan" value="{{ $laporan->id }}">
                <div class="mb-3">
                    <label class="form-label">Nama Rapat<span class="text-danger">*</span></label>
                    <input type="text" name="nama_rapat" class="form-control bc" value="{{ $laporan->nama_rapat }}"
                        required>
                    <div class="invalid-feedback">
                        Nama rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Rapat<span class="text-danger">*</span></label>
                    <input name="tanggal_rapat" type="text" class="form-control bc" id="tanggal_rapat"
                        value="{{ date('d/m/Y', strtotime($laporan->tanggal_rapat)) }}" required>
                    <div class="invalid-feedback">
                        Tanggal rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3 ">
                    <label class="form-label">Jam Rapat<span class="text-danger">*</span></label>
                    <input name="jam_rapat" type="time" class="form-control bc" id="jam_rapat"
                        value="{{ date('H:i', strtotime($laporan->tanggal_rapat)) }}" required>
                    <div class="invalid-feedback">
                        Jam rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat<span class="text-danger">*</span></label>
                    <input type="text" name="tempat" class="form-control bc" required value="{{ $laporan->tempat }}">
                    <div class="invalid-feedback">
                        Tempat rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Susunan Acara<span class="text-danger">*</span></label>
                    <div id="su" class="mb-3">
                    </div>
                    <input id="validator_su" class="d-none" required>
                    <div id="add-su-button" class="btn btn-primary">Tambah Susunan</div>
                    <div class="invalid-feedback">
                        Susunan acara harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pemimpin rapat<span class="text-danger">*</span></label>
                    <input type="text" name="pemimpin_rapat" class="form-control bc" required
                        value="{{ $laporan->pemimpin_rapat }}">
                    <div class="invalid-feedback">
                        Pemimpin rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pencatat/Notulis<span class="text-danger">*</span></label>
                    <input type="text" name="pencatat" class="form-control bc" required value="{{ $laporan->pencatat }}">
                    <div class="invalid-feedback">
                        Pencatat/Notulis harus diisi.
                    </div>
                </div>
                <div class="mb-3 form-label">
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
                        class="form-check-input" id="exampleCheck1"
                        {{ is_null($laporan->tanda_tangan_KSM) ? '' : 'checked' }}>
                    <label class="form-check-label form-label" for="exampleCheck1">Bersama dengan
                        KSM</label>
                </div>
                <div class="row gap-2 mb-2" style="margin-left: 0.20rem!important">
                    <div class="col-lg-5 col-sm-12 signature-pad-form m-0 p-0" id="form_tanda_tangan_pejabat">
                        <label for="nama_jabatan_pejabat" class="w-100 form-label">Jabatan pejabat
                            <span class="text-danger">*</span></label>
                        <input type="text" id="nama_jabatan_pejabat" name="nama_jabatan_pejabat" class="form-control bc"
                            required value="{{ $laporan->nama_jabatan_pejabat }}">
                        <div class="invalid-feedback">
                            Jabatan pejabat harus diisi.
                        </div>
                        <label for="tanda_tangan_pejabat" class="w-100 form-label mt-2">Tanda tangan
                            Pejabat<span class="text-danger">*</span></label>
                        <input type="text" class="d-none " name="tanda_tangan_pejabat" id="tanda_tangan_pejabat"
                            class="form-control" required>
                        <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_pejabat"></canvas>
                        <p><a href="#" class="btn" id="clear_tanda_tangan_pejabat">Clear</a>
                        </p>
                        <div class="invalid-feedback">
                            Tanda tangan pejabat harus diisi.
                        </div>
                        <label for="nama_pejabat" class="w-100 form-label">Nama Pejabat
                            <span class="text-danger">*</span></label>
                        <input type="text" id="nama_pejabat" name="nama_pejabat" class="form-control bc" required
                            value="{{ $laporan->nama_pejabat }}">
                        <div class="invalid-feedback">
                            Nama pejabat harus diisi.
                        </div>
                        <label for="NIP_pejabat" class="w-100 form-label mt-2">NIP Pejabat
                            <span class="text-danger">*</span></label>
                        <input type="text" id="NIP_pejabat" name="NIP_pejabat" class="form-control bc" required
                            value="25">
                        <div class="invalid-feedback">
                            NIP pejabat harus diisi.
                        </div>
                        {{-- <button class="submit-button" id="submit_tanda_tangan_pejabat">SUBMIT</button> --}}
                    </div>
                    <div id="container-KSM"
                        class="col-lg-5 col-sm-12 signature-pad-form {{ is_null($laporan->tanda_tangan_KSM) ? 'd-none' : '' }}  m-0 p-0"
                        id="form_tanda_tangan_ksm">
                        <label for="nama_jabatan_KSM" class="w-100 form-label">Jabatan Ketua KSM
                            <span class="text-danger">*</span></label>
                        <input type="text" id="nama_jabatan_KSM" name="nama_jabatan_KSM" class="form-control bc"
                            value="{{ is_null($laporan->nama_jabatan_KSM) ? '' : $laporan->nama_jabatan_KSM }}">
                        <label for="tanda_tangan_ksm" class="w-100 form-label mt-2">Tanda tangan
                            KSM</label>
                        <input type="text" class="d-none" name="tanda_tangan_KSM" id="tanda_tangan_ksm"
                            class="form-control">
                        <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_ksm"></canvas>
                        <p><a href="#" class="btn" id="clear_tanda_tangan_ksm">Clear</a>
                        </p>
                        <label for="nama_KSM" class="w-100 form-label">Nama Ketua KSM
                        </label>
                        <input type="text" id="nama_KSM" name="nama_KSM" class="form-control bc"
                            value="{{ is_null($laporan->nama_KSM) ? '' : $laporan->nama_KSM }}">
                        <label for="NIP_KSM" class="w-100 form-label mt-2">NIP Ketua KSM
                        </label>
                        <input type="text" id="NIP_KSM" name="NIP_KSM" class="form-control bc"
                            value="{{ is_null($laporan->NIP_KSM) ? '' : $laporan->NIP_KSM }}">
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <label for="bukti_presensi_kehadiran" class="form-label">Bukti presensi kehadiran
                        <br>Upload ulang apabila ingin mengubah gambar yang tersimpan
                    </label>
                    <input type="file" name="bukti_presensi_kehadiran" id="bukti_presensi_kehadiran"
                        class="form-control bc" id="" maxlength="1200"
                        accept=“.png,.jpg,.jpeg,.webp,image/png”></input>
                    <div class="invalid-feedback">
                        Bukti presensi harus diisi.
                    </div>
                </div>
                <img src="{{ asset('bukti/' . $laporan->bukti_presensi_kehadiran) }}" width="200px" alt="">
                <div class="col-6 mb-3">
                    <label for="file_pendukung_rapat" class="form-label">File pendukung rapat
                        <br>Upload ulang apabila ingin mengubah gambar yang tersimpan
                    </label>
                    <input type="file" name="file_pendukung_rapat" id="file_pendukung_rapat" class="form-control bc"
                        id="" maxlength="1200" accept=“.png,.jpg,.jpeg,.webp,image/png,.pdf”></input>
                    <div class="invalid-feedback">
                        File pendukung harus diisi.
                    </div>
                </div>
                @if (!is_null($laporan->file_pendukung_rapat))
                    <img src="{{ asset('bukti/' . $laporan->file_pendukung_rapat) }}" width="200px" alt="">
                @endif
                <div class="mb-3">
                    <label class="form-label">Persoalan yang dibahas<span class="text-danger">*</span></label>
                    <textarea name="persoalan_yang_dibahas" class="form-control valued bc" id="" cols="30" rows="10"
                        required>{{ $laporan->persoalan_yang_dibahas }}</textarea>
                    <div class="invalid-feedback">
                        Persoalan yang dibahas harus diisi.
                    </div>
                </div>
                <div>
                    <label for="tanggapan_peserta_rapat" class="form-label">Tanggapan Peserta Rapat<span
                            class="text-danger">*</span></label>
                    <textarea maxlength="1200" name="tanggapan_peserta_rapat" id="tanggapan_peserta_rapat"
                        class="form-control valued bc" cols="30" rows="10" required>{{ $laporan->tanggapan_peserta_rapat }}</textarea>
                    <div class="invalid-feedback">
                        Tanggapan peserta rapat harus diisi.
                    </div>
                </div>
                <div>
                    <label for="simpulan" class="form-label">Simpulan<span class="text-danger">*</span></label>
                    <textarea maxlength="1200" name="simpulan" id="simpulan" class="form-control valued bc" cols="30"
                        rows="10" required>{{ $laporan->simpulan }}</textarea>
                    <div class="invalid-feedback">
                        Simpulan harus diisi.
                    </div>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
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
                this.addButton.addEventListener('click', () => this.addInput(''));
            }

            addInput(value) {
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
                input.value = value;
                input.required = true;
                input.classList.add('form-control');
                input.classList.add('bc');

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
            @foreach ($laporan->susunans as $i => $item)
                dynamicInputManagerSu.addInput('{{ $item->nama_susunan }}')
            @endforeach
            @foreach ($laporan->pesertas as $i => $item)
                dynamicInputManagerPr.addInput('{{ $item->nama_peserta }}')
            @endforeach
        });
        // Function create canvas
        function set_canvas(id, src) {
            const canvas = document.getElementById('canvas_' + id);
            const form = document.getElementById('form_' + id);
            const clearButton = document.getElementById('clear_' + id);
            const submit = document.getElementById('submit_' + id);
            const ctx = canvas.getContext('2d');
            var image = new Image();
            image.onload = function() {
                ctx.drawImage(image, 0, 0);
            };
            if (src) {
                image.src = src
                document.getElementById(id).value = src
            }
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
        @if (!is_null($laporan->tanda_tangan_pejabat))
            set_canvas('tanda_tangan_pejabat', '{{ $laporan->tanda_tangan_pejabat }}')
        @else
            set_canvas('tanda_tangan_pejabat')
        @endif
        @if (!is_null($laporan->tanda_tangan_KSM))
            set_canvas('tanda_tangan_ksm', '{{ $laporan->tanda_tangan_KSM }}')
        @else
            set_canvas('tanda_tangan_ksm')
        @endif
    </script>
    <script>
        //         $('.valued').html(`testtttt
    // okeee
    // testttt
    // okeee
    // testttt
    // okeeeee`)
    </script>
@endsection
