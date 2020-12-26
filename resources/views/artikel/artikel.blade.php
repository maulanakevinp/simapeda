@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - '. $artikel[0]->menu)

@section('styles')
<meta name="description" content="{{ $artikel[0]->menu }}, {{ $artikel[0]->submenu }}{{ $artikel[0]->sub_submenu ? ', '. $artikel[0]->sub_submenu : '' }}">
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
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="text-uppercase">{{ $artikel[0]->menu }}</h2>
                <p>
                    @if (Request::segment(2) == Str::slug($artikel[0]->submenu))
                        {{ $artikel[0]->submenu }}
                        @if (Request::segment(3) == Str::slug($artikel[0]->sub_submenu))
                            {{ $artikel[0]->sub_submenu ? ' - ' . $artikel[0]->sub_submenu : '' }}
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </div>
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
