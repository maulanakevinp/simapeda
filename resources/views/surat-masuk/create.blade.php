@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

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
                                <h2 class="mb-0">Tambah Surat Masuk</h2>
                                <p class="mb-0 text-sm">Kelola Surat Masuk</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("surat-masuk.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('surat-masuk.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_urut">Nomor Urut</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_urut') is-invalid @enderror" name="nomor_urut" placeholder="Masukkan Nomor Urut ..." value="{{ old('nomor_urut', App\SuratMasuk::latest()->first() ? App\SuratMasuk::latest()->first()->nomor_urut + 1 : '1') }}">
                    @error('nomor_urut')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_penerimaan">Tanggal Penerimaan</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_penerimaan') is-invalid @enderror" name="tanggal_penerimaan" placeholder="Masukkan Tanggal Penerimaan ..." value="{{ old('tanggal_penerimaan') }}">
                    @error('tanggal_penerimaan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="berkas">Berkas Scan Surat Masuk</label>
                <div class="col-md-9">
                    <input type="file" accept=".pdf" class="form-control @error('berkas') is-invalid @enderror" name="berkas" placeholder="Masukkan Berkas Scan Surat Masuk ..." value="{{ old('berkas') }}">
                    @error('berkas')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_surat_id">Kode Surat</label>
                <div class="col-md-9">
                    <select class="form-control @error('kode_surat_id') is-invalid @enderror" name="kode_surat_id" id="kode_surat_id">
                        <option value="">Pilih Kode Surat</option>
                        @foreach ($kode_surat as $item)
                            <option value="{{ $item->id }}" {{ old('kode_surat_id') == $item->id ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }} {{ $item->uraian != '-' ? '- '. $item->uraian : ''}}</option>
                        @endforeach
                    </select>
                    @error('kode_surat_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_surat">Nomor Surat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" placeholder="Masukkan Nomor Surat ..." value="{{ old('nomor_surat') }}">
                    @error('nomor_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_surat">Tanggal Surat</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" name="tanggal_surat" placeholder="Masukkan Tanggal Surat ..." value="{{ old('tanggal_surat') }}">
                    @error('tanggal_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="pengirim">Pengirim</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('pengirim') is-invalid @enderror" name="pengirim" placeholder="Masukkan Pengirim ..." value="{{ old('pengirim') }}">
                    @error('pengirim')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="isi_singkat_atau_perihal">Isi Singkat/Perihal</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('isi_singkat_atau_perihal') is-invalid @enderror" name="isi_singkat_atau_perihal" placeholder="Masukkan Isi Singkat/Perihal ..." value="{{ old('isi_singkat_atau_perihal') }}">
                    @error('isi_singkat_atau_perihal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="pemerintahan_desa_id">Disposisi Kepada</label>
                <div class="col-md-9">
                    <select multiple class="form-control @error('pemerintahan_desa_id') is-invalid @enderror" name="pemerintahan_desa_id[]" id="pemerintahan_desa_id">
                        @foreach ($pemerintahan_desa as $item)
                            <option value="{{ $item->id }}" {{ old('pemerintahan_desa_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }} ({{ $item->jabatan }})</option>
                        @endforeach
                    </select>
                    @error('pemerintahan_desa_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="isi_disposisi">Isi Disposisi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('isi_disposisi') is-invalid @enderror" name="isi_disposisi" placeholder="Masukkan Isi Disposisi ..." value="{{ old('isi_disposisi') }}">
                    @error('isi_disposisi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#kode_surat_id').select2({
            placeholder: "Pilih Kode Surat",
            allowClear: true
        });

        $('#pemerintahan_desa_id').select2({
            placeholder: "Pilih Perangkat Desa",
            allowClear: true
        });
    });
</script>
@endpush
