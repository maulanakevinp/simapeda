@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa '. App\Desa::find(1)->nama_desa . ' - Produk Hukum')

@section('styles')
<meta name="description" content="Produk Hukum Desa {{ App\Desa::find(1)->nama_desa }}, Kecamatan {{ App\Desa::find(1)->nama_kecamatan }}, Kabupaten {{ App\Desa::find(1)->nama_kabupaten }}.">
@endsection

@section('content')
<div class="container my-5">
    <div class="header-body text-center mt-5 mb-3">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 border-bottom">
                <h2 class="">PRODUK HUKUM</h2>
                <p class="">Produk Hukum {{ $desa->nama_desa }}, masyarakat dapat dengan mudah mengetahui informasi mengenai Produk Hukum Desa {{ $desa->nama_desa }}.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card shadow">
                <div class="card-header text-center bg-dark" style="border: none">
                    <a href="{{ URL::current() }}?kategori=sk-kades" class="btn btn-outline-light {{ request('kategori') == 'sk-kades' ? 'active' : '' }}">SK Kades</a>
                    <a href="{{ URL::current() }}?kategori=perdes" class="btn btn-outline-light {{ request('kategori') == 'perdes' ? 'active' : '' }}">Perdes</a>
                    <a href="{{ URL::current() }}?kategori=perkades" class="btn btn-outline-light {{ request('kategori') == 'perkades' ? 'active' : '' }}">Perkades</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px">No.</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Nomor Dan Tanggal</th>
                                    <th class="text-center">Uraian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produk_hukum as $item)
                                    <tr>
                                        <td class="text-center">{{ ($produk_hukum->currentpage()-1) * $produk_hukum->perpage() + $loop->index + 1 }}</td>
                                        <td><a target="_blank" href="{{ route(request('kategori').'.download', $item) }}" data-toggle="tooltip" title="Download">{{ $item->judul_dokumen }}</a></td>
                                        @if (request('kategori') == 'perdes')
                                            <td>{{ $item->nomor_ditetapkan }} / {{ tgl($item->tanggal_ditetapkan) }}</td>
                                        @else
                                            <td>{{ $item->nomor_keputusan_kades }} / {{ tgl($item->tanggal_keputusan_kades) }}</td>
                                        @endif
                                        <td>{{ $item->uraian_singkat }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center">Data Tidak Tersedia</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $produk_hukum->links('layouts.components.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
