@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - '. $artikel[0]->menu)

@section('styles')
<meta name="description" content="{{ $artikel[0]->menu }}, {{ $artikel[0]->submenu }}{{ $artikel[0]->sub_submenu ? ', '. $artikel[0]->sub_submenu : '' }}">
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
                @php
                    $url = url('') . "/";
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
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-2">
                                <a href="{{ $url }}">
                                    <img style="max-height: 200px" class="mw-100" src="{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}" alt="Gambar {{ $item->judul }}">
                                </a>
                            </div>
                            <div class="col-md-8 mb-2">
                                <a href="{{ $url }}">
                                    <h5 class="title-article block-with-text">{{ $item->judul }}</h5>
                                </a>
                                <div class="konten description-article block-with-text text-dark">{!! $item->konten !!}</div>
                                <a href="{{ $url }}" style="font-size: 0.8rem">Baca Selengkapnya ...</a>
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
