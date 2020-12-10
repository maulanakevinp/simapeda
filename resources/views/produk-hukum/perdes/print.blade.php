@extends('produk-hukum.print')
@section('title', 'Data Peraturan Desa')
@section('judul', 'Buku Peraturan Desa')
@section('table')
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="vertical-align: middle; text-align: center">No.</th>
            <th style="vertical-align: middle; text-align: center">Jenis Peraturan Di Desa</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Ditetapkan</th>
            <th style="vertical-align: middle; text-align: center">Tentang</th>
            <th style="vertical-align: middle; text-align: center">Uraian Singkat</th>
            <th style="vertical-align: middle; text-align: center">Tanggal Kesepakatan Peraturan Desa</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Dilaporkan</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Diundangkan Dalam Lembaran Desa</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Diundangkan Dalam Berita Desa</th>
            <th style="vertical-align: middle; text-align: center">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perdes as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->jenis_peraturan }}</td>
                <td>Nomor {{ $item->nomor_ditetapkan }}, Tanggal {{ tgl($item->tanggal_ditetapkan) }}</td>
                <td>{{ $item->judul_dokumen }}</td>
                <td>{{ $item->uraian_singkat }}</td>
                <td>{{ tgl($item->tanggal_kesepakatan) }}</td>
                <td>Nomor {{ $item->nomor_dilaporkan }}, Tanggal {{ tgl($item->tanggal_dilaporkan) }}</td>
                <td>Nomor {{ $item->nomor_diundangkan_dalam_lembaran_desa }}, Tanggal {{ tgl($item->tanggal_diundangkan_dalam_lembaran_desa) }}</td>
                <td>Nomor {{ $item->nomor_diundangkan_dalam_berita_desa }}, Tanggal {{ tgl($item->tanggal_diundangkan_dalam_berita_desa) }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
