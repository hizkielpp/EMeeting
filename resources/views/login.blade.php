@extends('template')
@section('head')
@endsection
@section('class-body', 'd-flex justify-content-center align-items-center')
@section('body')
    <form class="row shadow needs-validation m-0 p-3 mx-5 rounded bg-white bg-opacity-75 " style="border-top: #006b1a 2px"
        novalidate action="{{ route('login') }}" method="post">
        @csrf
        <div class="col-12 text-center fs__title mb-3">Formulir Login</div>
        <div class="col-12 mb-3 fs__child">
            <label for="username">Username<span class="text-danger">*</span></label>
            <input name="username" id="username"
                class="form-control {{ $errors->has('username') ? 'is-invalid was-validated form-control:invalid' : '' }} "
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
            <input type="password" name="password" id="password"
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
