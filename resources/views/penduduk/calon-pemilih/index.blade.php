@extends('layouts.app')

@section('title', 'Calon Pemilih')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

<style>
    .table th, .table td {
        padding: 5px;
    }
    .card .table td, .card .table th {
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Calon Pemilih</h2>
                                <p class="mb-0 text-sm">Kelola Penduduk</p>
                            </div>
                            <div class="mb-3">
                                <a target="_blank" href="{{ route('penduduk.print_calon_pemilih') }}?tanggal={{ request('tanggal') }}" data-toggle="tooltip" class="btn btn-primary" title="Cetak"><i class="fas fa-print"></i></a>
                            </div>
                        </div>
                        <form class="navbar-search mt-3 cari-none" action="{{ URL::current() }}" method="GET">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Calon Pemilih</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\Penduduk::latest()->where('tanggal_lahir','<', (date('Y', strtotime(request('tanggal'))) - 17) . '-' . date('m-d', strtotime(request('tanggal'))))->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Laki-laki</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\Penduduk::latest()->where('tanggal_lahir','<', (date('Y', strtotime(request('tanggal'))) - 17) . '-' . date('m-d', strtotime(request('tanggal'))))->where('jenis_kelamin',1)->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Perempuan</h5>
                                <span class="h2 font-weight-bold mb-0">{{ App\Penduduk::latest()->where('tanggal_lahir','<', (date('Y', strtotime(request('tanggal'))) - 17) . '-' . date('m-d', strtotime(request('tanggal'))))->where('jenis_kelamin',2)->count() }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
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
<div class="card shadow">
    <div class="card-body">
        <div class="text-center mb-3">
            <form action="{{ URL::current() }}" method="GET">
                Tanggal : <input class="form-control-sm" type="date" name="tanggal" value="{{ date('Y-m-d',strtotime(request('tanggal'))) }}">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">KK</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Dusun</th>
                    <th class="text-center">RW</th>
                    <th class="text-center">RT</th>
                    <th class="text-center">Pendidikan</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Pekerjaan</th>
                    <th class="text-center">Jenis Kelamin</th>
                </thead>
                <tbody>
                    @forelse ($penduduk as $item)
                        <tr>
                            <td class="text-center">{{ ($penduduk->currentpage()-1) * $penduduk->perpage() + $loop->index + 1 }}</td>
                            <td><a href="{{ route('penduduk.show', $item->nik) }}">{{ $item->nik }}</a></td>
                            <td>{{ $item->nama }}</td>
                            <td><a href="{{ route('penduduk.keluarga.show', $item->kk) }}">{{ $item->kk }}</a></td>
                            <td>{{ $item->alamat_sekarang }}</td>
                            <td>{{ $item->detailDusun->dusun->nama ?? '-' }}</td>
                            <td>{{ $item->detailDusun->rw ?? '-' }}</td>
                            <td>{{ $item->detailDusun->rt ?? '-' }}</td>
                            <td>{{ $item->pendidikan->nama ?? '-' }}</td>
                            <td>{{ date('Y') - date('Y',strtotime($item->tanggal_lahir)) }}</td>
                            <td>{{ $item->pekerjaan->nama ?? '-' }}</td>
                            <td>{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $penduduk->links('layouts.components.pagination') }}
    </div>
</div>
@endsection
