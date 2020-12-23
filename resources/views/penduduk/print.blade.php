@extends('layouts.cetak')
@section('title','Data Penduduk')

@section('content')
    <div class="text-center mb-3" style="margin-top:20px">
        <h6 class="font-weight-bold">Data Penduduk</h6>
        <p>{{ tgl(date('Y-m-d')) }}</p>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle" class="text-center">NO</th>
                <th style="vertical-align: middle" class="text-center">KODE KELUARGA</th>
                <th style="vertical-align: middle" class="text-center">NAMA</th>
                <th style="vertical-align: middle" class="text-center">NIK</th>
                <th style="vertical-align: middle" class="text-center">ALAMAT</th>
                <th style="vertical-align: middle" class="text-center">DUSUN</th>
                <th style="vertical-align: middle" class="text-center">RW</th>
                <th style="vertical-align: middle" class="text-center">RT</th>
                <th style="vertical-align: middle" class="text-center">JENIS KELAMIN</th>
                <th style="vertical-align: middle" class="text-center">TEMPAT LAHIR</th>
                <th style="vertical-align: middle" class="text-center">TANGGAL LAHIR</th>
                <th style="vertical-align: middle" class="text-center">UMUR</th>
                <th style="vertical-align: middle" class="text-center">AGAMA</th>
                <th style="vertical-align: middle" class="text-center">PENDIDIKAN</th>
                <th style="vertical-align: middle" class="text-center">PEKERJAAN</th>
                <th style="vertical-align: middle" class="text-center">STATUS PERKAWINAN</th>
                <th style="vertical-align: middle" class="text-center">HUBUNGAN DALAM KELUARGA</th>
                <th style="vertical-align: middle" class="text-center">NAMA AYAH</th>
                <th style="vertical-align: middle" class="text-center">NAMA IBU</th>
                <th style="vertical-align: middle" class="text-center">STATUS PENDUDUK</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($penduduk as $anggota)
                @foreach ($anggota as $item)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">{{ $no++ }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->kk }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->nama }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->nik }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->alamat_sekarang }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->detailDusun->dusun->nama ?? '-'}}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->detailDusun->rw ?? '-'}}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->detailDusun->rt ?? '-'}}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->jenis_kelamin == 1 ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->tempat_lahir }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ tgl(date('Y-m-d',strtotime($item->tanggal_lahir))) }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ date('Y') - date('Y',strtotime($item->tanggal_lahir)) }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->agama->nama ?? '-' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->pendidikan->nama ?? '-' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->pekerjaan->nama ?? '-' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->statusPerkawinan->nama ?? '-' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->statusHubunganDalamKeluarga->nama ?? '-' }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->nama_ayah }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->nama_ibu }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $item->statusPenduduk->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
