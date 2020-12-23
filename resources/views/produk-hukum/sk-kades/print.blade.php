@extends('produk-hukum.print')
@section('title', 'Data SK Kepala Desa')
@section('judul', 'Buku Keputusan Desa')
@section('table')
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="vertical-align: middle; text-align: center">No.</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Keputusan Kepala Desa</th>
            <th style="vertical-align: middle; text-align: center">Tentang</th>
            <th style="vertical-align: middle; text-align: center">Uraian Singkat</th>
            <th style="vertical-align: middle; text-align: center">Nomor Dan Tanggal Dilaporkan</th>
            <th style="vertical-align: middle; text-align: center">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sk_kades as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>Nomor {{ $item->nomor_keputusan_kades }}, Tanggal {{ tgl($item->tanggal_keputusan_kades) }}</td>
                <td>{{ $item->judul_dokumen }}</td>
                <td>{{ $item->uraian_singkat }}</td>
                <td>Nomor {{ $item->nomor_dilaporkan }}, Tanggal {{ tgl($item->tanggal_dilaporkan) }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
