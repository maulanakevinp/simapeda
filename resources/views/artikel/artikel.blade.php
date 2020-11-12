@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - '. $artikel[0]->menu)

@section('styles')
<meta name="description" content="{{ $artikel[0]->menu }}, {{ $artikel[0]->submenu }} {{ $artikel[0]->sub_submenu ? ', '. $artikel[0]->sub_submenu : '' }}">
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
                <h2 class="text-uppercase">{{ $artikel[0]->menu }}</h2>
                <p>
                    @if (Request::segment(2) == Str::slug($artikel[0]->submenu))
                        {{ $artikel[0]->submenu }}
                        @if (Request::segment(3) == Str::slug($artikel[0]->sub_submenu))
                            {{ $artikel[0]->sub_submenu }}
                        @endif
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @forelse ($artikel as $item)
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
        @empty
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Data belum tersedia</h3>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="col-12">
            {{ $artikel->links() }}
        </div>
    </div>
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
