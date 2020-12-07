@extends('inventaris.print')
@section('title', 'KIB B')
@section('judul')
KARTU INVENTARIS BARANG (KIB)<br>B. Peralatan Dan Mesin
@endsection
@section('table')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle" class="text-center" width="10px">No</th>
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
@endsection
