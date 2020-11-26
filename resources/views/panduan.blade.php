@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. $desa->nama_desa .' - Panduan')

@section('styles')
<meta name="description" content="Website Resmi Pemerintah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Panduan pembuatan surat keterangan secara online">
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">PANDUAN LAYANAN SURAT</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="embed-responsive embed-responsive-16by9 rounded">
                <iframe class="embed-responsive-item" src="{{ url('storage/Panduan Simapeda.mp4') }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
