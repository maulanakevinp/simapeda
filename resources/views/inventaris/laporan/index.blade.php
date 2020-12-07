@extends('layouts.app')

@section('title', 'Laporan Semua Asset')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Laporan Semua Asset</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <div class="dropdown mb-2">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        Kategori Inventaris
                                    </a>
                                    @include('inventaris.kategori')
                                </div>
                                <a href="#print" id="btn-print" data-toggle="tooltip" class="btn btn-secondary" title="Cetak"><i class="fas fa-print"></i></a>
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
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="vertical-align: middle" class="text-center" rowspan="3">No</th>
                        <th style="vertical-align: middle" class="text-center" rowspan="3">Jenis Barang</th>
                        <th style="vertical-align: middle" class="text-center" rowspan="3">Keterangan</th>
                        <th style="vertical-align: middle" class="text-center" colspan="7">Asal barang</th>
                        <th style="vertical-align: middle" class="text-center" rowspan="3" >Opsi</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle" class="text-center" rowspan="2">Dibeli Sendiri</th>
                        <th style="vertical-align: middle" class="text-center" colspan="3">Bantuan</th>
                        <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Sumbangan</th>
                        <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Hak Adat</th>
                        <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Hibah</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle" class="text-center" >Pemerintah</th>
                        <th style="vertical-align: middle" class="text-center" >Provinsi</th>
                        <th style="vertical-align: middle" class="text-center" >Kabupaten</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">1</td>
                        <td style="vertical-align: middle" nowrap>Tanah Kas Desa</td>
                        <td style="vertical-align: middle">Informasi mengenai segala yang menyangkut dengan tanah (dalam hal ini tanah yang digunakan dalam instansi tersebut).</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['tanah_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('tanah.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">2</td>
                        <td style="vertical-align: middle" nowrap>Peralatan dan Mesin</td>
                        <td style="vertical-align: middle">Informasi mengenai peralatan dan mesin</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['peralatan_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('peralatan.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">3</td>
                        <td style="vertical-align: middle" nowrap>Gedung dan Bangunan</td>
                        <td style="vertical-align: middle">Informasi mengenai gedung dan bangunan yang dimiliki.</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['gedung_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('gedung.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">4</td>
                        <td style="vertical-align: middle" nowrap> Jalan Irigasi dan Jaringan</td>
                        <td style="vertical-align: middle">Informasi mengenai jaringan, seperti listrik atau Internet.</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['jalan_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('jalan.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">5</td>
                        <td style="vertical-align: middle" nowrap> Asset Tetap Lainnya</td>
                        <td style="vertical-align: middle">Informasi mengenai aset tetap seperti barang habis pakai contohnya buku-buku.</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['asset_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('asset.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle" class="text-center">6</td>
                        <td style="vertical-align: middle" nowrap>Kontruksi Dalam Pengerjaan</td>
                        <td style="vertical-align: middle">Informasi mengenai bangunan yang masih dalam pengerjaan.</td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_pembelian_sendiri'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_bantuan_pemerintah'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_bantuan_provinsi'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_bantuan_kabupaten'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_sumbangan'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_hak_adat'] }}
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            {{ $jumlah['kontruksi_hibah'] }}
                        </td>
                        <td style="vertical-align: middle">
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="{{  route('kontruksi.index')  }}" title="Lihat Data" data-toggle="tooltip" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th class="text-center">{{ $jumlah['tanah_pembelian_sendiri']   + $jumlah['peralatan_pembelian_sendiri']    + $jumlah['gedung_pembelian_sendiri']   + $jumlah['jalan_pembelian_sendiri']    + $jumlah['asset_pembelian_sendiri']    + $jumlah['kontruksi_pembelian_sendiri'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_bantuan_pemerintah']  + $jumlah['peralatan_bantuan_pemerintah']   + $jumlah['gedung_bantuan_pemerintah']  + $jumlah['jalan_bantuan_pemerintah']   + $jumlah['asset_bantuan_pemerintah']   + $jumlah['kontruksi_bantuan_pemerintah'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_bantuan_provinsi']    + $jumlah['peralatan_bantuan_provinsi']     + $jumlah['gedung_bantuan_provinsi']    + $jumlah['jalan_bantuan_provinsi']     + $jumlah['asset_bantuan_provinsi']     + $jumlah['kontruksi_bantuan_provinsi'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_bantuan_kabupaten']   + $jumlah['peralatan_bantuan_kabupaten']    + $jumlah['gedung_bantuan_kabupaten']   + $jumlah['jalan_bantuan_kabupaten']    + $jumlah['asset_bantuan_kabupaten']    + $jumlah['kontruksi_bantuan_kabupaten'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_sumbangan']           + $jumlah['peralatan_sumbangan']            + $jumlah['gedung_sumbangan']           + $jumlah['jalan_sumbangan']            + $jumlah['asset_sumbangan']            + $jumlah['kontruksi_sumbangan'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_hak_adat']            + $jumlah['peralatan_hak_adat']             + $jumlah['gedung_hak_adat']            + $jumlah['jalan_hak_adat']             + $jumlah['asset_hak_adat']             + $jumlah['kontruksi_hak_adat'] }}</th>
                        <th class="text-center">{{ $jumlah['tanah_hibah']               + $jumlah['peralatan_hibah']                + $jumlah['gedung_hibah']               + $jumlah['jalan_hibah']                + $jumlah['asset_hibah']                + $jumlah['kontruksi_hibah'] }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="print" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Print</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <form action="{{ route("laporan.print") }}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="tahun">Tahun</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select class="form-control @error('tahun') is-invalid @enderror" name="tahun" id="tahun">
                            <option selected value="">Semua Tahun</option>
                            @for ($i=date("Y"); $i>=1900; $i--)
                                <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected="true"' : ''  }}>{{ $i }}</option>
                            @endfor
                        </select>
                        @error('tahun')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="ditandatangani">Ditandatangani</label> <img style="display: none" id="loading" height="20px" src="{{ asset('storage/loading.gif') }}" alt="Loading">
                        <select required class="form-control @error('ditandatangani') is-invalid @enderror" name="ditandatangani" id="ditandatangani">
                            <option selected value="">Pilih Aparat Pemerintahan Desa</option>
                            @foreach ($pemerintahan_desa as $item)
                                <option value="{{ $item->id }}" {{ old('ditandatangani') == $item->id ? 'selected="true"' : ''  }}>{{ $item->nama }} ({{ $item->jabatan }})</option>
                            @endforeach
                        </select>
                        @error('ditandatangani')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Print</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("#btn-print").click(function (e){
            e.preventDefault();
            $("#print").modal('show');
        });
    });
</script>
@endpush
