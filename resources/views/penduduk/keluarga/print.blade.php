<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Salinan Kartu Keluarga - Desa {{ $desa->nama }}</title>
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
    <div class="text-center">
        <h2 class="font-weight-bold">SALINAN KARTU KELUARGA</h2>
        <p>No. {{ $penduduk[0]->kk }}</p>
    </div>

    <div class="row mb-3">
        <div class="col-4">
            <table style="padding:0px; font-size: 0.7rem">
                <tr>
                    <td>ALAMAT</td>
                    <td>:</td>
                    <td>{{ $penduduk[0]->alamat_sekarang ?? '-' }}</td>
                </tr>
                <tr>
                    <td>RT/RW</td>
                    <td>:</td>
                    <td>{{ $penduduk[0]->detailDusun->rt ?? '-' }}/{{ $penduduk[0]->detailDusun->rw ?? '-' }}</td>
                </tr>
                <tr>
                    <td>DESA/KELURAHAN</td>
                    <td>:</td>
                    <td>{{ $desa->nama_desa }}</td>
                </tr>
                <tr>
                    <td>KECAMATAN</td>
                    <td>:</td>
                    <td>{{ $desa->nama_kecamatan }}</td>
                </tr>
            </table>
        </div>
        <div class="col-4"></div>
        <div class="col-4 d-flex justify-content-end">
            <table style="padding:0px; font-size: 0.7rem">
                <tr>
                    <td>KABUPATEN</td>
                    <td>:</td>
                    <td>{{ $desa->nama_kabupaten }}</td>
                </tr>
                <tr>
                    <td>KODEPOS</td>
                    <td>:</td>
                    <td>{{ $desa->kodepos }}</td>
                </tr>
                <tr>
                    <td>PROVINSI</td>
                    <td>:</td>
                    <td>{{ $desa->nama_provinsi }}</td>
                </tr>
                <tr>
                    <td>JUMLAH ANGGOTA</td>
                    <td>:</td>
                    <td>{{ count($penduduk) }}</td>
                </tr>
            </table>
        </div>
    </div>

    <table class="mb-3 table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle" class="text-center" width="50px">No</th>
                <th style="vertical-align: middle" class="text-center">Nama Lengkap</th>
                <th style="vertical-align: middle" class="text-center">NIK</th>
                <th style="vertical-align: middle" class="text-center" width="100px">Jenis Kelamin</th>
                <th style="vertical-align: middle" class="text-center">Tempat Lahir</th>
                <th style="vertical-align: middle" class="text-center">Tanggal Lahir</th>
                <th style="vertical-align: middle" class="text-center">Agama</th>
                <th style="vertical-align: middle" class="text-center">Pendidikan</th>
                <th style="vertical-align: middle" class="text-center">Pekerjaan</th>
            </tr>
            <tr>
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
                <th class="text-center">7</th>
                <th class="text-center">8</th>
                <th class="text-center">9</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $item)
                <tr>
                    <td class="text-center">{{ $item->nomor_urut_dalam_kk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->jenis_kelamin == 1 ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ date('d-m-y',strtotime($item->tanggal_lahir)) }}</td>
                    <td>{{ $item->agama->nama ?? '-' }}</td>
                    <td>{{ $item->pendidikan->nama ?? '-' }}</td>
                    <td>{{ $item->pekerjaan->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="mb-4 table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle" style="text-align: center;">No</th>
                <th style="vertical-align: middle" style="text-align: center;">Status Perkawinan</th>
                <th style="vertical-align: middle" style="text-align: center;">Status Hubungan Dalam Keluarga</th>
                <th style="vertical-align: middle" style="text-align: center;">Kewarganegaraan</th>
                <th style="vertical-align: middle" style="text-align: center;">No. Paspor</th>
                <th style="vertical-align: middle" style="text-align: center;">No. KITAS/KITAP</th>
                <th style="vertical-align: middle" style="text-align: center;">Ayah</th>
                <th style="vertical-align: middle" style="text-align: center;">Ibu</th>
            </tr>
            <tr>
                <th class="text-center"></th>
                <th class="text-center">10</th>
                <th class="text-center">11</th>
                <th class="text-center">12</th>
                <th class="text-center">13</th>
                <th class="text-center">14</th>
                <th class="text-center">15</th>
                <th class="text-center">16</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $item)
                <tr>
                    <td class="text-center">{{ $item->nomor_urut_dalam_kk }}</td>
                    <td>{{ $item->statusPerkawinan->nama ?? '-' }}</td>
                    <td>{{ $item->statusHubunganDalamKeluarga->nama ?? '-' }}</td>
                    <td>
                        @php
                            if ($item->kewarganegaraan == 1) {
                                echo 'Warga Negara Indonesia';
                            } elseif ($item->kewarganegaraan == 2) {
                                echo 'Warga Negara Asing';
                            } else {
                                echo 'Dwi Kewarganegaraan';
                            }
                        @endphp
                    </td>
                    <td>{{ $item->nomor_paspor }}</td>
                    <td>{{ $item->nomor_kitas_atau_kitap }}</td>
                    <td>{{ $item->nama_ayah }}</td>
                    <td>{{ $item->nama_ibu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-4 text-center">
            <p class="mt-4">KEPALA KELUARGA</p>
            <p style="margin-top: 80px">{{ $penduduk[0]->nama }}</p>
        </div>
        <div class="col-4 text-center">

        </div>
        <div class="col-4 text-center">
            <p>{{ $desa->nama_desa }}, {{ tgl(date('Y-m-d')) }}<br>KEPALA DESA {{ $desa->nama_desa }}</p>
            <p style="margin-top: 80px">{{ $desa->nama_kepala_desa }}</p>
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
