@extends('layouts.app')

@section('title', 'Anggaran Pendapatan Belanja Desa')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Anggaran Pendapatan Belanja Desa</h2>
                                <p class="mb-0 text-sm">Kelola Anggaran Pendapatan Belanja Desa</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('anggaran-realisasi.create') }}?jenis={{ request('jenis') }}&tahun={{ request('tahun') }}&page={{ request('page') }}" class="btn btn-success" title="Tambah"><i class="fas fa-plus"></i> Tambah APBDes</a>
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
<div class="card shadow">
    <div class="card-body">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left mb-3">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item m-1">
                        <a class="nav-link tab {{ request('jenis') == 'pendapatan' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=pendapatan&tahun={{ request('tahun') }}"><i class="fas fa-hand-holding-usd mr-2"></i>PENDAPATAN</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link tab {{ request('jenis') == 'belanja' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=belanja&tahun={{ request('tahun') }}"><i class="fas fa-shopping-cart mr-2"></i>BELANJA</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link tab {{ request('jenis') == 'pembiayaan' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=pembiayaan&tahun={{ request('tahun') }}"><i class="fas fa-money-check-alt mr-2"></i>PEMBIAYAAN</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link tab {{ request('jenis') == 'laporan' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=laporan&tahun={{ request('tahun') }}"><i class="fas fa-money-check-alt mr-2"></i>Laporan</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="nav-link tab {{ request('jenis') == 'grafik' ? 'active' : '' }}" href="{{ URL::current() }}?jenis=grafik&tahun={{ request('tahun') }}"><i class="fas fa-chart-bar mr-2"></i>Grafik</a>
                    </li>
                </ul>
            </div>
            <form id="form-tahun" action="{{ URL::current()}}" method="GET">
                <input type="hidden" name="jenis" value="{{ request('jenis') ? request('jenis') : "pendapatan"}}">
                Tahun: <input type="number" name="tahun" id="tahun" class="form-control-sm" value="{{ request('tahun') ? request('tahun') : date('Y') }}" style="width: 80px">
                <img id="loading-tahun" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <th width="100px">#</th>
                    <th>Rincian</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Ditambahkan pada</th>
                    <th>Diperbarui pada</th>
                </thead>
                <tbody>
                    @forelse ($anggaran_realisasi as $item)
                        <tr>
                            <td>
                                <a href="{{ route('anggaran-realisasi.edit', $item) }}?jenis={{ request('jenis') }}&tahun={{ request('tahun') }}&page={{ request('page') }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger hapus-data" data-nama="{{ $item->detail_jenis_anggaran->nama ? $item->detail_jenis_anggaran->nama : $item->detail_jenis_anggaran->kelompok_jenis_anggaran->nama }}" data-action="{{ route("anggaran-realisasi.destroy", $item) }}" data-toggle="modal" href="#modal-hapus"><i data-toggle="tooltip" title="Hapus" class="fas fa-trash"></i></a>
                            </td>
                            <td style="vertical-align: middle">{{ $item->detail_jenis_anggaran->nama ? $item->detail_jenis_anggaran->nama : $item->detail_jenis_anggaran->kelompok_jenis_anggaran->nama }} {{ $item->keterangan_lainnya ? "(" . $item->keterangan_lainnya . ")" : "" }}</td>
                            <td style="vertical-align: middle">Rp. {{ substr(number_format($item->nilai_anggaran, 2, ',', '.'),0,-3) }}</td>
                            <td style="vertical-align: middle">Rp. {{ substr(number_format($item->nilai_realisasi, 2, ',', '.'),0,-3) }}</td>
                            <td style="vertical-align: middle">{{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}</td>
                            <td style="vertical-align: middle">{{ date('d/m/Y H:i:s', strtotime($item->updated_at)) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" align="center">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $anggaran_realisasi->links('layouts.components.pagination') }}
    </div>
</div>
@include('layouts.components.hapus', ['nama_hapus' => 'anggaran realisasi'])
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
            $("tbody").html(`<tr><td colspan="6" align="center">Loading ...</td></tr>`);
        });
    });
</script>
@endpush
