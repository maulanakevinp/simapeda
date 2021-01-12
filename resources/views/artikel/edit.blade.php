@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Edit Artikel</h2>
                                <p class="mb-0 text-sm">Kelola Artikel</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('artikel.index') }}?page={{ request('page') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                <h3 class="mb-0">Edit Artikel</h3>
            </div>
            <div class="card-body">
                <form autocomplete="off" action="{{ route('artikel.update', ["artikel" => $artikel]) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label">Gambar</label>
                        <div class="text-center">
                            <img title="Klik untuk ganti gambar" onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="{{ $artikel->gambar ? asset(Storage::url($artikel->gambar)) : asset('storage/upload.jpg') }}" alt="Gambar berita {{ $artikel->judul }}">
                            <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar" class="images" style="display: none">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Caption</label>
                        <input class="form-control" name="caption" placeholder="Masukkan Caption ..." value="{{ $artikel->caption }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Judul</label>
                        <input class="form-control" name="judul" placeholder="Masukkan Judul ..." value="{{ $artikel->judul }}">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Menu</label>
                                <input class="form-control" name="menu" placeholder="Masukkan Menu ..." value="{{ $artikel->menu }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Submenu</label>
                                <input class="form-control" name="submenu" placeholder="Masukkan Submenu ..." value="{{ $artikel->submenu }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="form-group">
                                <label class="form-control-label">Sub Submenu</label>
                                <input class="form-control" name="sub_submenu" placeholder="Masukkan Sub Submenu ..." value="{{ $artikel->sub_submenu }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Konten</label> <span class="text-danger font-weight-bold">*</span>
                        <div class="card">
                            <div class="card-body p-0">
                                <textarea class="form-control" name="konten">{{ $artikel->konten }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="simpan">SIMPAN</button>
                </form>
                <button type="button" class="btn btn-success tambah-gambar my-3">Tambah Gambar <i class="fas fa-camera"></i></button>
                <div id="gallery" class="row">
                    @foreach ($artikel->galleries as $item)
                        <div class="col-lg-4 col-md-6 mb-3">
                            <form action="{{ route('artikel-gallery.update', $item) }}" method="post" enctype="multipart/form-data">
                                <div class="card shadow h-100">
                                    @csrf @method('patch')
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="card-body pb-0">
                                        <div class="form-group">
                                            <label class="form-control-label">Gambar</label>
                                            <div class="text-center">
                                                <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="{{ asset(Storage::url($item->gambar)) }}" alt="{{ $item->caption }}">
                                                <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar" class="images" style="display: none">
                                                <span class="invalid-feedback font-weight-bold"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Caption</label>
                                            <textarea class="form-control" name="caption">{{ $item->caption }}</textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 d-flex justify-content-between">
                                        <button type="button" class="btn btn-danger hapus-data" data-action="{{ route('artikel-gallery.destroy', $item) }}" data-nama="gambar" title="Hapus Gambar"><i class="fas fa-trash"></i></button>
                                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.components.hapus', ['nama_hapus' => 'gambar'])
@endsection

@include('artikel.summernote')

@push('scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script>
    $(document).on('click','.tambah-gambar', function () {
        $("#gallery").append(`
            <div class="col-lg-4 col-md-6 mb-3">
                <form class="store" action="{{ route('artikel-gallery.store') }}" method="post" enctype="multipart/form-data">
                    <div class="card shadow h-100">
                        {{ csrf_field() }}
                        <input type="hidden" name="artikel_id" value="{{ $artikel->id }}">
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <label class="form-control-label">Gambar</label>
                                <div class="text-center">
                                    <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="${baseURL}/storage/upload.jpg" alt="">
                                    <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar" class="images" style="display: none">
                                    <span class="invalid-feedback font-weight-bold"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Caption</label>
                                <textarea class="form-control" name="caption"></textarea>
                            </div>
                        </div>
                        <div class="card-footer border-0 d-flex justify-content-between">
                            <button type="button" class="btn btn-danger hapus" title="Hapus Gambar"><i class="fas fa-trash"></i></button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        `);
    });

    (function($) {
        if (!$.curCSS) {
            $.curCSS = $.css;
        }
    })(jQuery);

    $(document).on("click", ".hapus", function (event){
        let card = $(this).parent().parent().parent();
        card[0].remove();
    });
</script>
@endpush
