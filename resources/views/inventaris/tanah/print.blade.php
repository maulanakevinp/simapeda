@extends('inventaris.print')
@section('title', 'KIB A')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>A. Tanah
@endsection
@section('table')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="3" style="vertical-align: middle" class="text-center" width="10px">No</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Jenis Barang / Nama Barang</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Nomor</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Luas</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Tahun Pengadaan</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Letak/Alamat</th>
                <th rowspan="1" colspan="3" style="vertical-align: middle" class="text-center">Status Tanah</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Penggunaan</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Asal Usul</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Harga</th>
                <th rowspan="3" style="vertical-align: middle" class="text-center">Keterangan</th>
            </tr>
            <tr>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Kode Barang</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Registrasi</th>
                <th rowspan="2" style="vertical-align: middle" class="text-center">Hak</th>
                <th rowspan="1" colspan="2" style="vertical-align: middle" class="text-center">Sertifikat</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center">Tanggal</th>
                <th style="vertical-align: middle" class="text-center">Nomor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanah as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_register }}</td>
                    <td style="vertical-align: middle;">{{ $item->luas_tanah }}m<sup>2</sup></td>
                    <td style="vertical-align: middle; text-align: center">{{ $item->tahun_pengadaan }}</td>
                    <td style="vertical-align: middle;">{{ $item->letak_atau_alamat }}</td>
                    <td style="vertical-align: middle;">{{ $item->hak_tanah }}</td>
                    <td style="vertical-align: middle;">{{ tgl($item->tanggal_sertifikat) }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_sertifikat }}</td>
                    <td style="vertical-align: middle;">{{ $item->penggunaan }}</td>
                    <td style="vertical-align: middle;">{{ $item->asal_usul }}</td>
                    <td style="vertical-align: middle;">Rp.{{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                    <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="12" class="text-right">Total</th>
                <th colspan="2" class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
