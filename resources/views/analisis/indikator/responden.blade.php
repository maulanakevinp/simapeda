@extends('layouts.app')

@section('title', 'Daftar Responden')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Daftar Responden</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('indikator.laporan', $analisis) }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i> Kembali</a>
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
@include('analisis.detail')
<div class="card shadow">
    <div class="card-header font-weight-bold">Daftar Responden</div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table table-sm table-striped table-hover">
                <tr>
                    <td width="10px">Pertanyaan</td>
                    <td width="10px">:</td>
                    <td>{{ $indikator->pertanyaan }}</td>
                </tr>
                <tr>
                    <td width="10px">Jawaban</td>
                    <td width="10px">:</td>
                    <td>
                        @if ($indikator->tipe == 1)
                            {{ App\Parameter::where('id', request()->segment(6))->first()->jawaban }}
                        @else
                            {{ request()->segment(6) }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Dusun</th>
                        <th class="text-center">RW</th>
                        <th class="text-center">RT</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($input as $item)
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                            <td style="vertical-align: middle"><a href="{{ route('penduduk.show', $item->penduduk->nik) }}">{{ $item->penduduk->nik }}</a></td>
                            <td style="vertical-align: middle">{{ $item->penduduk->nama }}</td>
                            <td style="vertical-align: middle; text-align: center;">{{ $item->penduduk->detailDusun->dusun->nama ?? '-'}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{ $item->penduduk->detailDusun->rw ?? '-'}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{ $item->penduduk->detailDusun->rt ?? '-'}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{ date('Y') - date('Y',strtotime($item->penduduk->tanggal_lahir)) }}</td>
                            <td style="vertical-align: middle; text-align: center;">{{ $item->penduduk->jenis_kelamin == 1 ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="15">Data belum tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
