@extends('inventaris.print')
@section('title', 'KIB D')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>D. Jalan, Irigasi, dan Jaringan
@endsection
@section('table')
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2" style="vertical-align: middle" class="text-center" width="10px">No</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Nama Barang</th>
            <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Nomor</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Kontruksi</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Panjang</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Lebar</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Luas</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Letak/Lokasi</th>
            <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Dokumen</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Status Tanah</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Nomor Tanah</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Asal Usul</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Harga</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Kondisi</th>
            <th rowspan="2" style="vertical-align: middle" class="text-center">Keterangan</th>
        </tr>
        <tr>
            <th style="vertical-align: middle" class="text-center">Kode Barang</th>
            <th style="vertical-align: middle" class="text-center">Registrasi</th>
            <th style="vertical-align: middle" class="text-center">Tanggal</th>
            <th style="vertical-align: middle" class="text-center">Nomor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jalan as $item)
            <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
                <td style="vertical-align: middle;">{{ $item->nomor_register }}</td>
                <td style="vertical-align: middle;">{{ $item->kontruksi }}</td>
                <td style="vertical-align: middle;">{{ $item->panjang }} m</td>
                <td style="vertical-align: middle;">{{ $item->lebar }} m</td>
                <td style="vertical-align: middle;">{{ $item->luas }} m</td>
                <td style="vertical-align: middle;">{{ $item->letak_atau_lokasi }}</td>
                <td style="vertical-align: middle;">{{ tgl($item->tanggal_dokumen_kepemilikan) }}</td>
                <td style="vertical-align: middle;">{{ $item->nomor_kepemilikan }}</td>
                <td style="vertical-align: middle;">{{ $item->status_tanah }}</td>
                <td style="vertical-align: middle;">{{ $item->nomor_kode_tanah }}</td>
                <td style="vertical-align: middle;">{{ $item->asal_usul }}</td>
                <td style="vertical-align: middle;">Rp.{{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                <td style="vertical-align: middle;">{{ $item->kondisi_bangunan }}</td>
                <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="14" class="text-right">Total</th>
            <th colspan="3" class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
        </tr>
    </tfoot>
</table>
@endsection
