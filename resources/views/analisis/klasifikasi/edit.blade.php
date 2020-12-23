@extends('layouts.app')

@section('title', 'Edit Klasifikasi')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Klasifikasi</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $klasifikasi->analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('klasifikasi.index', $klasifikasi->analisis_id) }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('klasifikasi.update', [$analisis,$klasifikasi]) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nama">Nama Klasifikasi</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Klasifikasi ..." value="{{ old('nama', $klasifikasi->nama) }}">
                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="minimal">Minimal</label>
                <div class="col-md-9">
                    <input type="number" class="form-control @error('minimal') is-invalid @enderror" name="minimal" placeholder="Masukkan Minimal ..." value="{{ old('minimal', $klasifikasi->minimal) }}">
                    @error('minimal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="maximal">Maksimal</label>
                <div class="col-md-9">
                    <input type="number" class="form-control @error('maximal') is-invalid @enderror" name="maximal" placeholder="Masukkan Maksimal ..." value="{{ old('maximal', $klasifikasi->maximal) }}">
                    @error('maximal')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
