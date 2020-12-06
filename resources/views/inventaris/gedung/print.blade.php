<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>KIB C</title>
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
        <h5 class="font-weight-bold text-uppercase">KARTU INVENTARIS BARANG (KIB)<br>C. Gedung Dan Bangunan</h5>
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
                <th rowspan="2" style="vertical-align: middle" class="text-center" width="10px">No</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Barang</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Nomor</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Kondisi Bangunan</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Kontruksi Bangunan</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Letak/Lokasi</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Dokumen</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Luas</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Status Tanah</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nomor Tanah</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Asal Usul</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Harga</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Keterangan</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center">Kode Barang</th>
                <th style="vertical-align: middle" class="text-center">Registrasi</th>
                <th style="vertical-align: middle" class="text-center">Tingkat</th>
                <th style="vertical-align: middle" class="text-center">Beton</th>
                <th style="vertical-align: middle" class="text-center">Tanggal</th>
                <th style="vertical-align: middle" class="text-center">Nomor</th>
                <th style="vertical-align: middle" class="text-center">Bangunan</th>
                <th style="vertical-align: middle" class="text-center">Tanah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gedung as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_register }}</td>
                    <td style="vertical-align: middle;">{{ $item->kondisi_bangunan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->bangunan_bertingkat }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->kontruksi_beton == '1' ? 'Ya' : 'Tidak' }}</td>
                    <td style="vertical-align: middle;">{{ $item->letak_atau_lokasi }}</td>
                    <td style="vertical-align: middle;">{{ tgl($item->tanggal_dokumen_bangunan) }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_bangunan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->luas_bangunan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->luas_tanah }}</td>
                    <td style="vertical-align: middle;">{{ $item->status_tanah }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_kode_tanah }}</td>
                    <td style="vertical-align: middle;">{{ $item->asal_usul }}</td>
                    <td style="vertical-align: middle;">Rp.{{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                    <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="15" class="text-right">Total</th>
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
