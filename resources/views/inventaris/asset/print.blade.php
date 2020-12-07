@extends('inventaris.print')
@section('title', 'KIB E')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>E. Asset Tetap Lainnya
@endsection
@section('table')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">No</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Nama Barang</th>
                <th style="vertical-align: middle;" class="text-center" colspan="2">Nomor</th>
                <th style="vertical-align: middle;" class="text-center" colspan="2">Buku / Perpustakaan</th>
                <th style="vertical-align: middle;" class="text-center" colspan="3">Barang Bercorak Kesenian/Kebudayaan</th>
                <th style="vertical-align: middle;" class="text-center" colspan="2">Hewan / Ternak</th>
                <th style="vertical-align: middle;" class="text-center" colspan="2">Tumbuhan</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Jumlah</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Tahun Cetak / Pembelian</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Asal Usul</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Harga</th>
                <th style="vertical-align: middle;" class="text-center" rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <th style="vertical-align: middle;" class="text-center">Kode Barang</th>
                <th style="vertical-align: middle;" class="text-center">Register</th>
                <th style="vertical-align: middle;" class="text-center">Judui / Pencipta</th>
                <th style="vertical-align: middle;" class="text-center">Spesifikasi</th>
                <th style="vertical-align: middle;" class="text-center">Asal Daerah</th>
                <th style="vertical-align: middle;" class="text-center">Pencipta</th>
                <th style="vertical-align: middle;" class="text-center">Bahan</th>
                <th style="vertical-align: middle;" class="text-center">Jenis</th>
                <th style="vertical-align: middle;" class="text-center">Ukuran</th>
                <th style="vertical-align: middle;" class="text-center">Jenis</th>
                <th style="vertical-align: middle;" class="text-center">Ukuran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asset as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
                    <td style="vertical-align: middle;">{{ $item->nomor_register }}</td>
                    <td style="vertical-align: middle;">{{ $item->judul_dan_pencipta_buku ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->spesifikasi_buku ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->asal_daerah_kesenian ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->pencipta_kesenian ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->bahan_kesenian ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->jenis_hewan_ternak ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->ukuran_hewan_ternak ? $item->ukuran_hewan_ternak . ' m' : '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->jenis_tumbuhan ?? '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->ukuran_tumbuhan ? $item->ukuran_tumbuhan . ' cm' : '-' }}</td>
                    <td style="vertical-align: middle;">{{ $item->jumlah }}</td>
                    <td style="vertical-align: middle;">{{ $item->tahun_pengadaan }}</td>
                    <td style="vertical-align: middle;">{{ $item->asal_usul }}</td>
                    <td style="vertical-align: middle;">Rp.{{ substr(number_format($item->harga, 2, ',', '.'),0,-3) }}</td>
                    <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="16" class="text-right">Total</th>
                <th colspan="2" class="text-right">Rp. {{ substr(number_format($total, 2, ',', '.'),0,-3) }}</th>
            </tr>
        </tfoot>
    </table>
@endsection
