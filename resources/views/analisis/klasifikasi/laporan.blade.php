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
                        <th class="text-center">Nomor KK</th>
                        <th class="text-center">NIK</th>
                        @if ($analisis->subjek == 1)
                            <th class="text-center">Nama</th>
                        @else
                            <th class="text-center">Kepala Keluarga</th>
                        @endif
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Klasifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hasil_klasifikasi as $item)
                        <tr>
                            <td class="text-center">{{ ($hasil_klasifikasi->currentpage()-1) * $hasil_klasifikasi->perpage() + $loop->index + 1 }}</td>
                            <td>
                                <a href="{{ route('klasifikasi.detail-laporan', [$analisis, 'penduduk' => $item->penduduk_id, 'periode' => request()->segment(4)]) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                            <td><a href="{{ route('penduduk.keluarga.show', $item->penduduk->kk) }}">{{ $item->penduduk->kk }}</a></td>
                            <td><a href="{{ route('penduduk.show', $item->penduduk->nik) }}">{{ $item->penduduk->nik }}</a></td>
                            <td>{{ $item->penduduk->nama }}</td>
                            <td class="text-center">{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                            <td>RT/RW {{ $item->detailDusun->rt ?? '-'}}/{{ $item->detailDusun->rw ?? '-'}} {{ $item->alamat_sekarang }} {{ $item->detailDusun->dusun->nama ?? '-'}}</td>
                            <td class="text-center">{{ $item->akumulasi }}</td>
                            <td class="text-center">{{ App\Klasifikasi::where('minimal','<=',$item->akumulasi)->where('maximal','>=',$item->akumulasi)->first()->nama ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="15" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $hasil_klasifikasi->links('layouts.components.pagination') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("#periode").change(function () {
            location.replace(baseURL + '/analisis/' + '{{ $analisis->id }}' + '/laporan-hasil-klasifikasi/' + $(this).val());
        });
    });
</script>
@endpush
