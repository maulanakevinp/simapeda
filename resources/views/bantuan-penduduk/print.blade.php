<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Data Aparat Pemerintahan Desa {{ $desa->nama }}</title>
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{ url(Storage::url($desa->logo)) }}" type="image/png">
    <style type="text/css" media="print">
        body{
            background-color: white;
            font-family: 'Times New Roman', Times, serif;
        }
        @media print{
            @page {
                margin: 0.5cm;
                size: 330mm 215mm;
            }
        }
        .table th {
            background-color: rgb(225, 225, 225) !important;
            border: 1px solid black !important;
        }
        .table td {
            border: 1px solid black !important;
        }
        .table th, .table td {
            padding: 4px;
            font-size: 0.7rem;
        }
    </style>
</head>

<body onload="window.print()" oncontextmenu="return false;">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center text-center text-md-left">
        <img src="{{ asset(Storage::url($desa->logo)) }}" alt="" height="70px" class="mr-3">
        <div class="text-center">
            <h5 class="text-uppercase font-weight-bold">Pemerintahan Kabupaten {{ $desa->nama_kabupaten }} <br> Kecamatan {{ $desa->nama_kecamatan }} <br> Desa {{ $desa->nama_desa }}</h5>
        </div>
    </div>
    <hr style="border-top: 5px double #000000; margin-top: 5px">
    <div class="text-center mb-3">
        <h5 class="font-weight-bold text-uppercase">Daftar Peserta Program {{ $bantuan->nama_program }}</h5>
    </div>
    <table style="padding: 0px; font-size: 0.7rem">
        <tr>
            <td width="100px">Nama Program</td>
            <td width="1px">:</td>
            <td>{{ $bantuan->nama_program }}</td>
        </tr>
        <tr>
            <td width="100px">Sasaran Peserta</td>
            <td width="1px">:</td>
            <td>{{ $bantuan->sasaran_program == 1 ? 'Penduduk' : 'Keluarga' }}</td>
        </tr>
        <tr>
            <td width="100px">Masa Berlaku</td>
            <td width="1px">:</td>
            <td>{{ tgl($bantuan->tanggal_mulai) }} - {{ tgl($bantuan->tanggal_berakhir) }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top" width="100px">Keterangan</td>
            <td style="vertical-align: top" width="1px">:</td>
            <td style="vertical-align: top">{{ $bantuan->keterangan }}</td>
        </tr>
    </table>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle" class="text-center">No</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">NIK</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">No. KK</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Penduduk</th>
                <th colspan="7" class="text-center">Identitas Di Kartu Peserta</th>
            </tr>
            <tr>
                <th class="text-center">No. Kartu Peserta</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bantuan->bantuan_penduduk as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->penduduk->nik }}</td>
                    <td>{{ $item->penduduk->kk }}</td>
                    <td>{{ $item->penduduk->nama }}</td>
                    <td>{{ $item->nomor_kartu_peserta }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ tgl($item->tanggal_lahir) }}</td>
                    <td>{{ $item->penduduk->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)) {
                return false;
            }
        }
    </script>
</body>

</html>
