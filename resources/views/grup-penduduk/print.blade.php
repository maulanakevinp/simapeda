<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Daftar Peserta Grup Pemerintahan Desa {{ $desa->nama }}</title>
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
        <h5 class="font-weight-bold text-uppercase">Daftar Peserta Grup {{ $grup->nama }}</h5>
    </div>
    <table style="padding: 0px; font-size: 0.7rem">
        <tr>
            <td width="100px">Nama Grup</td>
            <td width="1px">:</td>
            <td>{{ $grup->nama }}</td>
        </tr>
        <tr>
            <td width="100px">Sasaran Peserta</td>
            <td width="1px">:</td>
            <td>{{ $grup->sasaran == 1 ? 'Penduduk' : 'Keluarga' }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top" width="100px">Keterangan</td>
            <td style="vertical-align: top" width="1px">:</td>
            <td style="vertical-align: top">{{ $grup->keterangan }}</td>
        </tr>
    </table>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">No. KK</th>
                <th class="text-center">Nama Penduduk</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grup->grup_penduduk as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->nik }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->kk }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->nama }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->tempat_lahir }}</td>
                    <td style="vertical-align: middle">{{ tgl($item->penduduk->tanggal_lahir) }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td style="vertical-align: middle">{{ $item->penduduk->alamat_sekarang ? $item->penduduk->alamat_sekarang : $item->penduduk->alamat_sebelumnya }}</td>
                    <td style="vertical-align: middle">{{ $item->keterangan }}</td>
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
