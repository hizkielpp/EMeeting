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
                            <th scope="col" class="ps-0">Deskripsi Umum Rapat</th>
                            <th scope="col" class="ps-0">Isi Rapat</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider w-100">
                        @foreach ($laporans as $item)
                            <tr>
                                <th scope="row" class="d-flex w-25">
                                    <span class="d-flex align-items-start">
                                        <table>
                                            <tr>
                                                <td class="text-start w-25">
                                                    Nama Rapat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->nama_rapat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25">
                                                    Tanggal Rapat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->tanggal_rapat }} WIB
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25">
                                                    Tempat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->tempat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    Pemimpian Rapat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->pemimpin_rapat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    Pencatat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->pencatat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    Jabatan Pejabat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->nama_jabatan_pejabat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    Tanda Tangan Pejabat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    <img width="120px" src="{{ $item->tanda_tangan_pejabat }}"
                                                        alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    Nama Pejabat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->nama_pejabat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-start w-25 bold">
                                                    NIP Pejabat
                                                </td>
                                                <td class="text-center w-25 p-1">
                                                    :
                                                </td>
                                                <td class="text-start w-50">
                                                    {{ $item->NIP_pejabat }}
                                                </td>
                                            </tr>
                                            @if (!is_null($item->tanda_tangan_KSM))
                                                <tr>
                                                    <td class="text-start w-25 bold">
                                                        Jabatan KSM
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->nama_jabatan_KSM }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25 bold">
                                                        Tanda Tangan KSM
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        <img width="120px" src="{{ $item->tanda_tangan_KSM }}"
                                                            alt="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25 bold">
                                                        Nama KSM
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->nama_KSM }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-start w-25 bold">
                                                        NIP KSM
                                                    </td>
                                                    <td class="text-center w-25 p-1">
                                                        :
                                                    </td>
                                                    <td class="text-start w-50">
                                                        {{ $item->NIP_KSM }}
                                                    </td>
                                                </tr>
                                            @endif
                                        </table>
                                    </span>
                                </th>
                                <td class="text-wrap w-75">
                                    {{-- <textarea name="" id="" cols="80" rows="10">
                                        {{ $item->persoalan_yang_dibahas }}
                                    </textarea> --}}
                                    <b>Persoalan yang dibahas</b><br>
                                    {!! $item->persoalan_yang_dibahas !!}<br>
                                    <b>Tanggapan Peserta Rapat</b><br>
                                    {!! $item->tanggapan_peserta_rapat !!}<br>
                                    <b>Simpulan</b><br>
                                    {!! $item->simpulan !!}
                                </td>
                                <td class="d-flex flex-column gap-3">
                                    <iconify-icon class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                        data-placement="top" title="Edit" icon="teenyicons:edit-1-solid"
                                        style="cursor: pointer"></iconify-icon>

                                    <a href="{{ route('print_notula') . '?id=' . $item->id }}"> <iconify-icon
                                            class="text-black fs-6 pointer w-100" data-toggle="tooltip" data-placement="top"
                                            title="Print" icon="teenyicons:print-solid"
                                            style="cursor: pointer"></iconify-icon></a>
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
