@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa . ' - Berita')

@section('styles')
<meta name="description" content="Macam-macam berita Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}.">
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
                <h2 class="">BERITA</h2>
                <p class="">Berita Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi seputar berita desa {{ $desa->nama_desa }}.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @forelse ($berita as $item)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card animate-up shadow">
                    <a href="{{ route('berita.show', ['berita' => $item, 'slug' => Str::slug($item->judul)]) }}">
                        <div class="card-img" style="background-image: url('{{ $item->gambar ? url(Storage::url($item->gambar)) : url(Storage::url('noimage.jpg')) }}'); background-size: cover; height: 200px;"></div>
                    </a>
                    <div class="card-body">
                        <a href="{{ route('berita.show', ['berita' => $item, 'slug' => Str::slug($item->judul)]) }}">
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
            {{ $berita->links() }}
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
