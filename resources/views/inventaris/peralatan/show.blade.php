@extends('layouts.app')

@section('title', 'Detail Peralatan Dan Mesin')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Peralatan Dan Mesin</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("peralatan.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                    <td>{{ $peralatan->nama_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Kode Barang</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->kode_barang }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Register</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->nomor_register }}</td>
                </tr>
                <tr>
                    <td width="50px">Merk/Type</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->merk_atau_type }} M<sup>2</sup></td>
                </tr>
                <tr>
                    <td width="50px">Ukuruan/CC</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->ukuran_atau_cc }}</td>
                </tr>
                <tr>
                    <td width="50px">Bahan</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->bahan }}</td>
                </tr>
                <tr>
                    <td width="50px">Tahun Pembelian</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->tahun_pembelian }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Pabrik</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->nomor_pabrik }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Rangka</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->nomor_rangka }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Mesin</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->nomor_mesin }}</td>
                </tr>
                <tr>
                    <td width="50px">Nomor Polisi</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->nomor_polisi }}</td>
                </tr>
                <tr>
                    <td width="50px">BPKB</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->bpkb }}</td>
                </tr>
                <tr>
                    <td width="50px">Penggunaan Barang</td>
                    <td width="1px">:</td>
                    <td>
                        @php
                            switch ($peralatan->penggunaan_barang) {
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
                    <td>{{ $peralatan->asal_usul }}</td>
                </tr>
                <tr>
                    <td width="50px">Harga</td>
                    <td width="1px">:</td>
                    <td>Rp. {{ substr(number_format($peralatan->harga, 2, ',', '.'),0,-3) }}</td>
                </tr>
                <tr>
                    <td width="50px">Keterangan</td>
                    <td width="1px">:</td>
                    <td>{{ $peralatan->keterangan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
