@extends('inventaris.print')
@section('title', 'KIB C')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>C. Gedung dan Bangunan
@endsection
@section('table')
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
@endsection
