@extends('layouts.app')

@section('title', 'Tambah User')

@section('styles')
<style>
    .upload-image:hover{
        cursor: pointer;
        opacity: 0.7;
    }
</style>
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
                                <h2 class="mb-0">Tambah User</h2>
                                <p class="mb-0 text-sm">Kelola User</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("user.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
        <form autocomplete="off" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2">Foto Profil</label>
                <div class="col-md-2">
                    <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="{{ asset('storage/upload.jpg') }}" alt="" title="klik untuk mengganti foto profil">
                    <input accept="image/*" onchange="uploadImage(this)" type="file" name="foto_profil" class="images" style="display: none">
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="peran_id">Peran</label>
                <div class="col-md-10">
                    <select class="form-control @error('peran_id') is-invalid @enderror" name="peran_id" id="peran_id">
                        <option value="">Pilih Peran</option>
                        @foreach (App\Peran::all() as $item)
                            <option value="{{ $item->id }}" {{ old('peran_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('peran_id')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="nama">Nama</label>
                <div class="col-md-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama ..." value="{{ old('nama') }}">
                    @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="form-control-label col-form-label col-md-2" for="email">Email</label>
                <div class="col-md-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email ..." value="{{ old('email') }}">
                    @error('email')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
        </form>
    </div>
</div>
@endsection
