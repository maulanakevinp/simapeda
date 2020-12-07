@extends('layouts.app')

@section('title', 'Data Sensus/Survei')

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
                                <h2 class="mb-0">Data Sensus/Survei</h2>
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
            <input class="form-control" placeholder="Cari ...." type="search" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('form-search-mobile')
<form class="mt-4 mb-3 d-md-none" action="{{ URL::current() }}" method="GET">
    <div class="input-group input-group-rounded input-group-merge">
        <input type="search" name="cari" class="form-control form-control-rounded form-control-prepended" placeholder="cari" aria-label="Search" value="{{ request('cari') }}">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <span class="fa fa-search"></span>
            </div>
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
@include('analisis.detail')
<div class="card shadow">
    <div class="card-header">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
            <div class="mb-1">
                <h2 class="mb-0">Data Sensus/Survei</h2>
            </div>
            <div class="mb-1">
                <label for="periode">Periode :</label>
                <select name="periode" id="periode" class="form-control-sm">
                    @foreach ($periode as $item)
                        <option value="{{ $item->id }}" {{ request()->segment(4) == $item->id ? 'selected' : ""}}>{{ $item->nama }} - (Tahun {{ $item->tahun }})</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-striped table-bordered">
                <thead>
                    <tr>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penduduk as $item)
                        <tr>
                            <td style="vertical-align: middle" class="text-center">{{ ($penduduk->currentpage()-1) * $penduduk->perpage() + $loop->index + 1 }}</td>
                            <td style="vertical-align: middle">
                                <a href="{{ route('input.edit', ['penduduk' => $item, 'analisis' => $analisis, 'periode' => request()->segment(4)]) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Data"><i class="fas fa-edit"></i></a>
                            </td>
                            @if ($analisis->subjek == 1)
                                <td style="vertical-align: middle">{{ $item->nik }}</td>
                            @else
                                <td style="vertical-align: middle">{{ $item->kk }}</td>
                            @endif
                            <td style="vertical-align: middle">{{ $item->nama }}</td>
                            <td style="vertical-align: middle; text-align: center">{{ $item->jenis_kelamin == 1 ? "L" : "P" }}</td>
                            <td>{{ $item->detailDusun->dusun->nama ?? '-'}}</td>
                            <td>{{ $item->detailDusun->rw ?? '-'}}</td>
                            <td>{{ $item->detailDusun->rt ?? '-'}}</td>
                            <td style="vertical-align: middle; text-align: center">
                                @if (App\Input::where('penduduk_id', $item->id)->where('periode_id', request()->segment(4))->count() == count($analisis->indikator))
                                    <i class="fas fa-check text-success"></i>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $penduduk->links('layouts.components.pagination') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("#periode").change(function () {
            location.replace(baseURL + '/analisis/' + '{{ $analisis->id }}' + '/input/' + $(this).val());
        });
    });
</script>
@endpush
