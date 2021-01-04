@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Kategori</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $kategori->analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('kategori.index', $kategori->analisis_id) }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('kategori.update', [$analisis,$kategori]) }}" method="post">
            @csrf @method('patch')
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nama">Nama Kategori</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Kategori ..." value="{{ old('nama', $kategori->nama) }}">
                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
