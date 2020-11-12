@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('styles')
<link href="{{ asset('js/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
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
                                <h2 class="mb-0">Tambah Artikel</h2>
                                <p class="mb-0 text-sm">Kelola Artikel</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("artikel.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="row">
    <div class="col">
        <div class="card bg-secondary shadow h-100">
            <div class="card-header bg-white border-0">
                <h3 class="mb-0">Tambah Artikel</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Gambar</label>
                        <div class="text-center">
                            <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="{{ asset('storage/upload.jpg') }}" alt="">
                            <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar" class="images" style="display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Judul</label> <span class="text-danger font-weight-bold">*</span>
                        <input class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Judul ..." value="{{ old('judul') }}">
                        @error('judul') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Menu</label>
                                <input class="form-control @error('menu') is-invalid @enderror" name="menu" placeholder="Masukkan Menu ..." value="{{ old('menu') }}">
                                @error('menu') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Submenu</label>
                                <input class="form-control @error('submenu') is-invalid @enderror" name="submenu" placeholder="Masukkan Submenu ..." value="{{ old('submenu') }}">
                                @error('submenu') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Sub Submenu</label>
                                <input class="form-control @error('sub_submenu') is-invalid @enderror" name="sub_submenu" placeholder="Masukkan Sub Submenu ..." value="{{ old('sub_submenu') }}">
                                @error('sub_submenu') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Konten</label> <span class="text-danger font-weight-bold">*</span>
                        <textarea class="form-control @error('konten') is-invalid @enderror" name="konten">{{ old('konten') }}</textarea>
                        @error('konten') <span class="invalid-feedback font-weight-bold">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/plugins/summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $("textarea").summernote({
            dialogsInBody: true,
            placeholder: 'Silahkan isi konten',
            tabsize: 2,
        });
    });
</script>
@endpush
