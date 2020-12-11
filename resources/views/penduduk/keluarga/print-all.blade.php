@extends('layouts.cetak')
@section('title','Data Kepala Keluarga Penduduk')

@section('content')
    <div class="text-center mb-3" style="margin-top:20px">
        <h6 class="font-weight-bold">Data Kepala Keluarga Penduduk</h6>
        <p>{{ tgl(date('Y-m-d')) }}</p>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle; text-align: center;" class="text-center">NO</th>
                <th style="vertical-align: middle; text-align: center; width: 100px" class="text-center">NOMOR KK</th>
                <th style="vertical-align: middle; text-align: center;" class="text-center">KEPALA KELUARGA</th>
                <th style="vertical-align: middle; text-align: center; width: 100px" class="text-center">NIK</th>
                <th style="vertical-align: middle; text-align: center; width: 60px" class="text-center">JUMLAH ANGGOTA</th>
                <th style="vertical-align: middle; text-align: center; width: 60px" class="text-center">JENIS KELAMIN</th>
                <th style="vertical-align: middle; text-align: center;" class="text-center">ALAMAT</th>
                <th style="vertical-align: middle; text-align: center;" class="text-center">DUSUN</th>
                <th style="vertical-align: middle; text-align: center;" class="text-center">RW</th>
                <th style="vertical-align: middle; text-align: center;" class="text-center">RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $item)
                <tr>
                    <td style="vertical-align: middle; text-align: center;">{{ $loop->iteration }}</td>
                    <td style="vertical-align: middle;">{{ $item->kk }}</td>
                    <td>{{ $item->nama }}</td>
                    <td style="vertical-align: middle;">{{ $item->nik }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ App\Penduduk::where('kk',$item->kk)->count() }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $item->jenis_kelamin == 1 ? "Laki-laki" : "Perempuan" }}</td>
                    <td>{{ $item->alamat_sekarang }}</td>
                    <td style="vertical-align: middle;">{{ $item->detailDusun->dusun->nama ?? '-' }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $item->detailDusun->rw ?? '-' }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $item->detailDusun->rt ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
