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
            <h5 class="card-title fw-semibold mb-4">Tulis Notula</h5>
            {{-- create notula --}}
            <form class="needs-validation" action="{{ route('input_laporan') }}" method="POST" style="border-top: #006b1a 2px"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Rapat<span class="text-danger">*</span></label>
                    <input type="text" name="nama_rapat" class="form-control bc" required>
                    <div class="invalid-feedback">
                        Nama rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3 fs__child form-label">
                    Tanggal Rapat<span class="text-danger">*</span><input name="tanggal_rapat" value="{{ date('d-m-Y') }}"
                        type="text" class="fs__normal form-control bc" id="tanggal_rapat" required>
                    <div class="invalid-feedback">
                        Tanggal rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3 fs__child form-label ">
                    Jam Rapat<span class="text-danger">*</span><input name="jam_rapat" type="time" value=""
                        class="fs__normal form-control bc" id="jam_rapat" required>
                    <div class="invalid-feedback">
                        Jam rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat<span class="text-danger">*</span></label>
                    <input type="text" name="tempat" class="form-control bc" required value="">
                    <div class="invalid-feedback">
                        Tempat rapat harus diisi.
                    </div>
                </div>
                <div class="mb-3 fs__child form-label">
                    Agenda<span class="text-danger">*</span>
                    <div id="a" class="mb-3">
                    </div>
                    <input id="validator_a" class="d-none" required>
                    <div id="add-a-button" class="btn btn-primary ">Tambah Agenda</div>
                    <div class="invalid-feedback">
                        Agenda harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pemimpin rapat<span class="text-danger">*</span></label>
                    <input type="text" name="pemimpin_rapat" class="form-control bc" required
                        onkeyup="get_namas(this.value, $('#rpr'),this)">
                    <div class="invalid-feedback">
                        Pemimpin rapat harus diisi.
                    </div>
                    <div id="rpr">

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
                {{-- <div class="mb-2">
                    <input type="checkbox"
                        onclick="this.checked ? $('#container-KSM').removeClass('d-none') : $('#container-KSM').addClass('d-none')"
                        class="form-check-input mr-3" id="exampleCheck1">
                    <label class="form-check-label bc mb-2" for="exampleCheck1">Bersama dengan
                        KSM</label>
                    <input type="checkbox"
                        onclick="this.checked ? $('#container-Kabag').removeClass('d-none') : $('#container-Kabag').addClass('d-none')"
                        class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label bc mb-2" for="exampleCheck1">Bersama dengan
                        KABAG</label>
                </div>
                <div class="row gap-2 mb-2" style="margin-left: 0.20rem!important">
                    <div class="col-lg-5 col-sm-12 signature-pad-form fs__child m-0 p-0 " id="form_tanda_tangan_pejabat">
                        <label for="nama_jabatan_pejabat" class="fs__child  w-100 form-label mt-2">Jabatan pejabat</label>
                        <input type="text" id="nama_jabatan_pejabat" name="nama_jabatan_pejabat" class="form-control bc"
                            value="">
                        <div class="invalid-feedback">
                            Jabatan pejabat harus diisi.
                        </div>
                        <label for="tanda_tangan_pejabat" class="fs__child  w-100 form-label mt-2">Tanda tangan
                            Pejabat<span class="text-danger">*</span></label>
                        <input type="file" name="tanda_tangan_pejabat" id="tanda_tangan_pejabat" class="form-control bc"
                            id="" accept=“.png,.jpg,.jpeg,.webp,image/png”></input>
                        <label for="nama_pejabat" class="fs__child w-100 form-label">Nama Pejabat</label>
                        <input type="text" id="nama_pejabat" name="nama_pejabat" class="form-control bc">
                        <div class="invalid-feedback">
                            Nama pejabat harus diisi.
                        </div>
                        <label for="NIP_pejabat" class="fs__child  w-100 form-label">NIP Pejabat</label>
                        <input type="text" id="NIP_pejabat" name="NIP_pejabat" class="form-control bc"
                            value="">
                        <div class="invalid-feedback">
                            NIP pejabat harus diisi.
                        </div>
                    </div>
                    <div id="container-KSM" class="col-lg-5 col-sm-12 signature-pad-form fs__child d-none m-0 p-0"
                        id="form_tanda_tangan_ksm">
                        <label for="nama_jabatan_KSM" class="fs__child  w-100 form-label mt-2">Jabatan Ketua KSM
                            <span class="text-danger">*</span></label>
                        <input type="text" id="nama_jabatan_KSM" name="nama_jabatan_KSM" value="Ketua KSM"
                            class="form-control bc" readonly>
                        <label for="tanda_tangan_ksm" class="fs__child  w-100 form-label mt-2">Tanda tangan
                            KSM</label>
                        <input type="file" name="tanda_tangan_KSM" id="tanda_tangan_KSM" class="form-control bc"
                            id="" accept=“.png,.jpg,.jpeg,.webp,image/png” required></input>
                        <input type="text" class="d-none" name="tanda_tangan_KSM" id="tanda_tangan_ksm"
                            class="form-control bc">
                        <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_ksm"></canvas>
                        <p><a href="#" class="btn" id="clear_tanda_tangan_ksm">Clear</a>
                        </p>
                        <label for="nama_KSM" class="fs__child  w-100 form-label ">Nama Ketua KSM
                        </label>
                        <input type="text" id="nama_KSM" name="nama_KSM" class="form-control bc">
                        <label for="NIP_KSM" class="fs__child  w-100 form-label ">NIP Ketua KSM
                        </label>
                        <input type="text" id="NIP_KSM" name="NIP_KSM" class="form-control bc">
                    </div>
                    <div id="container-Kabag" class="col-lg-5 col-sm-12 signature-pad-form fs__child d-none m-0 p-0"
                        id="form_tanda_tangan_Kabag">
                        <label for="nama_jabatan_Kabag" class="fs__child  w-100 form-label mt-2">Jabatan Kabag
                            <span class="text-danger">*</span></label>
                        <input type="text" id="nama_jabatan_Kabag" name="nama_jabatan_Kabag" value="Ketua Bagian"
                            class="form-control bc" readonly>
                        <label for="tanda_tangan_Kabag" class="fs__child  w-100 form-label mt-2">Tanda tangan
                            Kabag</label>
                        <input type="file" name="tanda_tangan_Kabag" id="tanda_tangan_Kabag" class="form-control bc"
                            id="" accept=“.png,.jpg,.jpeg,.webp,image/png” required></input>
                        <input type="text" class="d-none" name="tanda_tangan_KSM" id="tanda_tangan_ksm"
                            class="form-control bc">
                        <canvas width="400px" class="signature-pad" id="canvas_tanda_tangan_ksm"></canvas>
                        <p><a href="#" class="btn" id="clear_tanda_tangan_ksm">Clear</a>
                        </p>
                        <label for="nama_KSM" class="fs__child  w-100 form-label ">Nama Ketua KSM
                        </label>
                        <input type="text" id="nama_KSM" name="nama_KSM" class="form-control bc">
                        <label for="NIP_KSM" class="fs__child  w-100 form-label ">NIP Ketua KSM
                        </label>
                        <input type="text" id="NIP_KSM" name="NIP_KSM" class="form-control bc">
                    </div>
                </div> 
                <div class="col-6 mb-3 fs__child">
                    <label for="bukti_presensi_kehadiran" class="form-label mt-2">Bukti presensi kehadiran</label>
                    <input type="file" name="bukti_presensi_kehadiran" id="bukti_presensi_kehadiran"
                        class="form-control bc" id="" maxlength="1200"
                        accept=“.png,.jpg,.jpeg,.webp,image/png”></input>
                    <div class="invalid-feedback">
                        Bukti presensi harus diisi.
                    </div>
                </div>
                <div class="col-6 mb-3 fs__child">
                    <label for="file_pendukung_rapat" class="form-label mt-2">File pendukung rapat</label>
                    <input type="file" name="file_pendukung_rapat" id="file_pendukung_rapat" class="form-control bc"
                        id="" maxlength="1200" accept=“.png,.jpg,.jpeg,.webp,image/png”></input>
                    <div class="invalid-feedback">
                        File pendukung harus diisi.
                    </div>
                </div> --}}
                <div class="mb-3">
                    <label class="form-label">Persoalan yang dibahas</label>
                    <div>
                        <label for="mahasiswa" class="form-label">Perihal Mahasiswa<br><span class="fs__normal">Contoh :
                                mahasiswa bermasalah,
                                prestasi mahasiswa, dan segala hal lain yang berhubungan dengan
                                mahasiswa Fakultas
                                Kedokteran</span></label>
                        <textarea name="mahasiswa" id="mahasiswa" class="form-control bc valued" id="" cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">
                            Perihal mahasiswa harus diisi.
                        </div>
                    </div>
                    <div>
                        <label for="dosen" class="form-label mt-2">Perihal Dosen
                            <br><span class="fs__normal">Contoh :
                                dosen
                                yang mengambil studi lanjut tidak kunjung selesai (siapa), dosen
                                berprestasi, dan segala hal lain
                                yang
                                berhubungan dengan dosen Fakultas Kedokteran</span></label>
                        <textarea maxlength="1200" name="dosen" id="dosen" class="form-control bc valued" id="" cols="30"
                            rows="10"></textarea>
                        <div class="invalid-feedback">
                            Perihal dosen harus diisi.
                        </div>
                    </div>
                    <div>
                        <label for="tendik" class="form-label mt-2">Perihal Tendik<br><span class="fs__normal">Contoh :
                                tendik
                                yang perlu diberi penghargaan karena dedikasinya, tendik yang
                                bermasalah (menolak tugas, tidak
                                mengerjakan tugas yang diberikan, memilih - milih pekerjaan, tidak
                                professional), dan segala hal
                                lain
                                yang berhubungan dengan tendik Fakultas Kedokteran</span></label>
                        <textarea maxlength="1200" name="tendik" id="tendik" class="form-control bc valued" id="" cols="30"
                            rows="10"></textarea>
                        <div class="invalid-feedback">
                            Perihal tendik harus diisi.
                        </div>
                    </div>
                    <div>
                        <label for="sarpras" class="form-label mt-2">Perihal sarana prasarana<br><span
                                class="fs__normal">Contoh
                                : tindak lanjut perbaikan sarana prasarana yang rusak, kebutuhan
                                penunjang perkuliahan yang segera
                                dibutuhkan, dan segala hal lain yang berhubungan dengan sarana
                                prasarana di Fakultas
                                Kedokteran</span></label>
                        <textarea maxlength="1200" name="sarpras" id="sarpras" class="form-control bc valued" id=""
                            cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">
                            Perihal sarana prasarana harus diisi.
                        </div>
                    </div>
                    <div>
                        <label for="lain_lain" class="form-label mt-2">Lain-lain<br> <span class="fs__normal">Seluruh
                                perihal
                                yang tidak termasuk 4 perihal
                                diatas
                                dapat dituliskan disini</span></label>
                        <textarea name="lain_lain" id="lain_lain" class="form-control bc valued" id="" cols="30"
                            rows="10" maxlength="1200"> </textarea>
                    </div>
                </div>
                <div>
                    <label for="tanggapan_peserta_rapat" class="form-label mt-2">Tanggapan Peserta Rapat<span
                            class="text-danger">*</span>
                        <br><span class="fs__normal">Contoh:<br>
                            Ibu Fitriani:
                            "Ada beberapa kekhawatiran terkait kesejahteraan dosen yang perlu perhatian lebih. Saya berharap
                            kita bisa mengalokasikan waktu khusus untuk membahas hal ini di rapat selanjutnya."</span>
                    </label>
                    <textarea maxlength="1200" name="tanggapan_peserta_rapat" id="tanggapan_peserta_rapat"
                        class="form-control bc valued" cols="30" rows="10" required></textarea>
                    <div class="invalid-feedback">
                        Tanggapan peserta rapat harus diisi.
                    </div>
                </div>
                <div>
                    <label for="simpulan" class="form-label mt-2">Simpulan<span class="text-danger ">*</span>
                        <br><span class="fs__normal">Contoh:<br>
                            Ditetapkan bahwa akan dilakukan evaluasi kurikulum secara menyeluruh dalam waktu dua bulan ke
                            depan.
                            <br>Rencana pengembangan fasilitas akan disusun oleh tim khusus dan dipresentasikan pada rapat
                            berikutnya.
                            <br>Kesejahteraan dosen akan menjadi fokus pembahasan pada rapat yang akan datang, dengan
                            mengundang
                            perwakilan dosen untuk memberikan masukan.</span>
                    </label>
                    <textarea maxlength="1200" name="simpulan" id="simpulan" class="form-control bc valued" cols="30"
                        rows="10" required></textarea>
                    <div class="invalid-feedback">
                        Simpulan harus diisi.
                    </div>
                </div>
                <div>
                    <label for="evaluasi" class="form-label mt-2">Evaluasi<span class="text-danger ">*</span>
                        <br><span class="fs__normal">
                            Masukkan/tuliskan/laporkan hasil evaluasi dari prodi-prodi di lingkungan kerja departemen
                            Saudara terkait SDM, sarana dan prasarana, Pendidikan/Tri Dharma, prestasi dan /
                            pelanggaran-pelanggaran oleh civitas dll yang perlu dilaporkan.
                        </span>
                    </label>
                    <textarea maxlength="1200" name="evaluasi" id="evaluasi" class="form-control bc valued" cols="30"
                        rows="10" required></textarea>
                    <div class="invalid-feedback">
                        Evaluasi harus diisi.
                    </div>
                </div>
                <div>
                    <label for="pembinaan" class="form-label mt-2">Pembinaan
                        <br><span class="fs__normal">
                            masukkan/tuliskan/laporkan Rencana Tidak Lanjut (RTL) atau arahan yang diberikan oleh departemen
                            Saudara ke prodi-prodi di lingkungan kerja Saudara.
                        </span>
                    </label>
                    <textarea maxlength="1200" name="pembinaan" id="pembinaan" class="form-control bc valued" cols="30"
                        rows="10"></textarea>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $("#tanggal_rapat").datepicker({
                dateFormat: 'dd-mm-yy'
            }).val();
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
            constructor(containerId, addButtonId, className, category) {
                this.container = document.getElementById(containerId);
                this.containerId = containerId;
                this.addButton = document.getElementById(addButtonId);
                this.className = className;
                this.containerId = containerId;
                this.category = category;
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
                input.classList.add('bc');

                const recomendations = document.createElement('div')
                if (this.category == 'person') {
                    recomendations.id = this.containerId + this.inputCount
                    input.addEventListener('keyup', () => {
                        get_namas(input.value, $(`#${this.containerId + this.inputCount}`), input)
                    })
                }


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
                if (this.category == 'person') {
                    this.container.appendChild(recomendations)
                }
            }

            removeInput(inputDivId) {
                const inputDiv = document.getElementById(inputDivId);
                if (inputDiv) {
                    this.container.removeChild(inputDiv);
                }
                // Increment input count
                this.inputCount--;
                if (this.inputCount == 0) document.getElementById('validator_' + this.containerId).required = true
            }
        }
        // Initialize the manager
        document.addEventListener('DOMContentLoaded', () => {
            const dynamicInputManagerSu = new DynamicInputManager('a', 'add-a-button', 'agenda[]',
                'not_person');
            const dynamicInputManagerPr = new DynamicInputManager('pr', 'add-pr-button', 'peserta_rapat[]',
                'person');
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
        // set_canvas('tanda_tangan_pejabat')
        // set_canvas('tanda_tangan_ksm')
        function get_namas(keyword, parent, element) {
            $.ajax({
                url: `{{ route('get_namas') }}?keyword=${keyword}`,
                statusCode: {
                    200: function(xhr) {
                        parent.empty(); // Clear previous suggestions

                        xhr.forEach(value => {
                            parent.append(
                                `<div class="suggestion-item " style="cursor: pointer">${value.nama_lengkap}</div>`
                            );
                        });

                        // Optional: Add click handler to suggestion items
                        $('.suggestion-item').on('click', function() {
                            element.value = $(this).text(); // Set input value
                            parent.empty(); // Clear suggestions after selection
                        });
                    },
                    404: function() {
                        alert("Page not found");
                    }
                }
            });
        }
    </script>
@endsection
