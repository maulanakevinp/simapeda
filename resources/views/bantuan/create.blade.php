@extends('layouts.app')

@section('title', 'Tambah Bantuan')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Bantuan</h2>
                                <p class="mb-0 text-sm">Kelola Bantuan</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("bantuan.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('bantuan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="sasaran_program">Sasaran Program</label>
                <div class="col-md-9">
                    <select class="form-control @error('sasaran_program') is-invalid @enderror" name="sasaran_program" id="sasaran_program">
                        <option value="">Pilih Sasaran Program</option>
                        <option value="1" {{ old('sasaran_program') == 1 ? 'selected' : '' }}>Penduduk</option>
                        <option value="2" {{ old('sasaran_program') == 2 ? 'selected' : '' }}>Keluarga</option>
                    </select>
                    @error('sasaran_program')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nama_program">Nama Program</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama_program') is-invalid @enderror" name="nama_program" placeholder="Masukkan Nama Program ..." value="{{ old('nama_program') }}">
                    @error('nama_program')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="keterangan">Keterangan</label>
                <div class="col-md-9">
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Keterangan ...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="asal_dana">Asal Dana</label>
                <div class="col-md-9">
                    <select class="form-control @error('asal_dana') is-invalid @enderror" name="asal_dana" id="asal_dana">
                        <option value="">Pilih Asal Dana</option>
                        <option value="Pusat" {{ old('asal_dana') == 'Pusat' ? 'selected' : '' }}>Pusat</option>
                        <option value="Provinsi" {{ old('asal_dana') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="Kabupaten/Kota" {{ old('asal_dana') == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                        <option value="Dana Desa" {{ old('asal_dana') == 'Dana Desa' ? 'selected' : '' }}>Dana Desa</option>
                        <option value="Lain-lain (Hibah)" {{ old('asal_dana') == 'Lain-lain (Hibah)' ? 'selected' : '' }}>Lain-lain (Hibah)</option>
                    </select>
                    @error('asal_dana')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_mulai">Tanggal Mulai</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" placeholder="Masukkan Tanggal Mulai ..." value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_berakhir">Tanggal Berakhir</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" placeholder="Masukkan Tanggal Berakhir ..." value="{{ old('tanggal_berakhir') }}">
                    @error('tanggal_berakhir')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="status">Status</label>
                <div class="col-md-9">
                    <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
