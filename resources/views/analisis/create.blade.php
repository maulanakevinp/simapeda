@extends('layouts.app')

@section('title', 'Tambah Analisis')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Analisis</h2>
                                <p class="mb-0 text-sm">Kelola Analisis</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("analisis.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('analisis.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nama">Nama Analisis</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Analisis ..." value="{{ old('nama') }}">
                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="subjek">Subjek Analisis</label>
                <div class="col-md-9">
                    <select type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek">
                        <option value="1" {{ old('subjek') == 1 ? 'selected' : '' }}>Penduduk</option>
                        <option value="2" {{ old('subjek') == 2 ? 'selected' : '' }}>Keluarga / KK</option>
                    </select>
                </div>
                @error('subjek')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="status_analisis">Status Analisis</label>
                <div class="col-md-9">
                    <select type="text" class="form-control @error('status_analisis') is-invalid @enderror" name="status_analisis">
                        <option value="1" {{ old('status_analisis') == 1 ? 'selected' : '' }}>Tidak Terkunci</option>
                        <option value="2" {{ old('status_analisis') == 2 ? 'selected' : '' }}>Terkunci</option>
                    </select>
                    @error('status_analisis')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="bilangan_pembagi">Bilangan Pembagi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('bilangan_pembagi') is-invalid @enderror" name="bilangan_pembagi" placeholder="Masukkan Bilangan Pembagi ..." value="{{ old('bilangan_pembagi') }}">
                    @error('bilangan_pembagi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="deskripsi">Deskripsi Analisis</label>
                <div class="col-md-9">
                    <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Masukkan Deskripsi Analisis ...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
