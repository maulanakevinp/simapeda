@extends('layouts.app')

@section('title', 'Tambah Perdes')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Perdes</h2>
                                <p class="mb-0 text-sm">Kelola Perdes</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("perdes.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('perdes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="judul_dokumen">Judul Dokumen</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('judul_dokumen') is-invalid @enderror" name="judul_dokumen" placeholder="Masukkan Judul Dokumen ..." value="{{ old('judul_dokumen') }}">
                    @error('judul_dokumen')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="dokumen">Dokumen</label>
                <div class="col-md-8">
                    <input type="file" accept=".pdf,.png,.jpg,.jpeg,.doc,.docx,.xls,.xlsx" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" placeholder="Masukkan Dokumen ...">
                    @error('dokumen')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="uraian_singkat">Uraian Singkat</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('uraian_singkat') is-invalid @enderror" name="uraian_singkat" placeholder="Masukkan Uraian Singkat ..." value="{{ old('uraian_singkat') }}">
                    @error('uraian_singkat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="jenis_peraturan">Jenis Peraturan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('jenis_peraturan') is-invalid @enderror" name="jenis_peraturan" placeholder="Masukkan Jenis Peraturan ..." value="{{ old('jenis_peraturan') }}">
                    @error('jenis_peraturan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="nomor_ditetapkan">Nomor Ditetapkan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('nomor_ditetapkan') is-invalid @enderror" name="nomor_ditetapkan" placeholder="Masukkan Nomor Ditetapkan ..." value="{{ old('nomor_ditetapkan') }}">
                    @error('nomor_ditetapkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="tanggal_ditetapkan">Tanggal Ditetapkan</label>
                <div class="col-md-8">
                    <input type="date" class="form-control @error('tanggal_ditetapkan') is-invalid @enderror" name="tanggal_ditetapkan" placeholder="Masukkan Tanggal Ditetapkan ..." value="{{ old('tanggal_ditetapkan') }}">
                    @error('tanggal_ditetapkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="tanggal_kesepakatan">Tanggal Kesepakatan</label>
                <div class="col-md-8">
                    <input type="date" class="form-control @error('tanggal_kesepakatan') is-invalid @enderror" name="tanggal_kesepakatan" placeholder="Masukkan Tanggal Kesepakatan ..." value="{{ old('tanggal_kesepakatan') }}">
                    @error('tanggal_kesepakatan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="nomor_dilaporkan">Nomor Dilaporkan</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('nomor_dilaporkan') is-invalid @enderror" name="nomor_dilaporkan" placeholder="Masukkan Nomor Dilaporkan ..." value="{{ old('nomor_dilaporkan') }}">
                    @error('nomor_dilaporkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="tanggal_dilaporkan">Tanggal Dilaporkan</label>
                <div class="col-md-8">
                    <input type="date" class="form-control @error('tanggal_dilaporkan') is-invalid @enderror" name="tanggal_dilaporkan" placeholder="Masukkan Tanggal Dilaporkan ..." value="{{ old('tanggal_dilaporkan') }}">
                    @error('tanggal_dilaporkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="nomor_diundangkan_dalam_lembaran_desa">Nomor Diundangkan Dalam Lembaran Desa</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('nomor_diundangkan_dalam_lembaran_desa') is-invalid @enderror" name="nomor_diundangkan_dalam_lembaran_desa" placeholder="Masukkan Nomor Diundangkan Dalam Lembaran Desa ..." value="{{ old('nomor_diundangkan_dalam_lembaran_desa') }}">
                    @error('nomor_diundangkan_dalam_lembaran_desa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="tanggal_diundangkan_dalam_lembaran_desa">Tanggal Diundangkan Dalam Lembaran Desa</label>
                <div class="col-md-8">
                    <input type="date" class="form-control @error('tanggal_diundangkan_dalam_lembaran_desa') is-invalid @enderror" name="tanggal_diundangkan_dalam_lembaran_desa" placeholder="Masukkan Tanggal Diundangkan Dalam Lembaran Desa ..." value="{{ old('tanggal_diundangkan_dalam_lembaran_desa') }}">
                    @error('tanggal_diundangkan_dalam_lembaran_desa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="nomor_diundangkan_dalam_berita_desa">Nomor Diundangkan Dalam Berita Desa</label>
                <div class="col-md-8">
                    <input type="text" class="form-control @error('nomor_diundangkan_dalam_berita_desa') is-invalid @enderror" name="nomor_diundangkan_dalam_berita_desa" placeholder="Masukkan Nomor Diundangkan Dalam Berita Desa ..." value="{{ old('nomor_diundangkan_dalam_berita_desa') }}">
                    @error('nomor_diundangkan_dalam_berita_desa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="tanggal_diundangkan_dalam_berita_desa">Tanggal Diundangkan Dalam Berita Desa</label>
                <div class="col-md-8">
                    <input type="date" class="form-control @error('tanggal_diundangkan_dalam_berita_desa') is-invalid @enderror" name="tanggal_diundangkan_dalam_berita_desa" placeholder="Masukkan Tanggal Diundangkan Dalam Berita Desa ..." value="{{ old('tanggal_diundangkan_dalam_berita_desa') }}">
                    @error('tanggal_diundangkan_dalam_berita_desa')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-4" for="keterangan">Keterangan</label>
                <div class="col-md-8">
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Keterangan ...">{{ old('keterangan') }}</textarea>
                    @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
