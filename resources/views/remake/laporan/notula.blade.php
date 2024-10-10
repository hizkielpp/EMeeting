<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMeeting</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo_undip.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    @yield('css')

    <style>
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
            <td style="width:0px;"><img class="p-3" src="{{ asset('logo_undip.png') }}" width="113px"
                    alt="">
            </td>
            <td style="width: auto">
                <span class="fs-11">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN
                    TEKNOLOGI</span><br>
                <span class="fs-16">UNIVERSITAS DIPONEOGORO</span><br>
                <span class="fs-14">FAKULTAS KEDOKTERAN</span>
            </td>
            <td class="text-end" style="width: auto" class="arial fs-7">
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

</html>
