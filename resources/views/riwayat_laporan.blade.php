@extends('template')
@section('head')
    <link rel="stylesheet" href="{{ asset('datatable/datatables.min.css') }}">
    <script src="{{ asset('datatable/datatables.min.js') }}"></script>
    <style>
        .btn-auto {
            font-size: 20px;
            width: auto;
            height: auto;
            color: rgb(241, 241, 241);
        }

        .bg-green {
            background-color: rgb(14, 100, 50);
        }

        .bg-orange {
            background-color: rgb(177, 112, 14);
        }

        .bg-grey {
            background-color: rgba(236, 236, 236, 0.425);
        }
    </style>
    <script>
        $(function() {
            $(".tanggalrapat").datepicker();
        });
    </script>
@endsection
@section('body')
    <div class="row shadow needs-validation m-0 p-3 mx-5 rounded bg-white bg-opacity-75">
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Tanggal Rapat</th>
                    <th class="text-center">Perihal Mahasiswa</th>
                    <th class="text-center">Perihal Dosen</th>
                    <th class="text-center">Perihal Tendik</th>
                    <th class="text-center">Perihal Sarana Prasarana</th>
                    <th class="text-center">Lain-lain</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporans as $item)
                    <tr>
                        <td class="text-center">{{ $item->tanggal_rapat }}</td>
                        <td class="text-center text-truncate" style="max-width: 50px">{{ $item->mahasiswa }}</td>
                        <td class="text-center text-truncate" style="max-width: 50px">{{ $item->dosen }}</td>
                        <td class="text-center text-truncate" style="max-width: 50px">{{ $item->tendik }}</td>
                        <td class="text-center text-truncate" style="max-width: 50px">{{ $item->sarpras }}</td>
                        <td class="text-center text-truncate" style="max-width: 50px">{{ $item->lain_lain }}</td>
                        <td class="text-center d-flex gap-1">
                            <!-- Button untuk melihat modal detail laporan-->
                            <div class="btn btn-auto bg-green p-2 d-flex flex-column" data-bs-toggle="modal"
                                data-bs-target="#modal-detail{{ $item->id }}">
                                <i class="fa fa-info-circle mx-auto my-auto"></i>
                                Detail
                            </div>
                            <!-- Button untuk melihat modal ubah detail laporan-->
                            <div class="btn btn-auto bg-orange p-2 d-flex flex-column" data-bs-toggle="modal"
                                data-bs-target="#modal-ubah{{ $item->id }}">
                                <i class="fa-solid fa-user-pen mx-auto my-auto"></i>
                                Ubah
                            </div>
                        </td>
                    </tr>
                    <!-- Modal detail laporan -->
                    <div class="modal fade" id="modal-detail{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div>
                                                Perihal Tendik :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->tendik }}</div>
                                            <div>
                                                Perihal Sarana Prasarana :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->sarpras }}</div>
                                            <div>
                                                Perihal Lain-lain :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->lain_lain }}</div>
                                            <div>
                                                Bukti Presensi Kehadiran :
                                            </div>
                                            <img class="bg-grey p-1 rounded" width="400px"
                                                src="{{ asset('bukti/' . $item->bukti_presensi_kehadiran) }}"
                                                alt="">
                                            @isset($item->file_pendukung_rapat)
                                                <div>
                                                    Data Pendukung :
                                                </div>
                                                <img class="bg-grey p-1 rounded" src="{{ $item->tanda_tangan_kadep }}"
                                                    alt="">
                                            @endisset
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div>
                                                Tanggal Rapat :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->tanggal_rapat }}</div>
                                            <div>
                                                Perihal Mahasiswa :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->mahasiswa }}</div>
                                            <div>
                                                Perihal Dosen :
                                            </div>
                                            <div class="bg-grey p-1 rounded">{{ $item->dosen }}</div>
                                            <div>
                                                Tanda Tangan Kaprodi :
                                            </div>
                                            <img class="bg-grey p-1 rounded" src="{{ $item->tanda_tangan_kaprodi }}"
                                                alt="">
                                            <div>
                                                Tanda Tangan Kadep :
                                            </div>
                                            <img class="bg-grey p-1 rounded" src="{{ $item->tanda_tangan_kadep }}"
                                                alt="">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal ubah laporan -->
                    <div class="modal fade" id="modal-ubah{{ $item->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Laporan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div>
                                                Perihal Tendik :
                                            </div>
                                            <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">{{ $item->tendik }}</textarea>
                                            <div>
                                                Perihal Sarana Prasarana :
                                            </div>
                                            <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30" rows="8">{{ $item->sarpras }}</textarea>
                                            <div>
                                                Perihal Lain-lain :
                                            </div>
                                            <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                                rows="8">{{ $item->lain_lain }}</textarea>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div>
                                                Tanggal Rapat :
                                            </div>
                                            <input type="text" value="{{ $item->tanggal_rapat }}"
                                                class="form-control w-100 bg-grey p-1 rounded tanggalrapat">
                                            <div>
                                                Perihal Mahasiswa :
                                            </div>
                                            <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                                rows="8">{{ $item->mahasiswa }}</textarea>
                                            <div>
                                                Perihal Dosen :
                                            </div>
                                            <textarea class="form-control w-100 bg-grey p-1 rounded" name="" id="" cols="30"
                                                rows="8">{{ $item->dosen }}</textarea>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-green" data-bs-dismiss="modal">Submit</button>

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Tanggal Rapat</th>
                    <th class="text-center">Perihal Mahasiswa</th>
                    <th class="text-center">Perihal Dosen</th>
                    <th class="text-center">Perihal Tendik</th>
                    <th class="text-center">Perihal Sarana Prasarana</th>
                    <th class="text-center">Lain-lain</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('foot')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        new DataTable('#example');
    </script>
@endsection
