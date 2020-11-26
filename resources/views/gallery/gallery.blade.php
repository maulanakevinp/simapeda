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
    <div class="row justify-content-center">
        @forelse ($galleries as $item)
            @if ($item['jenis'] == 1)
                <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                    <a href="{{ url(Storage::url($item['gambar'])) }}" data-fancybox data-caption="{{ $item['caption'] }}">
                        <img class="mw-100" src="{{ url(Storage::url($item['gambar'])) }}" alt="">
                    </a>
                </div>
            @else
                <div class="col-lg-4 col-md-6 mb-3 img-scale-up">
                    <a href="https://www.youtube.com/watch?v={{ $item['id'] }}" data-fancybox data-caption="{{ $item['caption'] }}">
                        <i class="fas fa-play fa-2x" style="position: absolute; top:43%; left:46%;"></i>
                        <img class="mw-100" src="{{ $item['gambar'] }}" alt="">
                    </a>
                </div>
            @endif
        @empty
            <div class="col">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h4>Data belum tersedia</h4>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
@endpush
