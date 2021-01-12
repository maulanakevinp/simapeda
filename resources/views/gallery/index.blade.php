@extends('layouts.app')

@section('title', 'Gallery')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
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
                                <h2 class="mb-0">Gallery</h2>
                                <p class="mb-0 text-sm">Kelola Gallery</p>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="check-all" title="centang semua" class="mb-1" data-toggle="tooltip" style="transform: scale(1.5)">
                                <button type="button" id="delete-check" class="btn btn-danger mb-1"><i class="fas fa-trash"></i> Hapus Terpilih</button>
                                <a href="#video-modal" data-toggle="modal" class="btn btn-success mb-1"><i class="fas fa-video mr-2"></i> Pengaturan Video</a>
                                <a href="#tambah-gambar" data-toggle="modal" class="btn btn-primary mb-1"><i class="fas fa-image mr-2"></i> Tambah Gambar</a>
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
<div id="gallery" class="row mt-4 justify-content-center"></div>
<div id="loading" class="row">
    @for ($i = 0; $i < 3; $i++)
        <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
            <a href="{{ url("img/img-lazy-loading.gif") }}" data-fancybox><img src="{{ url("img/img-lazy-loading.gif") }}" class="img-fluid"  alt="Loading"></a>
        </div>
    @endfor
</div>

<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="video-modal" aria-hidden="true">
    <div class="row fixed-top m-3">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <div class="notifikasi"></div>
        </div>
    </div>
    <div class="modal-dialog modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Pengaturan Video</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <form class="d-inline" action="{{ route("gallery.update") }}" method="POST" >
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label">Channel ID Youtube</label>
                        <input type="text" name="channel_id" id="channel_id" class="form-control" value="{{ $desa->channel_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="tambah-gambar" tabindex="-1" role="dialog" aria-labelledby="tambah-gambar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Tambah gambar</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route("gallery.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="slider" value="">
                    <div class="form-group">
                        <label class="form-control-label">Gambar</label>
                        <div class="text-center">
                            <img onclick="$(this).siblings('.images').click()" class="mw-100 upload-image" style="max-height: 300px" src="{{ asset('storage/upload.jpg') }}" alt="">
                            <input accept="image/*" onchange="uploadImage(this)" type="file" name="gambar" class="images" style="display: none">
                            <span class="invalid-feedback font-weight-bold"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Caption</label>
                        <textarea class="form-control" name="caption"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.components.hapus', ['nama_hapus' => 'gallery'])
@endsection
@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script>
    let page = 1;
    let dataExists = true;
    load_more(page);

    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height() - 70) { //if user scrolled from top to bottom of the page
            if (dataExists) {
                page++; //page number increment
                load_more(page); //load content
            }
        }
    });

    $(document).on("click", "#delete-check", function (){
        let id = [];
        let btn = this;

        $(".gambar-check").each(function () {
            if (this.checked) {
                id.push(this.value);
            }
        });

        if (id.length > 0) {
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url     : baseURL + "/kelola-gallery/destroys",
                    method  : "delete",
                    data : {
                        _token  : "{{ csrf_token() }}",
                        id      : id
                    },
                    beforeSend : function () {
                        $(btn).html("Loading ...");
                        $(btn).attr("disabled", "disabled");
                    },
                    success : function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    }
                })
            }
        }
    });

    $(document).on("click", "#check-all", function(){
        if (this.checked) {
            $(".gambar-check").prop('checked',true);
        } else {
            $(".gambar-check").prop('checked',false);
        }
    });

    function load_more(page) {
        $.ajax({
            url: baseURL + "/load-gallery?page=" + page,
            method: "GET",
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (response) {
                $("#loading").hide();

                if (response.next_page_url == null) {
                    dataExists = false;
                }

                if (page == 1 && dataExists == false) {
                    showNothing();
                }

                $.each(response.data, function(index,result){
                    showGallery(result);
                });
            }
        });
    }

    function showGallery(result){
        let html = `<div class="col-lg-4 col-md-6 mb-3 img-scale-up">`;

        if (result.video_id) {
            html +=     `<a href="https://www.youtube.com/watch?v=${result.video_id}" data-fancybox="images" data-caption="${result.caption}">
                            <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
                            <img src="${result.gallery}" class="img-fluid" alt="${result.caption}">`;
        } else {
            let gallery = baseURL + result.gallery.replace('public','/storage');
            html +=     `<a href="${gallery}" data-fancybox="images" data-caption="${result.caption}">
                            <img src="${gallery}" class="img-fluid" alt="${result.caption}">`;
        }

        html +=         `</a>
                        <input type="checkbox" class="gambar-check" name="delete[]" title="centang untuk menghapus beberapa gambar" value="${result.id}" style="transform:scale(1.5);position: absolute; top: 5px; left: 20px;">
                        <button type="button" data-nama="gallery" data-action="${baseURL}/kelola-gallery/${result.id}" title="Hapus" class="btn btn-sm btn-danger hapus-data" style="position: absolute; top: 0; right: 15px;"><i class="fas fa-trash"></i></button>
                    </div>`;
        $("#gallery").append(html);
    }

    function showNothing(){
        $("#gallery").append(`
            <div class="col">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h4>Data belum tersedia</h4>
                    </div>
                </div>
            </div>
        `);
    }

    function uploadImage (inputFile) {
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(inputFile).siblings('img').attr("src", e.target.result);
            }
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
</script>
@endpush
