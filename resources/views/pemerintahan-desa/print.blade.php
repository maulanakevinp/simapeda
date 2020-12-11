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
    <div class="text-center mb-3" style="margin-top:20px">
        <h5 class="font-weight-bold text-uppercase">Data Aparat Pemerintahan Desa</h5>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <div class="table-responsive">
            <table style="padding: 0px; font-size: 0.7rem">
                <tr>
                    <th width="150px">Desa</th>
                    <td width="10px">:</td>
                    <td>{{ $desa->nama_desa }}</td>
                </tr>
                <tr>
                    <th width="150px">Kecamatan</th>
                    <td width="10px">:</td>
                    <td>{{ $desa->nama_kecamatan }}</td>
                </tr>
                <tr>
                    <th width="150px">Kabupaten</th>
                    <td width="10px">:</td>
                    <td>{{ $desa->nama_kabupaten }}</td>
                </tr>
                <tr>
                    <th width="150px">Bulan / Tahun</th>
                    <td width="10px">:</td>
                    <td>{{ bulan(date('m')) }} / {{ date('Y') }}</td>
                </tr>
            </table>
        </div>
        <div style="">
            <p style="border: 1px solid black; width:100px" class="text-center p-2">Model A.4</p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle" class="text-center" width="10px">NO</th>
                <th style="vertical-align: middle" class="text-center">NAMA</th>
                <th style="vertical-align: middle" class="text-center">NIPD</th>
                <th style="vertical-align: middle" class="text-center">NIP</th>
                <th style="vertical-align: middle" class="text-center">JENIS KELAMIN</th>
                <th style="vertical-align: middle" class="text-center">TEMPAT TANGGAL LAHIR</th>
                <th style="vertical-align: middle" class="text-center">AGAMA</th>
                <th style="vertical-align: middle" class="text-center">PANGKAT / GOLONGAN</th>
                <th style="vertical-align: middle" class="text-center">JABATAN</th>
                <th style="vertical-align: middle" class="text-center">PENDIDIKAN TERAKHIR</th>
                <th style="vertical-align: middle" class="text-center">NOMOR DAN TANGGAL KEPUTUSAN PENGANGKATAN</th>
                <th style="vertical-align: middle" class="text-center">NOMOR DAN TANGGAL KEPUTUSAN PEMBERHENTIAN</th>
                <th style="vertical-align: middle" class="text-center">KETERANGAN (PERIODE/MASA JABATAN)</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center">1</th>
                <th style="vertical-align: middle" class="text-center">2</th>
                <th style="vertical-align: middle" class="text-center">3</th>
                <th style="vertical-align: middle" class="text-center">4</th>
                <th style="vertical-align: middle" class="text-center">5</th>
                <th style="vertical-align: middle" class="text-center">6</th>
                <th style="vertical-align: middle" class="text-center">7</th>
                <th style="vertical-align: middle" class="text-center">8</th>
                <th style="vertical-align: middle" class="text-center">9</th>
                <th style="vertical-align: middle" class="text-center">10</th>
                <th style="vertical-align: middle" class="text-center">11</th>
                <th style="vertical-align: middle" class="text-center">12</th>
                <th style="vertical-align: middle" class="text-center">13</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemerintahan_desa as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama }}</td>
                    <td style="vertical-align: middle;">{{ $item->nipd ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->nip ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->jenis_kelamin == 1 ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                    <td style="vertical-align: middle;">{{ $item->tempat_lahir }}, {{ tgl(date('Y-m-d',strtotime($item->tanggal_lahir))) }}</td>
                    <td style="vertical-align: middle;">{{ $item->agama->nama ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->pangkat_atau_golongan ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->jabatan ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->pendidikan->nama ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_sk_pengangkatan ?? '-' }}, {{ $item->tanggal_sk_pengangkatan ? tgl(date('Y-m-d', strtotime($item->tanggal_sk_pengangkatan))) : '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_sk_pemberhentian ?? '-' }}, {{ $item->tanggal_sk_pemberhentian ? tgl(date('Y-m-d', strtotime($item->tanggal_sk_pemberhentian))) : '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->masa_jabatan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-4" style="padding:0px 80px">
            <p>Mengetahui<br>{{ $diketahui->jabatan }}</p>
            <p class="mb-0" style="margin-top: 80px; border-bottom: 1px solid black">{{ $diketahui->nama }}</p>
            <p>NIPD/NIP : {{ $ditandatangani->nip ? $ditandatangani->nip : $ditandatangani->nipd }}</p>
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
