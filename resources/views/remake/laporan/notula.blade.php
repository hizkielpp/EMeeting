{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    @yield('css')

    <style>
        .text-end {
            text-align: end !important;
        }

        * {
            font-family: 'Times New Roman', Times, serif
        }

        .arial {
            font-family: Arial, Helvetica, sans-serif
        }

        .bc {
            color: black !important;
        }

        .fs-7 {
            font-size: 7pt !important;
        }

        .fs-11 {
            font-size: 11pt !important;
        }

        .fs-12 {
            font-size: 12pt !important;
        }

        .fs-14 {
            font-size: 14pt !important;
        }

        .fs-16 {
            font-size: 16pt !important;
        }
    </style>
</head>

<body class="m-0 p-0">
    <table class="w-100">
        <tr>
            <td style="width:0px;"><img src="{{ asset('logo_undip.png') }}" width="113px" alt="">
            </td>
            <td style="width: auto">
                <span class="fs-11">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN
                    TEKNOLOGI</span><br>
                <span class="fs-16">UNIVERSITAS DIPONEOGORO</span><br>
                <span class="fs-14">FAKULTAS KEDOKTERAN</span>
            </td>
            <td style="width: auto" class="arial fs-7 text-end">
                Jalan Prof. Mr. Sunario<br>
                Kampus Universitas Diponegoro<br>
                Tembalang, Semarang, Kode Pos 50275<br>
                Telepon/Faksimile (024) 76928010/ 76928011<br>
                Laman: www.fk.undip.ac.id,<br>
                Pos-el: dean[at]fk.undip.ac.id
            </td>
        </tr>
    </table>
</body>

</html> --}}
<!doctype html>
<html lang="en">
@php
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
@endphp

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('notula.css') }}" type="text/css">
</head>

<body class="container">
    {{-- Header start --}}
    <header class="p-fixed">
        <table>
            <tr>
                <td class="w-0" style="padding: 20px">
                    <img src="{{ asset('logo_undip.png') }}" alt="Logo UNDIP" width="115px" />
                </td>
                <td class="w-half text-left">
                    <span class="fs-11">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN
                        TEKNOLOGI</span><br>
                    <span class="fs-16">UNIVERSITAS DIPONEOGORO</span><br>
                    @if (isset($unit))
                        {!! $unit !!}
                    @else
                        <span class="fs-14">FAKULTAS KEDOKTERAN</span>
                    @endif
                </td>
                <td class="w-half arial fs-7 text-right" style="padding: 20px">
                    Jalan Prof. Mr. Sunario<br>
                    Kampus Universitas Diponegoro<br>
                    Tembalang, Semarang, Kode Pos 50275<br>
                    Telepon/Faksimile (024) 76928010/ 76928011<br>
                    Laman: www.fk.undip.ac.id,<br>
                    Pos-el: dean[at]fk.undip.ac.id
                </td>
            </tr>
        </table>
    </header>
    {{-- Header end --}}

    <div class="margin-top fs-12 text-center">
        NOTULA
    </div>
    <div>
        <table class="deskripsi">
            <tr>
                <td>Nama Rapat</td>
                <td>:</td>
                <td>{{ $laporan->nama_rapat }}</td>
            </tr>
            <tr>
                <td>Hari, Tanggal</td>
                <td>:</td>
                <td>
                    {{ date('d', strtotime($laporan->tanggal_rapat)) . ' ' . $bulan[date('m', strtotime($laporan->tanggal_rapat))] . ' ' . date('Y', strtotime($laporan->tanggal_rapat)) }}
                </td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td>:</td>
                <td>{{ date('H:i:s', strtotime($laporan->tanggal_rapat)) }}</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>{{ $laporan->tempat }}</td>
            </tr>
            <tr>
                <td>Agenda</td>
                <td>:</td>
                <td>
                    @foreach ($laporan->susunans as $key => $item)
                        {!! $key + 1 . '. ' . $item->nama_susunan . '<br>' !!}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Pimpinan Rapat</td>
                <td>:</td>
                <td>Mas Wawan</td>
            </tr>
            <tr>
                <td>Peserta Rapat</td>
                <td>:</td>
                <td>
                    @foreach ($laporan->pesertas as $key => $item)
                        {!! $key + 1 . '. ' . $item->nama_peserta . '<br>' !!}
                    @endforeach
                </td>
            </tr>

        </table>
        <table class="bahasan">
            <tr>
                <td>Persoalan yang dibahas</td>
                <td>:</td>
                <td>
                    @foreach ($laporan->mahasiswa_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                    @foreach ($laporan->dosen_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                    @foreach ($laporan->tendik_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                    @foreach ($laporan->sarpras_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                    @foreach ($laporan->lain_lain_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Tanggapan peserta rapat</td>
                <td>:</td>
                <td>
                    @foreach ($laporan->tanggapan_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Simpulan</td>
                <td>:</td>
                <td>
                    @foreach ($laporan->simpulan_array as $item)
                        {!! $item . '<br>' !!}
                    @endforeach
                </td>
            </tr>
        </table>
        <table class="tanda_tangan">
            <tr>
                <td>{{ isset($laporan->nama_jabatan_KSM) ? $laporan->nama_jabatan_KSM : '' }}</td>
                <td>{{ isset($laporan->nama_jabatan_pejabat) ? $laporan->nama_jabatan_pejabat : '' }}</td>
            </tr>
            <tr>
                {{-- Tanda tangan --}}
                <td>
                    @if (isset($laporan->tanda_tangan_KSM))
                        <img src="{{ asset('tanda_tangan/' . $laporan->tanda_tangan_KSM) }}" width="200px"
                            alt="">
                    @endif
                </td>
                <td>
                <td>
                    @if (isset($laporan->tanda_tangan_pejabat))
                        <img src="{{ asset('tanda_tangan/' . $laporan->tanda_tangan_pejabat) }}" width="200px"
                            alt="">
                    @endif
                </td>
                </td>
            </tr>
            <tr>
                <td>Pak KSM</td>
                <td>Pak Sus</td>
            </tr>
            <tr>
                <td>252525</td>
                <td>262626</td>
            </tr>
        </table>
    </div>

</body>

</html>
