<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Agenda Surat Keluar</title>
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
    <div class="text-center mb-3" style="margin-top:20px">
        <h5 class="font-weight-bold text-uppercase">Desa {{ $desa->nama_desa }} Kecamatan {{ $desa->nama_kecamatan }} Kabupaten {{ $desa->nama_kabupaten }}<br>Agenda Surat Keluar {{ $tahun ? "Tahun $tahun" : '' }}</h5>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center">No.</th>
                <th style="vertical-align: middle; text-align: center">Nomor Surat</th>
                <th style="vertical-align: middle; text-align: center">Tanggal Surat</th>
                <th style="vertical-align: middle; text-align: center">Pengirim</th>
                <th style="vertical-align: middle; text-align: center">Isi Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surat_keluar as $item)
                <tr>
                    <td class="text-center" width="10px">{{ $loop->iteration }}</td>
                    <td>{{ $item->nomor_surat }}</td>
                    <td class="text-center" width="120px">{{ tgl($item->tanggal_surat) }}</td>
                    <td>{{ $item->pengirim }}</td>
                    <td>{{ $item->isi_singkat_atau_perihal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-4" style="padding:0px 80px">
            <p>Mengetahui<br>{{ $diketahui->jabatan }}</p>
            <p class="mb-0" style="margin-top: 80px; border-bottom: 1px solid black">{{ $diketahui->nama }}</p>
            <p>NIP. ..............................</p>
        </div>
        <div class="col-4">

        </div>
        <div class="col-4" style="padding:0px 80px">
            <p>{{ $desa->nama_desa }}, {{ tgl(date('Y-m-d')) }}<br>{{ $ditandatangani->jabatan }} {{ $desa->nama_desa }}</p>
            <p class="mb-0" style="margin-top: 80px; border-bottom: 1px solid black">{{ $ditandatangani->nama }}</p>
            <p>NIPD/NIP : {{ $ditandatangani->nip ? $ditandatangani->nip : $ditandatangani->nipd }}</p>
        </div>
    </div>

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
