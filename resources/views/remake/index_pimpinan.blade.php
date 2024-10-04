@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Riwayat Laporan</h5>
            <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-primary border-0">
                            <th scope="col" class="ps-0">Nama Departemen/Prodi/Unit</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        @foreach ($users as $u)
                            <tr>
                                <td scope="row" class="d-flex">
                                    {{ $u->username }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('log_laporan_pimpinan') . '?id_user=' . $u->id }}">
                                        <iconify-icon class=" text-black fs-6 pointer" data-toggle="tooltip"
                                            data-placement="top" title="Lihat Detail Data"
                                            icon="gravity-ui:database-magnifier" style="cursor: pointer"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
