@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Gallery')

@section('styles')
<meta name="description" content="Gallery Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}">

<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">GALLERY</h2>
                <p class="">Gallery Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui gallery desa {{ $desa->nama_desa }}.</p>
            </div>
        </div>
    </div>
    <div id="gallery" class="row mt-4 justify-content-center"></div>
    <div id="loading" class="row">
        @for ($i = 0; $i < 3; $i++)
            <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                <a href="{{ url("img/img-lazy-loading.gif") }}" data-fancybox><img src="{{ url("img/img-lazy-loading.gif") }}" class="img-fluid"  alt="Loading"></a>
            </div>
        @endfor
    </div>
</div>

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
</script>
@endpush
