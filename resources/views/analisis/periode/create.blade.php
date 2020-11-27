@extends('layouts.app')

@section('title', 'Tambah Periode')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah Periode</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("periode.index", $analisis) }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('periode.store', $analisis) }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="nama">Nama Periode</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Periode ..." value="{{ old('nama') }}">
                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tahap_pendataan">Tahap Pendataan</label>
                <div class="col-md-9">
                    <select class="form-control @error('tahap_pendataan') is-invalid @enderror" name="tahap_pendataan">
                        <option value="">Pilih Tahap Pendataan</option>
                        <option value="1" {{ old('tahap_pendataan') == 1 ? 'selected' : '' }}>Belum Pendataan</option>
                        <option value="2" {{ old('tahap_pendataan') == 2 ? 'selected' : '' }}>Sedang Pendataan</option>
                        <option value="3" {{ old('tahap_pendataan') == 3 ? 'selected' : '' }}>Selesai Pelaksanaan</option>
                    </select>
                    @error('tahap_pendataan')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-3" for="tahun">Tahun</label>
                <div class="col-md-9">
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" placeholder="Masukkan Tahun ..." value="{{ old('tahun', date('Y')) }}">
                    @error('tahun')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
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
                <label class="form-control-label col-form-label col-md-3" for="status">Status</label>
                <div class="col-md-9">
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="">Pilih Status</option>
                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktif</option>
                    </select>
                    @error('status')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
