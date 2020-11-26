@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. App\Desa::find(1)->nama_desa . ' - Statistik Penduduk')

@section('styles')
<meta name="description" content="Statistik Penduduk Desa {{ App\Desa::find(1)->nama_desa }}, Kecamatan {{ App\Desa::find(1)->nama_kecamatan }}, Kabupaten {{ App\Desa::find(1)->nama_kabupaten }}.">
<script src="{{ asset('js/plugins/highcarts/highstock.js')}}"></script>
<script src="{{ asset('js/plugins/highcarts/exporting.js')}}"></script>
<script src="{{ asset('js/plugins/highcarts/accessibility.js')}}"></script>
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">STATISTIK PENDUDUK</h2>
                <p class="">Statistik Penduduk Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi mengenai statistik penduduk desa {{ $desa->nama_desa }}.</p>
            </div>
        </div>
    </div>
    <div class="row">
        @include('statistik-penduduk.card')
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/statistik-penduduk.js') }}"></script>
@endpush
