@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Buat Unit</h5>
            {{-- create notula --}}
            <form class="needs-validation" action="{{ route('update_unit') }}" method="POST" style="border-top: #006b1a 2px"
                enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Unit<span class="text-danger">*</span></label>
                    <input type="hidden" name="id_unit" value="{{ request('id_unit') }}">
                    <input type="text" name="nama_unit" class="form-control bc" value="{{ $unit->nama_unit }}" required>
                    <div class="invalid-feedback">
                        Nama unit harus diisi.
                    </div>
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
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
