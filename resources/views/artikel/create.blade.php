@extends('layouts.app')

@section('title', 'Tambah Artikel')

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
                                <a href="{{ route("artikel.index") }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <input class="form-control" name="judul" placeholder="Masukkan Judul ...">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Menu</label>
                                <input class="form-control" name="menu" placeholder="Masukkan Menu ...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Submenu</label>
                                <input class="form-control" name="submenu" placeholder="Masukkan Submenu ...">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Sub Submenu</label>
                                <input class="form-control" name="sub_submenu" placeholder="Masukkan Sub Submenu ...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Konten</label> <span class="text-danger font-weight-bold">*</span>
                        <div class="card">
                            <div class="card-body p-0">
                                <textarea class="form-control" name="konten"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success gambar mb-3 tambah-gambar">Tambah Lebih Banyak Gambar <i class="fas fa-camera"></i></button>
                    <div id="gallery" class="row"></div>
                    <button type="submit" class="btn btn-primary btn-block mt-3" id="simpan">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@include('artikel.summernote')

@push('scripts')
<script>
    $(document).on('click','.tambah-gambar', function () {
        $("#gallery").html(`
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card shadow h-100">
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label class="form-control-label">Gambar</label>
                            <div class="text-center">
                                <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="${baseURL}/storage/upload.jpg" alt="">
                                <input accept="image/*" onchange="uploadImage(this)" type="file" name="gallery[]" class="images" style="display: none">
                                <input type="hidden" name="galleries[]">
                                <span class="invalid-feedback font-weight-bold"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Caption</label>
                            <textarea class="form-control" name="caption[]"></textarea>
                        </div>
                    </div>
                    <div class="card-footer border-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-danger hapus" title="Hapus Gambar"><i class="fas fa-trash"></i></button>
                        <button type="button" class="btn btn-primary tambah" title="Tambah Gambar"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        `);
        $(this).removeClass('tambah-gambar');
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).addClass('hapus-semua-gambar');
        $(this).html(`Hapus Semua Gambar <i class="fas fa-trash"></i>`);
    })

    $(document).on('click','.hapus-semua-gambar', function(){
        $("#gallery").html('');
        $(this).removeClass('hapus-semua-gambar');
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).addClass('tambah-gambar');
        $(this).html(`Tambah Lebih Banyak Gambar <i class="fas fa-camera"></i>`);
    });;

    $(document).on("click", ".tambah", function (event){
        let card = $(this).parent().parent().parent();
        $("#gallery").append(card[0].outerHTML);
        let nextCard = card[0].nextElementSibling;
        $(nextCard).find('input').val('');
        $(nextCard).find('textarea').val('');
        $(nextCard).find('img').attr('src', baseURL + '/storage/upload.jpg');
    });

    $(document).on("click", ".hapus", function (event){
        let card = $(this).parent().parent().parent();
        card[0].remove();
    });
</script>
@endpush
