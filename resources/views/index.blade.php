@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa  .' - Beranda')

@section('styles')
<meta name="description" content="Website Resmi Pemerintah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">

<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<style>
    .animate-up:hover {
        top: -5px;
    }

    @media(max-width:400px){
        .slider{
            height: 250px;
            object-fit: cover;
        }
    }

    @media(min-width:400px){
        .slider{
            height: 500px;
            object-fit: cover;
        }
    }

    iframe {
        width: 100%;
        height: 300px;
    }
</style>
@endsection

@section('content')
<div id="owl-one" class="owl-carousel owl-theme" style="z-index: 0">
    @foreach($gallery as $key => $item)
        <div class="text-center">
            <a class="text-center" href="{{ asset(Storage::url($item->gallery)) }}" data-caption="{{ $item->caption }}" data-fancybox>
                <img class="slider" src="{{ asset(Storage::url($item->gallery)) }}" alt="Slide Show {{ $key }}">
            </a>
            <p style="position: relative; bottom:80px">{{ $item->caption }}</p>
        </div>
    @endforeach
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 mb-3">
            <form class="shadow" class="mb-3" action="{{ URL::current() }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" name="cari" id="cari" class="form-control" placeholder="cari ..." value="{{ request('cari') }}">
                    <div class="input-group-append">
                        <button title="cari" type="submit" class="input-group-text" id="icon-cari"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            @foreach ($artikel as $item)
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-2">
                                <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                    <img style="max-height: 200px" class="mw-100" src="{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}" alt="Gambar {{ $item->judul }}">
                                </a>
                            </div>
                            <div class="col-md-8 mb-2">
                                <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                    <h5 class="title-article block-with-text">{{ $item->judul }}</h5>
                                </a>
                                <div class="description-article block-with-text text-dark" style="font-size: 0.8rem">{!! $item->konten !!}</div>
                                <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}" style="font-size: 0.8rem">Baca Selengkapnya ...</a>
                                <div class="mt-2 d-flex justify-content-between text-muted" style="font-size: 0.8rem">
                                    <span>
                                        <i class="fas fa-clock"></i> {{ $item->created_at->diffForHumans() }}
                                    </span>
                                    <span>
                                        <i class="fas fa-eye"></i>  {{ $item->dilihat }} Kali Dibaca
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $artikel->links('layouts.components.pagination') }}
        </div>
        <div class="col-md-4 mb-3">
            @include('sidebar')
        </div>
    </div>
    @if (count($galleries) > 0)
        <section class="mb-5">
            <div class="row">
                <div class="col-md">
                    <div class="header-body text-center mt-5 mb-3">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 border-bottom">
                                <h2 class="">GALLERY</h2>
                                <p class="">Gallery Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui gallery desa {{ $desa->nama_desa }}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($galleries as $key => $item)
                    @if ($key < 6)
                        @if ($item->video_id)
                            <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                                <a href="https://www.youtube.com/watch?v={{ $item->video_id }}" data-fancybox data-caption="{{ $item->caption }}">
                                    <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
                                    <img class="mw-100" src="{{ $item->gallery }}" alt="">
                                </a>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                                <a href="{{ url(Storage::url($item->gallery)) }}" data-fancybox data-caption="{{ $item->caption }}">
                                    <img class="mw-100" src="{{ url(Storage::url($item->gallery)) }}" alt="">
                                </a>
                            </div>
                        @endif
                    @endif
                @endforeach
            </div>
            @if (count($galleries) > 6)
                <div class="text-center">
                    <a href="{{ route('gallery') }}" class="btn btn-primary">Lebih Banyak Gallery</a>
                </div>
            @endif
        </section>
    @endif
    <div class="card shadow h-100 mb-5" style="margin-top:100px">
        <div class="card-header bg-dark text-white">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                <div class="mb-1">
                    <b>Grafik Pelaksanaan APBDes</b>
                </div>
                <div class="mb-1">
                    Tahun : <input type="number" name="tahun-apbdes" id="tahun-apbdes" class="form-control-sm" value="{{ date('Y') }}" style="width:80px">
                    <img id="loading-tahun" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('anggaran-realisasi.grafik-apbdes')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/apbdes.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#owl-one').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed:900,
            dots:false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $('#owl-two').owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            smartSpeed:900,
            dots:false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 3
                },
                650: {
                    items: 3
                },
                660: {
                    items: 2
                }
            }
        });
    });
</script>
@endpush
