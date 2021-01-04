@extends('layouts.app')

@section('title', 'Tambah Kontruksi Dalam Pengerjaan')

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
                                <h2 class="mb-0">Tambah Kontruksi Dalam Pengerjaan</h2>
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
@include('layouts.components.alert')
<div class="card bg-secondary shadow h-100">
    <div class="card-body">
        <form autocomplete="off" action="{{ route('kontruksi.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="nama_barang">Nama Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="nama_barang" id="nama_barang">
                        @foreach ($barang as $item)
                            <option value="{{ $item->nama }}">Kode: {{ $item->golongan }}.{{ $item->bidang }}.{{ $item->kelompok }}.{{ $item->sub_kelompok }}.{{ $item->sub_sub_kelompok }} - {{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="fisik_bangunan">Fisik Bangunan</label>
                <div class="col-sm-9">
                    <select name="fisik_bangunan" id="fisik_bangunan" class="form-control">
                        <option value="">Pilih Fisik Bangunan</option>
                        <option value="Darurat">Darurat</option>
                        <option value="Permanen">Permanen</option>
                        <option value="Semi Permanen">Semi Permanen</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="bangunan_bertingkat">Bangunan Bertingkat</label>
                <div class="col-sm-9">
                    <input class="form-control" id="bangunan_bertingkat" name="bangunan_bertingkat" type="number" placeholder="Masukkan Bangunan Bertingkat ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kontruksi_beton">Kontruksi Beton</label>
                <div class="col-sm-9">
                    <select name="kontruksi_beton" id="kontruksi_beton" class="form-control">
                        <option value="0">Tidak</option>
                        <option value="1">Ya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="luas">Luas (M<sup>2</sup>)</label>
                <div class="col-sm-9">
                    <input class="form-control" id="luas" name="luas" type="number" placeholder="Masukkan Luas ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="letak_atau_lokasi">Letak / Lokasi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="letak_atau_lokasi" name="letak_atau_lokasi" placeholder="Masukkan Letak / Lokasi ..."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_bangunan">Nomor Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_bangunan" id="nomor_bangunan" type="text" placeholder="Masukkan Nomor Bangunan ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_dokumen_bangunan">Tanggal Dokumen Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_dokumen_bangunan" id="tanggal_dokumen_bangunan" type="date" placeholder="Masukkan Tanggal Dokumen Bangunan ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_mulai">Tanggal Mulai</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_mulai" id="tanggal_mulai" type="date" placeholder="Masukkan Tanggal Mulai ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="status_tanah">Status Tanah</label>
                <div class="col-sm-9">
                    <select name="status_tanah" id="status_tanah" class="form-control">
                        <option value="">Pilih Status Tanah</option>
                        <option value="Tanah milik Pemda">Tanah milik Pemda</option>
                        <option value="Tanah Negara">Tanah Negara (Tanah yang dikuasai langsung oleh Negara)</option>
                        <option value="Tanah Hak Ulayat">Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)</option>
                        <option value="Tanah Hak">Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_kode_tanah">Nomor Kode Tanah</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah" type="text" placeholder="Masukkan Nomor Kode Tanah ..."/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul</label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten">Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah">Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi">Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri">Pembelian Sendiri</option>
                        <option value="Sumbangan">Sumbangan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga</label>
                <div class="col-sm-9">
                        <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#nama_barang').select2({
            placeholder: "Pilih Barang",
            allowClear: true
        });
    });
</script>
@endpush
