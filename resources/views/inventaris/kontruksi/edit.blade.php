@extends('layouts.app')

@section('title', 'Edit Kontruksi Dalam Pengerjaan')

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
                                <h2 class="mb-0">Edit Kontruksi Dalam Pengerjaan</h2>
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
        <form autocomplete="off" action="{{ route('kontruksi.update', $kontruksi) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-md-3" for="nama_barang">Nama Barang</label>
                <div class="col-md-9">
                    <select class="form-control" name="nama_barang" id="nama_barang">
                        <option value="{{ $kontruksi->nama_barang }}">{{ $kontruksi->nama_barang }}</option>
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
                        <option value="Darurat" {{ $kontruksi->fisik_bangunan == "Darurat" ? "selected" : '' }}>Darurat</option>
                        <option value="Permanen" {{ $kontruksi->fisik_bangunan == "Permanen" ? "selected" : '' }}>Permanen</option>
                        <option value="Semi Permanen" {{ $kontruksi->fisik_bangunan == "Semi Permanen" ? "selected" : '' }}>Semi Permanen</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="bangunan_bertingkat">Bangunan Bertingkat</label>
                <div class="col-sm-9">
                    <input class="form-control" id="bangunan_bertingkat" name="bangunan_bertingkat" type="number" placeholder="Masukkan Bangunan Bertingkat ..." value="{{ $kontruksi->bangunan_bertingkat }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="kontruksi_beton">Kontruksi Beton</label>
                <div class="col-sm-9">
                    <select name="kontruksi_beton" id="kontruksi_beton" class="form-control">
                        <option value="0" {{ $kontruksi->konstruksi_beton == '0' ? 'selected' : '' }}>Tidak</option>
                        <option value="1" {{ $kontruksi->konstruksi_beton == '1' ? 'selected' : '' }}>Ya</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="luas">Luas (M<sup>2</sup>)</label>
                <div class="col-sm-9">
                    <input class="form-control" name="luas" id="luas" type="number" placeholder="Masukkan Luas ..." value="{{ $kontruksi->luas }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="letak_atau_lokasi">Letak / Lokasi</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="letak_atau_lokasi" id="letak_atau_lokasi" placeholder="Masukkan Letak / Lokasi ...">{{ $kontruksi->letak_atau_lokasi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_bangunan">Nomor Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_bangunan" id="nomor_bangunan" type="text" placeholder="Masukkan Nomor Bangunan ..." value="{{ $kontruksi->nomor_bangunan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_dokumen_bangunan">Tanggal Dokumen Bangunan</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_dokumen_bangunan" id="tanggal_dokumen_bangunan" type="date" placeholder="Masukkan Tanggal Dokumen Bangunan ..." value="{{ $kontruksi->tanggal_dokumen_bangunan }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="tanggal_mulai">Tanggal Mulai</label>
                <div class="col-sm-9">
                    <input class="form-control" name="tanggal_mulai" id="tanggal_mulai" type="date" placeholder="Masukkan Tanggal Mulai ..." value="{{ $kontruksi->tanggal_mulai }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="status_tanah">Status Tanah</label>
                <div class="col-sm-9">
                    <select name="status_tanah" id="status_tanah" class="form-control">
                        <option value="">Pilih Status Tanah</option>
                        <option value="Tanah milik Pemda" {{ $kontruksi->status_tanah == 'Tanah milik Pemda' ? 'selected' : '' }}>Tanah milik Pemda</option>
                        <option value="Tanah Negara" {{ $kontruksi->status_tanah == 'Tanah Negara' ? 'selected' : '' }}>Tanah Negara (Tanah yang dikuasai langsung oleh Negara)</option>
                        <option value="Tanah Hak Ulayat" {{ $kontruksi->status_tanah == 'Tanah Hak Ulayat' ? 'selected' : '' }}>Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)</option>
                        <option value="Tanah Hak" {{ $kontruksi->status_tanah == 'Tanah Hak' ? 'selected' : '' }}>Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="nomor_kode_tanah">Nomor Kode Tanah</label>
                <div class="col-sm-9">
                    <input class="form-control" name="nomor_kode_tanah" id="nomor_kode_tanah" type="text" placeholder="Masukkan Nomor Kode Tanah ..." value="{{ $kontruksi->nomor_kode_tanah }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="asal_usul">Asal Usul </label>
                <div class="col-sm-9">
                    <select name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul">
                        <option value="">Pilih Asal Usul Lahan</option>
                        <option value="Bantuan Kabupaten" {{ $kontruksi->asal_usul == 'Bantuan Kabupaten' ? 'selected' : '' }}>Bantuan Kabupaten</option>
                        <option value="Bantuan Pemerintah" {{ $kontruksi->asal_usul == 'Bantuan Pemerintah' ? 'selected' : '' }}>Bantuan Pemerintah</option>
                        <option value="Bantuan Provinsi" {{ $kontruksi->asal_usul == 'Bantuan Provinsi' ? 'selected' : '' }}>Bantuan Provinsi</option>
                        <option value="Pembelian Sendiri" {{ $kontruksi->asal_usul == 'Pembelian Sendiri' ? 'selected' : '' }}>Pembelian Sendiri</option>
                        <option value="Sumbangan" {{ $kontruksi->asal_usul == 'Sumbangan' ? 'selected' : '' }}>Sumbangan</option>
                        <option value="Hak Adat" {{ $kontruksi->asal_usul == 'Hak Adat' ? 'selected' : '' }}>Hak Adat</option>
                        <option value="Hibah" {{ $kontruksi->asal_usul == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="harga">Harga (Rp)</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control input-sm number col-form-label" id="harga" name="harga" placeholder="Harga" value="{{ $kontruksi->harga }}"/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 form-control-label col-form-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">{{ $kontruksi->keterangan }}</textarea>
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
