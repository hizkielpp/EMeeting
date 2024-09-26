<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <style>
        * {
            font-family: 'Times New Roman', Times, serif
        }

        .fs-8 {
            font-size: 8px;
        }

        .fs-16 {
            font-size: 16px;
        }

        .fs-18 {
            font-size: 18px;
        }
    </style>
</head>

<div class="container w-100 p-0 m-0">
    <table class="w-100">
        <tr>
            <td>
                {{-- logo undip --}}
                <img width="150" src="{{ asset('logo_undip.png') }}" alt="">
            </td>
            <td>
                {{-- nama lembaga --}}
                <p class="fs-16 m-0">
                    KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,<br>
                    RISET, DAN TEKNOLOGI
                </p>
                <p class="fs-18">
                    UNIVERSITAS DIPONEGORO <br>
                    FAKULTAS KEDOKTERAN
                </p>
            </td>
            <td class="text-end fs-8">
                {{-- alamat --}}
                Gedung Widya Puraya<br>
                Jalan Prof. Sudarto, S.H.<br>
                Tembalang, Semarang, Kode Pos 50275<br>
                Telepon (024) 7460036, Faksimile (024) 7460027<br>
                Laman:<u>www.undip.ac.id</u>,Pos-el: humas[at]live.undip.ac.id
            </td>
        </tr>

    </table>
</div>

<script></script>

</html>
