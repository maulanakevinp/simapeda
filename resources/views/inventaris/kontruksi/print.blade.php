@extends('inventaris.print')
@section('title', 'KIB F')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>F. Kontruksi Dalam Pengerjaan
@endsection
@section('table')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle" class="text-center" width="10px">No</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Barang</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Bangunan</th>
                <th colspan="2" style="vertical-align: middle" class="text-center">Bangunan Bertingkat</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Luas</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Letak/Lokasi</th>
                <th colspan="2" style="vertical-align: middle" class="text-center">Dokumen</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Tanggal Mulai</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Status Tanah</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nomor Kode Tanah</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Asal Usul Pembiayaan</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Nilai Kontrak</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Keterangan</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center">Tingkat</th>
                <th style="vertical-align: middle" class="text-center">Beton</th>
                <th style="vertical-align: middle" class="text-center">Tanggal</th>
                <th style="vertical-align: middle" class="text-center">Nomor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kontruksi as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->fisik_bangunan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->bangunan_bertingkat }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->kontruksi_beton == '1' ? 'Ya' : 'Tidak' }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->luas }}</td>
                    <td style="vertical-align: middle;">{{ $item->letak_atau_lokasi }}</td>
                    <td style="vertical-align: middle;">{{ tgl($item->tanggal_dokumen_bangunan) }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_bangunan }}</td>
                    <td style="vertical-align: middle; text-align: center">{{ tgl($item->tanggal_mulai) }}</td>
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
                <th colspan="13" class="text-right">Total</th>
                <th colspan="2" class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
