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
            <h5 class="card-title fw-semibold mb-4">Profile</h5>
            {{-- create notula --}}
            <form class="needs-validation" action="{{ route('update_password') }}" method="POST"
                style="border-top: #006b1a 2px" enctype="multipart/form-data" novalidate>
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Password<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control bc" required>
                        <iconify-icon class="input-group-text"
                            onclick="if($('#password').attr('type')=='password'){$('#password').attr('type','text');this.icon='mdi:eye'}else{$('#password').attr('type','password');this.icon='mdi:eye-off'}"
                            style="cursor: pointer" icon="mdi:eye-off"></iconify-icon>
                        <div class="invalid-feedback">
                            Password harus diisi.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input id="password_konfirmasi" type="password" name="password_konfirmasi" class="form-control bc"
                            required>
                        <iconify-icon class="input-group-text"
                            onclick="if($('#password_konfirmasi').attr('type')=='password'){$('#password_konfirmasi').attr('type','text');this.icon='mdi:eye'}else{$('#password_konfirmasi').attr('type','password');this.icon='mdi:eye-off'}"
                            style="cursor: pointer" icon="mdi:eye-off"></iconify-icon>
                        <div class="invalid-feedback">
                            Password konfirmasi harus diisi.
                        </div>
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
@endsection
