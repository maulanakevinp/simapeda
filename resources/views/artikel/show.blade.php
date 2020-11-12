@extends('layouts.layout')
@section('title', 'Desa ' . $desa->nama_desa . ' - ' . $artikel->judul)

@section('styles')
<meta name="description" content="{{ $artikel->judul }}.">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" >

<style>
    .animate-up:hover {
        top: -5px;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="text-uppercase">{{ $artikel->judul }}</h2>
            </div>
        </div>
    </div>
    @if ($artikel->gambar)
        <div class="row mb-5">
            <div class="col-md text-center">
                <img class="mw-100" src="{{ url(Storage::url($artikel->gambar)) }}" alt="Gambar Berita {{ $artikel->judul }}">
            </div>
        </div>
    @endif
    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3 d-flex justify-content-between text-muted" style="font-size: 0.8rem">
                <span>
                    <i class="fas fa-clock"></i> Diposting {{ $artikel->created_at->diffForHumans() }}
                </span>
                <span>
                    <i class="fas fa-eye"></i>  {{ $artikel->dilihat }} Kali Dibaca
                </span>
            </div>
            {!! $artikel->konten !!}
        </div>
    </div>

    @if ($artikels->count() > 0)
        <div class="header-body text-center mt-5 mb-3">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 border-bottom">
                    <h2 class="text-center">Lainnya</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            @foreach ($artikels as $item)
                @php
                    $url = '/';
                    if ($item->menu) {
                        $url .= Str::slug($item->menu) .'/';
                    }

                    if ($item->submenu) {
                        $url .= Str::slug($item->submenu) .'/';
                    }

                    if ($item->sub_submenu) {
                        $url .= Str::slug($item->sub_submenu) .'/';
                    }

                    $url .= $item->id .'/'. Str::slug($item->judul);
                @endphp
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card animate-up shadow">
                        <a href="{{ $url }}">
                            <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                        </a>
                        <div class="card-body">
                            <a href="{{ $url }}">
                                <h5 class="title-article block-with-text">{{ $item->judul }}</h5>
                            </a>
                            <div class="konten description-article block-with-text text-dark">{!! $item->konten !!}</div>
                            <div class="mt-3 d-flex justify-content-between text-muted" style="font-size: 0.8rem">
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
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $.each($(".konten"), function (index,konten){
            $.each(konten.children, function (i,e) {
                if (e.children.length > 0) {
                    $(e).html('');
                } else {
                    $(e).css('font-size','0.8rem');
                }
            });
        });
    });
</script>
@endpush
