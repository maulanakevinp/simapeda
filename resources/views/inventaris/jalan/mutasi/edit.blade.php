@extends('layouts.app')

@section('title', 'Edit Jalan, Irigasi, dan Jaringan')

@section('styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Jalan, Irigasi, dan Jaringan</h2>
                                <p class="mb-0 text-sm">Kelola Inventaris</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("jalan.mutasi") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <form autocomplete="off" action="{{ route('jalan.mutasi.update', $jalan) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="nama_barang">Nama Barang</label>
                <div class="col-md-9">
                    <input disabled type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{ $jalan->nama_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_barang">Kode Barang</label>
                <div class="col-md-9">
                    <input disabled type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang ..." value="{{ $jalan->kode_barang }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_register">Nomor Register</label>
                <div class="col-md-9">
                    <input disabled type="text" class="form-control" name="nomor_register" id="nomor_register" placeholder="Masukkan Nomor Register ..." value="{{ $jalan->nomor_register }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="jenis_mutasi">Jenis Mutasi</label>
                <div class="col-md-9">
                    <select class="form-control" name="jenis_mutasi" id="jenis_mutasi">
                        <option value="">Pilih Jenis Mutasi</option>
                        <option value="Status Rusak" {{ $jalan->jenis_mutasi == 'Status Rusak' ? 'selected' : '' }}>Status Rusak</option>
                        <option value="Status Diperbaiki" {{ $jalan->jenis_mutasi == 'Status Diperbaiki' ? 'selected' : '' }}>Status Diperbaiki</option>
                        <optgroup label="Barang Masih Baik">
                            <option value="Masih Baik Disumbangkan" {{ $jalan->jenis_mutasi == 'Masih Baik Disumbangkan' ? 'selected' : '' }}>Sumbangkan</option>
                            <option value="Masih Baik Dijual" {{ $jalan->jenis_mutasi == 'Masih Baik Dijual' ? 'selected' : '' }}>Jual</option>
                        </optgroup>
                        <optgroup label="Barang Sudah Rusak">
                            <option value="Barang Rusak Disumbangkan" {{ $jalan->jenis_mutasi == 'Barang Rusak Disumbangkan' ? 'selected' : '' }}>Sumbangkan</option>
                            <option value="Barang Rusak Dijual" {{ $jalan->jenis_mutasi == 'Barang Rusak Dijual' ? 'selected' : '' }}>Jual</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div id="harga-jual" class="form-group row" style="display: none;">
                <label class="col-sm-3 form-control-label col-form-label" for="harga_jual">Harga Jual</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga_jual" name="harga_jual" placeholder="Harga Jual" value="{{ $jalan->harga_jual }}"/>
                </div>
            </div>
            <div id="disumbangkan-ke" class="form-group row" style="display: none;">
                <label class="col-sm-3 form-control-label col-form-label" for="disumbangkan">Disumbangkan ke</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-sm number col-form-label" id="disumbangkan" name="disumbangkan" placeholder="Disumbangkan ke" value="{{ $jalan->disumbangkan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tahun_pengadaan">Tahun Pengadaan</label>
                <div class="col-sm-9">
                    <input disabled class="form-control" name="tahun_pengadaan" id="tahun_pengadaan" type="number" placeholder="Tahun Pengadaan" value="{{ $jalan->tahun_pengadaan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tahun_mutasi">Tahun Mutasi</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tahun_mutasi" id="tahun_mutasi" type="date" placeholder="Tahun Mutasi" value="{{ $jalan->tahun_mutasi }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan_mutasi">Keterangan Mutasi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan_mutasi" id="keterangan_mutasi" placeholder="Keterangan">{{ $jalan->keterangan_mutasi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label" for="mutasi">Status Mutasi</label>
                <div class="col-sm-9">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="mutasi1" name="mutasi" class="custom-control-input" value="1" {{ $jalan->mutasi == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="mutasi1">Ya</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="mutasi2" name="mutasi" class="custom-control-input" value="0" {{ $jalan->mutasi == 0 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="mutasi2">Tidak</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/form.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#jenis_mutasi').change(function () {
            if ($(this).val() == 'Masih Baik Disumbangkan' || $(this).val() == 'Barang Rusak Disumbangkan') {
                $("#disumbangkan-ke").show();
                $("#harga-jual").hide();
            } else if ($(this).val() == 'Masih Baik Dijual' || $(this).val() == 'Barang Rusak Dijual') {
                $("#disumbangkan-ke").hide();
                $("#harga-jual").show();
            } else {
                $("#disumbangkan-ke").hide();
                $("#harga-jual").hide();
            }
        });
    });
</script>
@endpush
