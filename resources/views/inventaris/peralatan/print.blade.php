<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>KIB A</title>
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
        .table-sm td, .table-sm th {
            padding: 0px;
        }
    </style>
</head>

<body onload="window.print()" oncontextmenu="return false;">
    <div class="text-center mb-3" style="margin-top:20px">
        <h5 class="font-weight-bold text-uppercase">KARTU INVENTARIS BARANG (KIB)<br>A. TANAH</h5>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="table-responsive mb-3">
                <table style="font-size: 0.7rem">
                    <tr>
                        <td class="font-weight-bold" width="150px">Desa</td>
                        <td width="10px">:</td>
                        <td>{{ $desa->nama_desa }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" width="150px">Kecamatan</td>
                        <td width="10px">:</td>
                        <td>{{ $desa->nama_kecamatan }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold" width="150px">Kabupaten</td>
                        <td width="10px">:</td>
                        <td>{{ $desa->nama_kabupaten }}</td>
                    </tr>
                    @if ($tahun)
                        <tr>
                            <td class="font-weight-bold" width="150px">Tahun</td>
                            <td width="10px">:</td>
                            <td>{{ $tahun }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        <div class="col-4"></div>
        <div class="col-4 text-right">
            <p style="font-size: 0.8rem">KODE LOKASI : _ _._ _._ _._ _._ _._ _._ _ _</p>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle" class="text-center" width="10px">NO</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Jenis Barang / Nama Barang</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Nomor</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Merk/Type</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Ukuran/CC</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Bahan</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Tahun Pembelian</th>
                <th rowspan="1" colspan="5" style="vertical-align: middle" class="text-center">Nomor</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Asal Usul</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Harga</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Keterangan</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center">Kode Barang</th>
                <th style="vertical-align: middle" class="text-center">Registrasi</th>
                <th style="vertical-align: middle" class="text-center">Pabrik</th>
                <th style="vertical-align: middle" class="text-center">Rangka</th>
                <th style="vertical-align: middle" class="text-center">Mesin</th>
                <th style="vertical-align: middle" class="text-center">Polisi</th>
                <th style="vertical-align: middle" class="text-center">BPKB</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peralatan as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_register }}</td>
                    <td style="vertical-align: middle;">{{ $item->merk_atau_type }}</td>
                    <td style="vertical-align: middle;">{{ $item->ukuran_atau_cc }}</td>
                    <td style="vertical-align: middle;">{{ $item->bahan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->tahun_pembelian }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_pabrik }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_rangka }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_mesin }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_polisi }}</td>
                    <td style="vertical-align: middle;">{{ $item->bpkb }}</td>
                    <td style="vertical-align: middle;">{{ $item->asal_usul }}</td>
                    <td style="vertical-align: middle;">Rp.{{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                    <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="14" class="text-right">Total</th>
                <th colspan="2" class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="col-4" style="padding:0px 80px">
            <p>Mengetahui<br>Kepala SKPD</p>
            <p class="mb-0" style="margin-top: 80px; border-bottom: 1px solid black">........................................</p>
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
