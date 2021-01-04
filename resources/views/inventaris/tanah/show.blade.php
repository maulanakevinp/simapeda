@extends('layouts.app')

@section('title', 'Detail Tanah')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Tanah</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("tanah.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <td>{{ $tanah->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Kode Barang</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->kode_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Register</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->nomor_register }}</td>
                </tr>
                <tr>
                    <td width="50px">Luas Tanah (M<sup>2</sup>)</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->luas_tanah }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Tahun Pengadaan</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->tahun_pengadaan }}</td>
                </tr>
                <tr>
                    <td width="50px">Letak/Alamat</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->letak_atau_alamat }}</td>
                </tr>
                <tr>
                    <td width="50px">Hak Tanah</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->hak_tanah }}</td>
                </tr>
                <tr>
                    <td width="50px">Penggunaan Barang</td>
                    <td width="1px">:</td>
                    <td>
                        @php
                            switch ($tanah->penggunaan_barang) {
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
                    <td width="50px">Tanggal Sertifikat</td>
                    <td width="1px">:</td>
                    <td>{{ tgl($tanah->tanggal_sertifikat) }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Sertifikat</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->nomor_sertifikat }}</td>
                </tr>
                <tr>
                    <td width="50px">Penggunaan</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->penggunaan }}</td>
                </tr>
                <tr>
                    <td width="50px">Asal Usul</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->asal_usul }}</td>
                </tr>
                <tr>
                    <td width="50px">Harga</td>
                    <td width="1px">:</td>
                    <td>Rp. {{ substr(number_format($tanah->harga, 2, ',', '.'),0,-3) }}</td>
                </tr>
                <tr>
                    <td width="50px">Keterangan</td>
                    <td width="1px">:</td>
                    <td>{{ $tanah->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
