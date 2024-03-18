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
@endsection
@section('body')
    <form class="row needs-validation m-0 p-3 mx-5 rounded bg-white bg-opacity-75 " style="border-top: #006b1a 2px" novalidate
        action="{{ route('register') }}" method="post">
        @csrf
        <div class="col-12 text-center fs__title mb-3">Formulir Register</div>
        <div class="col-12 mb-3 fs__child">
            <label for="email">Email<span class="text-danger">*</span></label>
            <input name="email" id="email" value="superdeveloper@gmail.com"
                class="form-control {{ $errors->has('email') ? 'is-invalid was-validated form-control:invalid' : '' }}"
                id="" cols="30" rows="2" required></input>
            <div class="invalid-feedback">
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @else
                    Email harus diisi.
                @endif
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="username">Username<span class="text-danger">*</span></label>
            <input name="username" id="username" value="superdeveloper"
                class="form-control {{ $errors->has('username') ? 'is-invalid was-validated form-control:invalid' : '' }}"
                id="" cols="30" rows="2" required></input>
            <div class="invalid-feedback">
                @if ($errors->has('username'))
                    {{ $errors->first('username') }}
                @else
                    Username harus diisi.
                @endif
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="password">Password<span class="text-danger">*</span></label>
            <input name="password" type="password" value="password" id="password"
                class="form-control {{ $errors->has('password') ? 'is-invalid was-validated form-control:invalid' : '' }}"
                id="" cols="30" rows="2" required></input>
            <div class="invalid-feedback">
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @else
                    Password harus diisi.
                @endif
            </div>
        </div>
        <div class="col-12 mb-3 fs__child">
            <label for="password_confirmation">Konfirmasi Password<span class="text-danger">*</span></label>
            <input name="password_confirmation" value="password" type="password" id="password_confirmation"
                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid was-validated form-control:invalid' : '' }}"
                id="" cols="30" rows="2" required></input>
            <div class="invalid-feedback">
                @if ($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                @else
                    Konfirmasi password harus diisi.
                @endif
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
