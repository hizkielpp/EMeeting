@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Hapus Akun</h5>
            {{-- create notula --}}
            <form class="needs-validation" action="{{ route('destroy_user') }}" method="POST" style="border-top: #006b1a 2px"
                enctype="multipart/form-data" novalidate>
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{ request('id') }}">
                <div class="mb-3">
                    Apakah anda yakin akan menghapus user dengan deskripsi dibawah ini<br>
                    <table>
                        <tr>
                            <td class="w-25">Nama</td>
                            <td class="w-25">:</td>
                            <td class="w-50">{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Unit</td>
                            <td class="w-25">:</td>
                            <td class="w-50">{{ $user->nama_unit }}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Role</td>
                            <td class="w-25">:</td>
                            <td class="w-50">{{ $user->role }}</td>
                        </tr>
                        <tr>
                            <td class="w-25">Email</td>
                            <td class="w-25">:</td>
                            <td class="w-50">{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="mt-3 btn btn-danger">Submit</button>
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
