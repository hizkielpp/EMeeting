@extends('remake.template')
@section('css')
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Riwayat Laporan</h5>

            <!-- Search Form -->
            <form action="{{ route('log_laporan') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari laporan..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

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
                        @if ($laporans->count() > 0)
                            @foreach ($laporans as $item)
                                <tr>
                                    <th scope="row" class="align-top w-25">
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
                                                        {{ $item->username }}
                                                    </td>
                                                </tr>
                                                @if (!is_null($item->nama_jabatan_pejabat))
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
                                                            <img width="120px"
                                                                src="{{ asset('tanda_tangan//' . $item->tanda_tangan_pejabat) }}"
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
                                                @endif
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
                                                            <img width="120px"
                                                                src="{{ asset('tanda_tangan//' . $item->tanda_tangan_KSM) }}"
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
                                                @if (!is_null($item->tanda_tangan_Kabag))
                                                    <tr>
                                                        <td class="text-start w-25 bold">
                                                            Jabatan Kabag
                                                        </td>
                                                        <td class="text-center w-25 p-1">
                                                            :
                                                        </td>
                                                        <td class="text-start w-50">
                                                            {{ $item->nama_jabatan_Kabag }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-start w-25 bold">
                                                            Tanda Tangan Kabag
                                                        </td>
                                                        <td class="text-center w-25 p-1">
                                                            :
                                                        </td>
                                                        <td class="text-start w-50">
                                                            <img width="120px"
                                                                src="{{ asset('tanda_tangan//' . $item->tanda_tangan_Kabag) }}"
                                                                alt="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-start w-25 bold">
                                                            Nama Kabag
                                                        </td>
                                                        <td class="text-center w-25 p-1">
                                                            :
                                                        </td>
                                                        <td class="text-start w-50">
                                                            {{ $item->nama_Kabag }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-start w-25 bold">
                                                            NIP Kabag
                                                        </td>
                                                        <td class="text-center w-25 p-1">
                                                            :
                                                        </td>
                                                        <td class="text-start w-50">
                                                            {{ $item->NIP_Kabag }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </span>
                                    </th>
                                    <td class="text-wrap w-75 align-top">
                                        <div class="content">

                                            <div class="short-content">
                                                {!! Str::limit(
                                                    '<b>Persoalan yang dibahas</b><br>' .
                                                        (!is_null($item->mahasiswa) ? '<b>Mahasiswa:</b><br>' . implode('<br>', $item->mahasiswa_array) . '<br>' : '') .
                                                        (!is_null($item->dosen) ? '<b>Dosen:</b><br>' . implode('<br>', $item->dosen_array) . '<br>' : '') .
                                                        (!is_null($item->tendik) ? '<b>Tendik:</b><br>' . implode('<br>', $item->tendik_array) . '<br>' : '') .
                                                        (!is_null($item->sarpras) ? '<b>Sarpras:</b><br>' . implode('<br>', $item->sarpras_array) . '<br>' : '') .
                                                        (!is_null($item->lain_lain) ? '<b>Lain-lain:</b><br>' . implode('<br>', $item->lain_lain_array) . '<br>' : '') .
                                                        '<b>Tanggapan Peserta Rapat</b><br>' .
                                                        (!is_null($item->tanggapan_peserta_rapat) ? implode('<br>', $item->tanggapan_array) . '<br>' : '') .
                                                        '<b>Simpulan Rapat</b><br>' .
                                                        (!is_null($item->simpulan) ? implode('<br>', $item->simpulan_array) . '<br>' : ''),
                                                    400,
                                                ) !!}

                                            </div>
                                            <div class="full-content" style="display: none;">
                                                {!! '<b>Persoalan yang dibahas</b><br>' .
                                                    (!is_null($item->mahasiswa) ? '<b>Mahasiswa:</b><br>' . implode('<br>', $item->mahasiswa_array) . '<br>' : '') .
                                                    (!is_null($item->dosen) ? '<b>Dosen:</b><br>' . implode('<br>', $item->dosen_array) . '<br>' : '') .
                                                    (!is_null($item->tendik) ? '<b>Tendik:</b><br>' . implode('<br>', $item->tendik_array) . '<br>' : '') .
                                                    (!is_null($item->sarpras) ? '<b>Sarpras:</b><br>' . implode('<br>', $item->sarpras_array) . '<br>' : '') .
                                                    (!is_null($item->lain_lain) ? '<b>Lain-lain:</b><br>' . implode('<br>', $item->lain_lain_array) . '<br>' : '') .
                                                    '<b>Tanggapan Peserta Rapat</b><br>' .
                                                    (!is_null($item->tanggapan_peserta_rapat) ? implode('<br>', $item->tanggapan_array) . '<br>' : '') .
                                                    '<b>Simpulan Rapat</b><br>' .
                                                    (!is_null($item->simpulan) ? implode('<br>', $item->simpulan_array) . '<br>' : '') !!}
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="toggle-content">Lihat selengkapnya</a>
                                    </td>
                                    <td class="align-top">
                                        <div class="d-flex flex-column gap-3">
                                            @if ($item->fk_user == Auth::id())
                                                <a href="{{ route('edit_laporan') . '?id=' . $item->id }}" target="_blank">
                                                    <iconify-icon class="text-black fs-6 pointer w-100 hoverable"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        icon="teenyicons:edit-1-solid"
                                                        style="cursor: pointer"></iconify-icon>
                                            @endif
                                            </a>
                                            <a href="#" onclick="{!! is_null($item->belum)
                                                ? "alert('Anda belum mengisi informasi pejabat tidak dapat melakukan print output, Silahkan mengisi informasi pejabat dan upload daftar hadir melalui fitur edit')"
                                                : '' !!}">
                                                <iconify-icon class="text-black fs-6 pointer w-100 hoverable "
                                                    data-toggle="tooltip" data-placement="top" title="Print"
                                                    icon="teenyicons:print-solid"
                                                    style="cursor: pointer; {{ is_null($item->belum) ? 'color: red !important' : '' }}"></iconify-icon>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No reports found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $laporans->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
                </div>
            </div>

            {{-- <h5 class="card-title">Riwayat Laporan</h5>
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
                                    <b>Persoalan yang dibahas</b><br>
                                    @foreach ($item->persoalan_array as $p)
                                        {{ $p }}<br>
                                    @endforeach
                                    <b>Tanggapan Peserta Rapat</b><br>
                                    @foreach ($item->tanggapan_array as $p)
                                        {{ $p }}<br>
                                    @endforeach
                                    <b>Simpulan</b><br>
                                    @foreach ($item->simpulan_array as $p)
                                        {{ $p }}<br>
                                    @endforeach
                                </td>
                                <td class="d-flex flex-column gap-3">
                                    <iconify-icon class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                        data-placement="top" title="Edit" icon="teenyicons:edit-1-solid"
                                        style="cursor: pointer"></iconify-icon>

                                    <a href="{{ route('print_notula') . '?id=' . $item->id }}"> <iconify-icon
                                            class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                            data-placement="top" title="Print" icon="teenyicons:print-solid"
                                            style="cursor: pointer"></iconify-icon></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <!-- Add this JavaScript to enable the 'Lihat selengkapnya' functionality -->
    <script>
        document.querySelectorAll('.toggle-content').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const content = btn.previousElementSibling;
                const shortContent = content.querySelector('.short-content');
                const fullContent = content.querySelector('.full-content');

                // Check if both elements exist before proceeding
                if (shortContent && fullContent) {
                    if (fullContent.style.display === 'none') {
                        fullContent.style.display = 'block';
                        shortContent.style.display = 'none';
                        btn.textContent = 'Lihat lebih sedikit';
                    } else {
                        fullContent.style.display = 'none';
                        shortContent.style.display = 'block';
                        btn.textContent = 'Lihat selengkapnya';
                    }
                } else {
                    console.error('Short content or full content not found.');
                }
            });
        });
    </script>
@endsection
