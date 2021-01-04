@extends('layouts.app')

@section('title', 'Detail Kontruksi Dalam Pengerjaan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Kontruksi Dalam Pengerjaan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("kontruksi.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <td>{{ $kontruksi->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Fisik Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->fisik_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Bangunan Bertingkat</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->bangunan_bertingkat }}</td>
                </tr>
                <tr>
                    <td width="50px">Kontruksi Beton</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->kontruksi_beton == 1 ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td width="50px">Luas</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->luas }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Letak / Lokasi</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->letak_atau_lokasi }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->nomor_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Tanggal Dokumen Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->tanggal_dokumen_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Tanggal Mulai</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <td width="50px">Status Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->status_tanah }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Kode Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->nomor_kode_tanah }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Asal Usul</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->asal_usul }}</td>
                </tr>
                <tr>
                    <td width="50px">Harga</td>
                    <td width="1px">:</td>
                    <td>Rp. {{ substr(number_format($kontruksi->harga, 2, ',', '.'),0,-3) }}</td>
                </tr>
                <tr>
                    <td width="50px">Keterangan</td>
                    <td width="1px">:</td>
                    <td>{{ $kontruksi->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
