@extends('layouts.app')

@section('title', 'Input Data Sensus/Survei')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Input Data Sensus/Survei</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('analisis.index') }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
@include('analisis.detail')
<div class="card shadow">
    <div class="card-header font-weight-bold">Input Data Sensus/Survei</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-stripped table-bordered">
                <thead>
                    <th class="text-center" width="10px">No</th>
                    <th class="text-center" width="50px">Opsi</th>
                    @if ($analisis->subjek == 1)
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama</th>
                    @else
                        <th class="text-center">Nomor KK</th>
                        <th class="text-center">Kepala Keluarga</th>
                    @endif
                    <th class="text-center">L/P</th>
                    <th class="text-center">Dusun</th>
                    <th class="text-center">RW</th>
                    <th class="text-center">RT</th>
                    <th class="text-center">Status</th>
                </thead>
                <tbody>
                    @forelse ($penduduk as $item)
                        <tr>
                            <td style="vertical-align: middle" class="text-center">{{ ($penduduk->currentpage()-1) * $penduduk->perpage() + $loop->index + 1 }}</td>
                            <td style="vertical-align: middle">
                                <a href="{{ route('input.edit', ['input' => $item, 'analisis' => $analisis]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Input Data"><i class="fas fa-edit"></i></a>
                            </td>
                            @if ($analisis->subjek == 1)
                                <th style="vertical-align: middle">{{ $item->nik }}</th>
                            @else
                                <th style="vertical-align: middle">{{ $item->kk }}</th>
                            @endif
                            <th style="vertical-align: middle">{{ $item->nama }}</th>
                            <td style="vertical-align: middle; text-align: center">{{ $item->jenis_kelamin == 1 ? "L" : "P" }}</td>
                            <td>{{ $item->detailDusun->dusun->nama ?? '-'}}</td>
                            <td>{{ $item->detailDusun->rw ?? '-'}}</td>
                            <td>{{ $item->detailDusun->rt ?? '-'}}</td>
                            <td style="vertical-align: middle; text-align: center">-</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $penduduk->links() }}
    </div>
</div>
@endsection
