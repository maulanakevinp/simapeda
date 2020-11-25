@extends('layouts.app')

@section('title', $analisi->nama)

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">{{ $analisi->nama }}</h2>
                                <p class="mb-0 text-sm">Kelola Analisis</p>
                            </div>
                            <div class="mb-3">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Menu
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <h6 class="dropdown-header text-dark">Pengaturan Analisis</h6>
                                        <a class="dropdown-item {{ request()->segment(3) == 'kategori' ? 'active' : '' }}" href="{{ route('kategori.index', $analisi->id) }}">Kategori/Variabel</a>
                                        <a class="dropdown-item {{ request()->segment(3) == 'indikator' ? 'active' : '' }}" href="{{ route('indikator.index', $analisi->id) }}">Indikator & Pertanyaan</a>
                                        <a class="dropdown-item {{ request()->segment(3) == 'klasifikasi' ? 'active' : '' }}" href="{{ route('klasifikasi.index', $analisi->id) }}">Klasifikasi Analisis</a>
                                        <a class="dropdown-item {{ request()->segment(3) == 'periode' ? 'active' : '' }}" href="{{ route('periode.index', $analisi->id) }}">Periode Sensus/Survei</a>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header text-dark">Input</h6>
                                        <a class="dropdown-item {{ request()->segment(3) == 'input' ? 'active' : '' }}" href="{{ route('input.index', $analisi->id) }}">Input Data Sensus/Survei</a>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header text-dark">Laporan Analisis</h6>
                                        <a class="dropdown-item {{ request()->segment(3) == 'laporan-hasil-klasifikasi' ? 'active' : '' }}" href="{{ route('klasifikasi.laporan', $analisi->id) }}">Laporan Hasil Klasifikasi</a>
                                        <a class="dropdown-item {{ request()->segment(3) == 'laporan-per-indikator' ? 'active' : '' }}" href="{{ route('indikator.laporan', $analisi->id) }}">Laporan Per Indikator</a>
                                    </div>
                                </div>
                                <a href="{{ route("analisis.edit", $analisi) }}" class="btn btn-primary" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                                <a href="{{ route("analisis.index") }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow h-100">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm">
                <tr>
                    <td width="100px">Nama Analisis</td>
                    <td width="5px">:</td>
                    <td>{{ $analisi->nama }}</td>
                </tr>
                <tr>
                    <td width="100px">Subjek Analisis</td>
                    <td width="5px">:</td>
                    <td>{{ $analisi->subjek == 1 ? 'Penduduk' : ($analisi->subjek == 2 ? 'Keluarga / KK' : '-') }}</td>
                </tr>
                <tr>
                    <td width="100px">Status Analisis</td>
                    <td width="5px">:</td>
                    <td>{!! $analisi->status_analisis == 1 ? '<i class="fas fa-unlock"></i>' : ($analisi->status_analisis == 2 ? '<i class="fas fa-lock"></i>' : '-') !!}</td>
                </tr>
                <tr>
                    <td width="100px">Bilangan Pembagi</td>
                    <td width="5px">:</td>
                    <td>{{ $analisi->bilangan_pembagi ?? '-' }}</td>
                </tr>
                <tr>
                    <td width="100px">Deskripsi</td>
                    <td width="5px">:</td>
                    <td>{!! nl2br($analisi->deskripsi) ?? '-' !!}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
