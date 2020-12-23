@extends('layouts.cetak')
@section('title','Data Penduduk Calon Pemilih')

@section('content')
<div class="text-center mb-3" style="margin-top:20px">
    <h6 class="font-weight-bold">Data Penduduk Calon Pemilih</h6>
    <p>{{ tgl(date('Y-m-d', strtotime(request('tanggal')))) }}</p>
</div>
<table class="table table-bordered">
    <thead>
        <th style="vertical-align: middle" class="text-center">No</th>
        <th style="vertical-align: middle" class="text-center">NIK</th>
        <th style="vertical-align: middle" class="text-center">Nama</th>
        <th style="vertical-align: middle" class="text-center">KK</th>
        <th style="vertical-align: middle" class="text-center">Alamat</th>
        <th style="vertical-align: middle" class="text-center">Dusun</th>
        <th style="vertical-align: middle" class="text-center">RW</th>
        <th style="vertical-align: middle" class="text-center">RT</th>
        <th style="vertical-align: middle" class="text-center">Pendidikan</th>
        <th style="vertical-align: middle" class="text-center">Usia</th>
        <th style="vertical-align: middle" class="text-center">Pekerjaan</th>
        <th style="vertical-align: middle" class="text-center">Jenis Kelamin</th>
    </thead>
    <tbody>
        @forelse ($penduduk as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kk }}</td>
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
@endsection
