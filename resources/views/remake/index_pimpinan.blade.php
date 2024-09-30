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
                            <th scope="col" class="ps-0">Nama Prodi</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        <tr>
                            <td scope="row" class="d-flex">
                                okeee
                            </td>
                            <td class="text-end">
                                <iconify-icon class="text-black fs-6" data-toggle="tooltip" data-placement="top"
                                    title="Detail Data Prodi" style="cursor: pointer"
                                    icon="gravity-ui:database-magnifier"></iconify-icon>
                            </td>
                        </tr>

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
