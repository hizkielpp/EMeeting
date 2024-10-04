@extends('remake.template')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Riwayat Laporan</h5>

            <!-- Search Form -->
            <form action="{{ route('log_laporan_pimpinan') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari laporan..."
                        value="{{ request('search') }}">
                    <input type="hidden" name="id_user" class="form-control" value="{{ request('id_user') }}">
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
                                    <td class="text-wrap w-75 align-top">
                                        <div class="content">
                                            <b>Persoalan yang dibahas</b><br>
                                            <div class="short-content">
                                                {!! Str::limit(implode('<br>', $item->persoalan_array), 400) !!}
                                            </div>
                                            <div class="full-content" style="display: none;">
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
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="toggle-content">Lihat selengkapnya</a>
                                        {{-- <b>Persoalan yang dibahas</b><br>
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
                            @endforeach --}}
                                    </td>
                                    <td class="align-top">
                                        <div class="d-flex flex-column gap-3">
                                            <a href="{{ route('print_notula') . '?id=' . $item->id }}">
                                                <iconify-icon class="text-black fs-6 pointer w-100" data-toggle="tooltip"
                                                    data-placement="top" title="Print" icon="teenyicons:print-solid"
                                                    style="cursor: pointer"></iconify-icon>
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
