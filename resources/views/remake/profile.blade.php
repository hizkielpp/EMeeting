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
            <form class="needs-validation" action="{{ route('ubah_password') }}" method="POST" style="border-top: #006b1a 2px"
                enctype="multipart/form-data" novalidate>
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama User<span class="text-danger">*</span></label>
                    <input type="text" value="{{ Auth::user()->nickname }}" name="nickname" class="form-control"
                        required>
                    <div class="invalid-feedback">
                        Nama user harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        Password harus diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                    <input type="password" name="password_konfirmasi" class="form-control" required>
                    <div class="invalid-feedback">
                        Password konfirmasi harus diisi.
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
