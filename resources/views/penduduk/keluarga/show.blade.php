@extends('layouts.app')

@section('title', 'Detail Keluarga')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Detail Keluarga</h2>
                                <p class="mb-0 text-sm">Kelola Penduduk</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("penduduk.keluarga.print", $penduduk[0]->kk) }}" data-toggle="tooltip" class="btn btn-primary" title="Cetak"><i class="fas fa-print"></i></a>
                                <a href="{{ route("penduduk.keluarga") }}" class="btn btn-success" data-toogle="tooltip" title="Kembali"><i class="fas fa-arrow-left"></i></a>
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
<div class="row">
    <div class="col">
        <div class="card shadow h-100">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Tempat Lahir</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th class="text-center">Agama</th>
                                <th class="text-center">Pendidikan</th>
                                <th class="text-center">Pekerjaan</th>
                                <th class="text-center">Status Perkawinan</th>
                                <th class="text-center">Status Hubungan dalam Keluarga</th>
                                <th class="text-center">Kewarganegaraan</th>
                                <th class="text-center">No. Paspor</th>
                                <th class="text-center">No. KITAS/KITAP</th>
                                <th class="text-center">Nama Ayah</th>
                                <th class="text-center">Nama Ibu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penduduk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ date('d/m/Y',strtotime($item->tanggal_lahir)) }}</td>
                                    <td>{{ $item->agama->nama ?? '-' }}</td>
                                    <td>{{ $item->pendidikan->nama ?? '-' }}</td>
                                    <td>{{ $item->pekerjaan->nama ?? '-' }}</td>
                                    <td>{{ $item->statusPerkawinan->nama ?? '-' }}</td>
                                    <td>{{ $item->statusHubunganDalamKeluarga->nama ?? '-' }}</td>
                                    <td>
                                        @php
                                            switch ($item->kewarganegaraan) {
                                                case 1:
                                                    echo "WNI";
                                                    break;
                                                case 2:
                                                    echo "WNA";
                                                    break;
                                                case 3:
                                                    echo "Dua Kewarganegaraan";
                                                    break;
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ $item->nomor_paspor }}</td>
                                    <td>{{ $item->nomor_kitas_atau_kitap }}</td>
                                    <td>{{ $item->nama_ayah }}</td>
                                    <td>{{ $item->nama_ibu }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" align="center">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
