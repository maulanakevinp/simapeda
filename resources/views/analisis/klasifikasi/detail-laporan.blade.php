@extends('layouts.app')

@section('title', 'Klasifikasi')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Klasifikasi</h2>
                                <p class="mb-0 text-sm">Kelola Analisis - {{ $analisis->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('klasifikasi.laporan', [$analisis, 'periode' => request()->segment(6) ?? (App\Periode::latest()->first() ?? '0')]) }}?page={{ request('page') }}" class="btn btn-success" title="Kembali" data-toggle="tooltip"><i class="fas fa-arrow-left"></i> Kembali</a>
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
    <div class="card-header">Input Data Sensus/Survei</div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table table-sm table-hover table-striped">
                <tr>
                    <td width="50px">Nomor Identitas</td>
                    <td width="1px">:</td>
                    <td>
                        @if ($analisis->subjek == 1)
                            {{ $penduduk->kk }}
                        @else
                            {{ $penduduk[0]->kk }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td width="50px">Nama Subjek</td>
                    <td width="1px">:</td>
                    <td>
                        @if ($analisis->subjek == 1)
                            {{ $penduduk->nama }}
                        @else
                            {{ $penduduk[0]->nama }}
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        @if ($analisis->subjek == 2)
            <div class="table-responsive mb-3">
                <table class="table table-sm table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduk as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ tgl(date('Y-m-d',strtotime($item->tanggal_lahir))) }}</td>
                                <td class="text-center">{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="table-responsive mb-3">
            <table class="table table-sm table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Pertanyaan/Indikator</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Jawaban</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $akumulasi = 0;
                    @endphp
                    @foreach ($analisis->indikator as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->pertanyaan }}</td>
                            <td class="text-center">{{ $item->bobot }}</td>
                            <td>
                                @if ($item->tipe == 1)
                                    @foreach ($item->parameter as $parameter)
                                        @if (App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->where('parameter_id', $parameter->id)->first())
                                            {{ $parameter->jawaban }}
                                        @endif
                                    @endforeach
                                @else
                                    {{ App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->first()->jawaban ?? '' }}
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    $nilai = 0;
                                    if ($item->tipe == 1) {
                                        foreach ($item->parameter as $parameter) {
                                            if (App\Input::where('penduduk_id', request()->segment(4))->where('indikator_id', $item->id)->where('periode_id', request()->segment(6))->where('parameter_id', $parameter->id)->first()) {
                                                $nilai = $parameter->nilai;
                                                echo $nilai;
                                            }
                                        }
                                    } else {
                                        echo $nilai;
                                    }
                                @endphp
                            </td>
                            <td class="text-center">
                                @php
                                    $akumulasi += $item->bobot * $nilai;
                                    echo $item->bobot * $nilai;
                                @endphp
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <th class="text-center" colspan="5">Total</th>
                        <th class="text-center">{{ $akumulasi }}</th>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="5">Klasifikasi</th>
                        <th class="text-center">{{ App\Klasifikasi::where('minimal','<=',$akumulasi)->where('maximal','>=',$akumulasi)->first()->nama ?? '-' }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
