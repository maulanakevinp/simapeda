@extends('layouts.app')

@section('title', 'Detail Gedung Dan Bangunan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Gedung Dan Bangunan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("gedung.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <td>{{ $gedung->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Kode Barang</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->kode_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Register</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->nomor_register }}</td>
                </tr>
                <tr>
                    <td width="50px">Kondisi Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->kondisi_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Bangunan Bertingkat</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->bangunan_bertingkat }}</td>
                </tr>
                <tr>
                    <td width="50px">Kontruksi Beton</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->kontruksi_beton == 1 ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td width="50px">Luas Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->luas_bangunan }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Letak / Lokasi</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->letak_atau_lokasi }}</td>
                </tr>
                <tr>
                    <td width="50px">Tahun Pengadaan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->tahun_pengadaan }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->nomor_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Tanggal Dokumen Bangunan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->tanggal_dokumen_bangunan }}</td>
                </tr>
                <tr>
                    <td width="50px">Status Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->status_tanah }}</td>
                </tr>
                <tr>
                    <td width="50px">Luas Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->luas_tanah }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Nomor Kode Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->nomor_kode_tanah }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Penggunaan Barang</td>
                    <td width="1px">:</td>
                    <td>
                        @php
                            switch ($gedung->penggunaan_barang) {
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
                    <td>{{ $gedung->asal_usul }}</td>
                </tr>
                <tr>
                    <td width="50px">Harga</td>
                    <td width="1px">:</td>
                    <td>Rp. {{ substr(number_format($gedung->harga, 2, ',', '.'),0,-3) }}</td>
                </tr>
                <tr>
                    <td width="50px">Keterangan</td>
                    <td width="1px">:</td>
                    <td>{{ $gedung->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
