<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: rgb(22, 22, 22);
        }

        .judul {
            text-align: center;
        }

        .container {
            padding-right: 10vh;
            padding-left: 10vh;
            padding-top: 10vh;
        }

        .d {
            padding-top: 5px;
            padding-left: 5px;
        }

        .hr {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <div class="judul">
        <h2>LAPORAN PENGADUAN MASYARAKAT</h2>
    </div>
    <hr class="hr"><br><br>

    <div class="mt-5">
        <p>Dari tanggal {{ $from }} sampai {{ $to }}</p>
        <table id="customers">
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Isi Laporan</th>
                <th>Waktu Pengaduan</th>
            </tr>
            @foreach ($lapor as $l)
                <tr>
                    <td>{{ $l->nik }}</td>
                    <td>{{ $l->nama }}</td>
                    <td>{{ $l->lokasi }}</td>
                    <td>{{ $l->isi_laporan }}</td>
                    <td>{{ $l->created_at }}</td>
                </tr>
            @endforeach

        </table>
        @if ($lapor->count() == 0)
            <div class="alert alert-secondary" role="alert">
                Maaf Tidak Ada Laporan dari {{ $from }} sampai {{ $to }}
            </div>
        @endif
</body>

</html>
</div>
