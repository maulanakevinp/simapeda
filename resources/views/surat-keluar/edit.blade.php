@extends('layouts.app')

@section('title', 'Edit Surat Keluar')

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
                                <h2 class="mb-0">Edit Surat Keluar</h2>
                                <p class="mb-0 text-sm">Kelola Surat Keluar</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("surat-keluar.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('surat-keluar.update', $surat_keluar) }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_urut">Nomor Urut</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_urut') is-invalid @enderror" name="nomor_urut" placeholder="Masukkan Nomor Urut ..." value="{{ old('nomor_urut', $surat_keluar->nomor_urut) }}">
                    @error('nomor_urut')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="berkas">Berkas Scan Surat Keluar <a target="_blank" href="{{ url(Storage::url($surat_keluar->berkas)) }}" title="Download"><i class="fas fa-download"></i></a></label>
                <div class="col-md-9">
                    <input type="file" accept=".pdf" class="form-control @error('berkas') is-invalid @enderror" name="berkas" placeholder="Masukkan Berkas Scan Surat Keluar ...">
                    @error('berkas')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="kode_surat_id">Kode Surat</label>
                <div class="col-md-9">
                    <select class="form-control @error('kode_surat_id') is-invalid @enderror" name="kode_surat_id" id="kode_surat_id">
                        <option value="">Pilih Kode Surat</option>
                        @foreach ($kode_surat as $item)
                            <option value="{{ $item->id }}" {{ old('kode_surat_id', $surat_keluar->kode_surat_id) == $item->id ? 'selected' : '' }}>{{ $item->kode }} - {{ $item->nama }} {{ $item->uraian != '-' ? '- '. $item->uraian : ''}}</option>
                        @endforeach
                    </select>
                    @error('kode_surat_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_surat">Nomor Surat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" placeholder="Masukkan Nomor Surat ..." value="{{ old('nomor_surat', $surat_keluar->nomor_surat) }}">
                    @error('nomor_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_surat">Tanggal Surat</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" name="tanggal_surat" placeholder="Masukkan Tanggal Surat ..." value="{{ old('tanggal_surat', $surat_keluar->tanggal_surat) }}">
                    @error('tanggal_surat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tujuan">Tujuan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" placeholder="Masukkan Tujuan ..." value="{{ old('tujuan', $surat_keluar->tujuan) }}">
                    @error('tujuan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="isi_singkat_atau_perihal">Isi Singkat/Perihal</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('isi_singkat_atau_perihal') is-invalid @enderror" name="isi_singkat_atau_perihal" placeholder="Masukkan Isi Singkat/Perihal ..." value="{{ old('isi_singkat_atau_perihal', $surat_keluar->isi_singkat_atau_perihal) }}">
                    @error('isi_singkat_atau_perihal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
    });
</script>
@endpush
