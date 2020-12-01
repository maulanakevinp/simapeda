@extends('layouts.app')

@section('title', 'Laporan Statistik Jawaban')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Laporan Statistik Jawaban</h2>
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

@section('content')
@include('layouts.components.alert')
@include('analisis.detail')
<div class="card shadow">
    <div class="card-header font-weight-bold">Laporan Statistik Jawaban</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Pertayaan/Indikator</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Nomor</th>
                        <th class="text-center">Jawaban</th>
                        <th class="text-center">Responden</th>
                        <th class="text-center">Tipe Pertanyaan</th>
                        <th class="text-center">Kategori/Variabel</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($analisis->indikator as $item)
                        <tr>
                            <td style="vertical-align: middle; text-align:center">{{ $loop->iteration }}</td>
                            <td style="vertical-align: middle">{{ $item->pertanyaan }}</td>
                            <td style="vertical-align: middle; text-align:center">
                                <a href="{{ route('indikator.statistik', [$analisis, 'indikator' => $item]) }}">{{ count($item->input) }}</a>
                            </td>
                            <td style="vertical-align: middle; text-align:center">{{ $item->nomor }}</td>
                            <td style="vertical-align: middle">
                                @if ($item->tipe == 1)
                                    @foreach ($item->parameter as $parameter)
                                        {{ $parameter->jawaban }}<br>
                                    @endforeach
                                @else
                                    @foreach ($item->input->groupBy('jawaban') as $input)
                                        {{ $input[0]->jawaban }}<br>
                                    @endforeach
                                @endif
                            </td>
                            <td style="vertical-align: middle; text-align:center">
                                @if ($item->tipe == 1)
                                    @foreach ($item->parameter as $parameter)
                                        <a href="{{ route('indikator.responden', [$analisis, 'indikator' => $item, 'parameter' => $parameter->id]) }}">{{ count($parameter->input) }}</a><br>
                                    @endforeach
                                @else
                                    @foreach ($item->input->groupBy('jawaban') as $key => $input)
                                        <a href="{{ route('indikator.responden', [$analisis, 'indikator' => $item, 'parameter' => $input[0]->jawaban]) }}">{{ count($input) }}</a><br>
                                    @endforeach
                                @endif
                            </td>
                            <td style="vertical-align: middle">{{ $item->tipe == 1 ? 'Pilihan' : ($item->tipe == 2 ? 'Isian' : ($item->tipe == 3 ? 'Angka' : '-')) }}</td>
                            <td style="vertical-align: middle">{{ $item->kategori->nama }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="15" class="text-center">Data belum tersedia</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
