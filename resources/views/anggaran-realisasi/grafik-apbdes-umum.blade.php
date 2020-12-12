@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. App\Desa::find(1)->nama_desa . ' - Statistik Penduduk')

@section('styles')
<meta name="description" content="Statistik Penduduk Desa {{ App\Desa::find(1)->nama_desa }}, Kecamatan {{ App\Desa::find(1)->nama_kecamatan }}, Kabupaten {{ App\Desa::find(1)->nama_kabupaten }}.">
@endsection

@section('header')
<h1 class="text-white text-muted">GRAFIK APBDES</h1>
<p class="text-white">Grafik Anggaran Pendapatan Belanja Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi mengenai Grafik Anggaran Pendapatan Belanja Desa {{ $desa->nama_desa }}.</p>
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">GRAFIK APBDES</h2>
                <p class="">GRAFIK Anggaran Pendapatan Belanja Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi mengenai Laporan Anggaran Pendapatan Belanja Desa {{ $desa->nama_desa }}.</p>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                <div class="mb-1">
                    <a class="btn btn-outline-light {{ request('jenis') == 'laporan' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=laporan&tahun={{ request('tahun') }}"><i class="fas fa-hand-holding-usd mr-2"></i>Laporan</a>
                    <a class="btn btn-outline-light {{ request('jenis') == 'grafik' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=grafik&tahun={{ request('tahun') }}"><i class="fas fa-chart-bar mr-2"></i>Grafik</a>
                </div>
                <form id="form-tahun" action="{{ URL::current() }}" method="GET">
                    <input type="hidden" name="jenis" value="{{ request('jenis') ? request('jenis') : "laporan"}}">
                    Tahun: <input type="number" name="tahun" id="tahun" class="form-control-sm" value="{{ request('tahun') ? request('tahun') : date('Y') }}" style="width: 80px">
                    <img id="loading-tahun" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                </form>
            </div>
        </div>
        <div class="card-body">
            @include('anggaran-realisasi.grafik-apbdes')
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/apbdes.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#tahun").change(function () {
            $("#tahun").css('display','none');
            $("#loading-tahun").css('display','');
            $(this).parent().submit();
        });
        $(".tab").click(function () {
            $("tbody").html(`<tr><td colspan="7" align="center">Loading ...</td></tr>`);
        });
    });
</script>
@endpush
