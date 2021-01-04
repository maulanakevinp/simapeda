@extends('layouts.app')

@section('title', 'Detail Asset Tetap Lainnya')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Asset Tetap Lainnya</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("asset.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped">
                <tr>
                    <td width="50px">Nama Barang</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Kode Barang</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->kode_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Register</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->nomor_register }}</td>
                </tr>
                <tr>
                    <td width="50px">Jenis Asset</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->jenis_asset }}</td>
                </tr>
                @switch($asset->jenis_asset)
                    @case('Buku')
                        <tr>
                            <td width="50px">Judul Dan Pencipta Buku</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->judul_dan_pencipta_buku }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Spesifikasi Buku</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->spesifikasi_buku }}</td>
                        </tr>
                        @break
                    @case('Barang Kesenian')
                        <tr>
                            <td width="50px">Asal Daerah Kesenian</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->asal_daerah_kesenian }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Pencipta Kesenian</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->pencipta_kesenian }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Bahan Kesenian</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->bahan_kesenian }}</td>
                        </tr>
                        @break
                    @case('Hewan Ternak')
                        <tr>
                            <td width="50px">Jenis Hewan Ternak</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->jenis_hewan_ternak }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Ukuran Hewan Ternak</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->ukuran_hewan_ternak }} m</td>
                        </tr>
                        @break
                    @case('Tumbuhan')
                        <tr>
                            <td width="50px">Jenis Tumbuhan</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->jenis_tumbuhan }}</td>
                        </tr>
                        <tr>
                            <td width="50px">Ukuran Tumbuhan</td>
                            <td width="1px">:</td>
                            <td>{{ $asset->ukuran_tumbuhan }} cm</td>
                        </tr>
                        @break
                    @default
                @endswitch
                <tr>
                    <td width="50px">Jumlah</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->jumlah }}</td>
                </tr>
                <tr>
                    <td width="50px">Tahun Pengadaan</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->tahun_pengadaan }}</td>
                </tr>
                <tr>
                    <td width="50px">Penggunaan Barang</td>
                    <td width="1px">:</td>
                    <td>
                        @php
                            switch ($asset->penggunaan_barang) {
                                case '01': echo "Pemerintah Desa"; break;
                                case '02': echo "Badan Permusyawaratan Daerah"; break;
                                case '03': echo "PKK"; break;
                                case '04': echo "LKMD"; break;
                                case '05': echo "Karang Taruna"; break;
                                case '06': echo "RW"; break;
                            }
                        @endphp
                    </td>
                </tr>
                <tr>
                    <td width="50px">Asal Usul</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->asal_usul }}</td>
                </tr>
                <tr>
                    <td width="50px">Harga</td>
                    <td width="1px">:</td>
                    <td>Rp. {{ substr(number_format($asset->harga, 2, ',', '.'),0,-3) }}</td>
                </tr>
                <tr>
                    <td width="50px">Keterangan</td>
                    <td width="1px">:</td>
                    <td>{{ $asset->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
