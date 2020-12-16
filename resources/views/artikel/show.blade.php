@extends('layouts.layout')
@section('title', 'Desa ' . $desa->nama_desa . ' - ' . $artikel->judul)

@section('styles')
<meta name="description" content="{{ $artikel->judul }}.">
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
                    <h1 class="h4 mb-0 font-weight-bolder text-white">{{ $artikel->judul }}</h1>
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
                        <div class="row mb-5">
                            <div class="col-md text-center">
                                <img class="mw-100" src="{{ url(Storage::url($artikel->gambar)) }}" alt="Gambar Berita {{ $artikel->judul }}">
                            </div>
                        </div>
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
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 border border-left-0 text-center">
                        <span style="font-size: 0.7rem"><i class="fas fa-arrow-left"></i> Postingan Sebelumnya</span><br>
                        @php
                            $before = App\Artikel::find($artikel->id - 1);
                            if ($before) {
                                $url = url(''). '/';
                                if ($before->menu) {
                                    $url .= Str::slug($before->menu) .'/';
                                }

                                if ($before->submenu) {
                                    $url .= Str::slug($before->submenu) .'/';
                                }

                                if ($before->sub_submenu) {
                                    $url .= Str::slug($before->sub_submenu) .'/';
                                }

                                $url .= $before->id .'/'. Str::slug($before->judul);
                            } else {
                                $url = '';
                            }
                        @endphp
                        @if ($before)
                            <a href="{{ $url }}" class="h5 font-weight-bolder">{{ $before->judul }}</a>
                        @endif
                    </div>
                    <div class="col-md-6 border border-right-0 text-center">
                        <span style="font-size: 0.7rem">Postingan Berikutnya <i class="fas fa-arrow-right"></i></span><br>
                        @php
                            $next = App\Artikel::find($artikel->id + 1);
                            if ($next) {
                                $url = url(''). '/';
                                if ($next->menu) {
                                    $url .= Str::slug($next->menu) .'/';
                                }

                                if ($next->submenu) {
                                    $url .= Str::slug($next->submenu) .'/';
                                }

                                if ($next->sub_submenu) {
                                    $url .= Str::slug($next->sub_submenu) .'/';
                                }

                                $url .= $next->id .'/'. Str::slug($next->judul);
                            } else {
                                $url = '';
                            }
                        @endphp
                        @if ($next)
                            <a href="{{ $url }}" class="h5 font-weight-bolder">{{ $next->judul }}</a>
                        @endif
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
                            @php
                                $url = url(''). '/';
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
                            <a href="{{ $url }}">
                                <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                            </a>
                            <a href="{{ $url }}">
                                <h5 class="title-article block-with-text mt-2">{{ $item->judul }}</h5>
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
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
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
