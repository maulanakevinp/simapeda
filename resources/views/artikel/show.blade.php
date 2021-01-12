@extends('layouts.layout')
@section('title', 'Desa ' . $desa->nama_desa . ' - ' . $artikel->judul)

@section('styles')
<meta name="description" content="{{ $artikel->judul }}.">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<style>
    iframe {
        width: 100%;
        height: 300px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="card shadow mb-3">
                <div class="card-header bg-dark">
                    <h1 class="h5 mb-0 font-weight-bolder text-white">{{ $artikel->judul }}</h1>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between text-muted" style="font-size: 0.8rem">
                        <span>
                            <i class="fas fa-clock"></i> Diposting {{ $artikel->created_at->diffForHumans() }}
                        </span>
                        <span>
                            <i class="fas fa-eye"></i>  {{ $artikel->dilihat }} Kali Dibaca
                        </span>
                    </div>

                    @if ($artikel->gambar)
                        <div class="text-center">
                            <img class="mw-100" src="{{ url(Storage::url($artikel->gambar)) }}" alt="Gambar Berita {{ $artikel->judul }}">
                        </div>
                        <p style="font-size: 0.8rem; color: darkgray">{{ $artikel->caption }}</p>
                    @endif

                    {!! $artikel->konten !!}
                    <div class="row my-3">
                        @foreach ($artikel->galleries as $item)
                            <div class="col-md-6 mb-3 img-scale-up">
                                <a href="{{ url(Storage::url($item->gambar)) }}" data-fancybox data-caption="{{ $item->caption }}">
                                    <img class="mw-100" src="{{ url(Storage::url($item->gambar)) }}" alt="">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"class="btn btn-facebook btn-sm">
                            <i class="fab fa-fw fa-facebook"></i><b>BAGIKAN</b>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{$artikel->judul}}&amp;url={{Request::url()}}"class="btn btn-twitter btn-sm">
                            <i class="fab fa-fw fa-twitter"></i><b>BAGIKAN</b>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=&text={{Request::url()}}"class="btn btn-success btn-sm">
                            <i class="fab fa-fw fa-whatsapp"></i><b>BAGIKAN</b>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-6 border border-left-0 text-center">
                            @if ($before)
                                <span style="font-size: 0.7rem"><i class="fas fa-arrow-left"></i> Postingan Sebelumnya</span><br>
                                <a href="{{ url('') }}{{ $before->menu ? '/' . Str::slug($before->menu) : '' }}{{ $before->submenu ? '/' . Str::slug($before->submenu) : '' }}{{ $before->sub_submenu ? '/' . Str::slug($before->sub_submenu) : '' }}{{ '/' . $before->id . '/' . Str::slug($before->judul) }}" class="h5 font-weight-bolder">{{ $before->judul }}</a>
                            @endif
                        </div>
                        <div class="col-6 border border-right-0 text-center">
                            @if ($next)
                                <span style="font-size: 0.7rem">Postingan Berikutnya <i class="fas fa-arrow-right"></i></span><br>
                                <a href="{{ url('') }}{{ $next->menu ? '/' . Str::slug($next->menu) : '' }}{{ $next->submenu ? '/' . Str::slug($next->submenu) : '' }}{{ $next->sub_submenu ? '/' . Str::slug($next->sub_submenu) : '' }}{{ '/' . $next->id . '/' . Str::slug($next->judul) }}" class="h5 font-weight-bolder">{{ $next->judul }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            @if ($artikels->count() > 0)
                <div class="card shadow mb-3">
                    <div class="card-header bg-dark text-white font-weight-bolder">Postingan Lainnya</div>
                    <div class="card-body">
                        @foreach ($artikels as $item)
                            <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                            </a>
                            <a href="{{ url('') }}{{ $item->menu ? '/' . Str::slug($item->menu) : '' }}{{ $item->submenu ? '/' . Str::slug($item->submenu) : '' }}{{ $item->sub_submenu ? '/' . Str::slug($item->sub_submenu) : '' }}{{ '/' . $item->id . '/' . Str::slug($item->judul) }}">
                                <h5 class="title-article block-with-text mt-2">{{ $item->judul }}</h5>
                            </a>
                            <div class="description-article block-with-text text-dark" style="font-size: 0.8rem">{!! $item->konten !!}</div>
                            <div class="mt-3 d-flex justify-content-between text-muted" style="font-size: 0.8rem">
                                <span>
                                    <i class="fas fa-clock"></i> {{ $item->created_at->diffForHumans() }}
                                </span>
                                <span>
                                    <i class="fas fa-eye"></i>  {{ $item->dilihat }} Kali Dibaca
                                </span>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            @endif
            @include('sidebar')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
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
                400: {
                    items: 1
                },
                650: {
                    items: 1
                },
                660: {
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
