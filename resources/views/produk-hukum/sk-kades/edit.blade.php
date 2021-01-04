@extends('layouts.app')

@section('title', 'Edit SK Kades')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit SK Kades</h2>
                                <p class="mb-0 text-sm">Kelola SK Kades</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("sk-kades.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('sk-kades.update', $sk_kades) }}" method="post" enctype="multipart/form-data">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="judul_dokumen">Judul Dokumen</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('judul_dokumen') is-invalid @enderror" name="judul_dokumen" placeholder="Masukkan Judul Dokumen ..." value="{{ old('judul_dokumen', $sk_kades->judul_dokumen) }}">
                    @error('judul_dokumen')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="dokumen">Dokumen <a target="_blank" href="{{ route('sk-kades.download', $sk_kades) }}"><i class="fas fa-download"></i></a></label>
                <div class="col-md-9">
                    <input type="file" accept=".pdf,.png,.jpg,.jpeg,.doc,.docx,.xls,.xlsx" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" placeholder="Masukkan Dokumen ..." value="{{ old('dokumen', $sk_kades->dokumen) }}">
                    @error('dokumen')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="uraian_singkat">Uraian Singkat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('uraian_singkat') is-invalid @enderror" name="uraian_singkat" placeholder="Masukkan Uraian Singkat ..." value="{{ old('uraian_singkat', $sk_kades->uraian_singkat) }}">
                    @error('uraian_singkat')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_keputusan_kades">Nomor Keputusan Kades</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_keputusan_kades') is-invalid @enderror" name="nomor_keputusan_kades" placeholder="Masukkan Nomor Keputusan Kades ..." value="{{ old('nomor_keputusan_kades', $sk_kades->nomor_keputusan_kades) }}">
                    @error('nomor_keputusan_kades')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_keputusan_kades">Tanggal Keputusan Kades</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_keputusan_kades') is-invalid @enderror" name="tanggal_keputusan_kades" placeholder="Masukkan Tanggal Keputusan Kades ..." value="{{ old('tanggal_keputusan_kades', $sk_kades->tanggal_keputusan_kades) }}">
                    @error('tanggal_keputusan_kades')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nomor_dilaporkan">Nomor Dilaporkan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nomor_dilaporkan') is-invalid @enderror" name="nomor_dilaporkan" placeholder="Masukkan Nomor Dilaporkan ..." value="{{ old('nomor_dilaporkan', $sk_kades->nomor_dilaporkan) }}">
                    @error('nomor_dilaporkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tanggal_dilaporkan">Tanggal Dilaporkan</label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('tanggal_dilaporkan') is-invalid @enderror" name="tanggal_dilaporkan" placeholder="Masukkan Tanggal Dilaporkan ..." value="{{ old('tanggal_dilaporkan', $sk_kades->tanggal_dilaporkan) }}">
                    @error('tanggal_dilaporkan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="keterangan">Keterangan</label>
                <div class="col-md-9">
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Masukkan Keterangan ...">{{ old('keterangan', $sk_kades->keterangan) }}</textarea>
                    @error('keterangan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
