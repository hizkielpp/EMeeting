@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Departemen/Prodi/Unit</h5>
            <!-- Search Form -->
            <form action="{{ route('monitor') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari departemen/prodi/unit..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">Nama Departemen/Prodi/Unit</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        @foreach ($units as $u)
                            <tr>
                                <td scope="row" class="d-flex">
                                    {{ $u->nama_unit }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('log_laporan_pimpinan') . '?id_unit=' . $u->id }}">
                                        <iconify-icon class=" text-black fs-6 pointer" data-toggle="tooltip"
                                            data-placement="top" title="Lihat Detail Data"
                                            icon="gravity-ui:database-magnifier" style="cursor: pointer"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $units->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
