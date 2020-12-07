@extends('inventaris.print')
@section('title', 'BUKU INVENTARIS DAN KEKAYAAN DESA')
@section('judul', 'BUKU INVENTARIS DAN KEKAYAAN DESA')
@section('table')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="vertical-align: middle" class="text-center" rowspan="3">No</th>
                <th style="vertical-align: middle" class="text-center" rowspan="3">Jenis Barang</th>
                <th style="vertical-align: middle" class="text-center" colspan="7">Asal barang</th>
                <th style="vertical-align: middle" class="text-center" rowspan="3">Keterangan</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center" rowspan="2">Dibeli Sendiri</th>
                <th style="vertical-align: middle" class="text-center" colspan="3">Bantuan</th>
                <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Sumbangan</th>
                <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Hak Adat</th>
                <th style="vertical-align: middle" class="text-center" style="text-align:center;" rowspan="2">Hibah</th>
            </tr>
            <tr>
                <th style="vertical-align: middle" class="text-center" >Pemerintah</th>
                <th style="vertical-align: middle" class="text-center" >Provinsi</th>
                <th style="vertical-align: middle" class="text-center" >Kabupaten</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: middle" class="text-center">1</td>
                <td style="vertical-align: middle">Tanah Kas Desa</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['tanah_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai segala yang menyangkut dengan tanah (dalam hal ini tanah yang digunakan dalam instansi tersebut).</td>
            </tr>
            <tr>
                <td style="vertical-align: middle" class="text-center">2</td>
                <td style="vertical-align: middle">Peralatan dan Mesin</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['peralatan_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai peralatan dan mesin</td>
            </tr>
            <tr>
                <td style="vertical-align: middle" class="text-center">3</td>
                <td style="vertical-align: middle">Gedung dan Bangunan</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['gedung_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai gedung dan bangunan yang dimiliki.</td>
            </tr>
            <tr>
                <td style="vertical-align: middle" class="text-center">4</td>
                <td style="vertical-align: middle"> Jalan Irigasi dan Jaringan</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['jalan_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai jaringan, seperti listrik atau Internet.</td>
            </tr>
            <tr>
                <td style="vertical-align: middle" class="text-center">5</td>
                <td style="vertical-align: middle"> Asset Tetap Lainnya</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['asset_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai aset tetap seperti barang habis pakai contohnya buku-buku.</td>
            </tr>
            <tr>
                <td style="vertical-align: middle" class="text-center">6</td>
                <td style="vertical-align: middle">Kontruksi Dalam Pengerjaan</td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_pembelian_sendiri'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_bantuan_pemerintah'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_bantuan_provinsi'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_bantuan_kabupaten'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_sumbangan'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_hak_adat'] }}
                </td>
                <td class="text-center" style="vertical-align: middle">
                    {{ $jumlah['kontruksi_hibah'] }}
                </td>
                <td style="vertical-align: middle">Informasi mengenai bangunan yang masih dalam pengerjaan.</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2" class="text-right">Total</th>
                <th class="text-center">{{ $jumlah['tanah_pembelian_sendiri']   + $jumlah['peralatan_pembelian_sendiri']    + $jumlah['gedung_pembelian_sendiri']   + $jumlah['jalan_pembelian_sendiri']    + $jumlah['asset_pembelian_sendiri']    + $jumlah['kontruksi_pembelian_sendiri'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_bantuan_pemerintah']  + $jumlah['peralatan_bantuan_pemerintah']   + $jumlah['gedung_bantuan_pemerintah']  + $jumlah['jalan_bantuan_pemerintah']   + $jumlah['asset_bantuan_pemerintah']   + $jumlah['kontruksi_bantuan_pemerintah'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_bantuan_provinsi']    + $jumlah['peralatan_bantuan_provinsi']     + $jumlah['gedung_bantuan_provinsi']    + $jumlah['jalan_bantuan_provinsi']     + $jumlah['asset_bantuan_provinsi']     + $jumlah['kontruksi_bantuan_provinsi'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_bantuan_kabupaten']   + $jumlah['peralatan_bantuan_kabupaten']    + $jumlah['gedung_bantuan_kabupaten']   + $jumlah['jalan_bantuan_kabupaten']    + $jumlah['asset_bantuan_kabupaten']    + $jumlah['kontruksi_bantuan_kabupaten'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_sumbangan']           + $jumlah['peralatan_sumbangan']            + $jumlah['gedung_sumbangan']           + $jumlah['jalan_sumbangan']            + $jumlah['asset_sumbangan']            + $jumlah['kontruksi_sumbangan'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_hak_adat']            + $jumlah['peralatan_hak_adat']             + $jumlah['gedung_hak_adat']            + $jumlah['jalan_hak_adat']             + $jumlah['asset_hak_adat']             + $jumlah['kontruksi_hak_adat'] }}</th>
                <th class="text-center">{{ $jumlah['tanah_hibah']               + $jumlah['peralatan_hibah']                + $jumlah['gedung_hibah']               + $jumlah['jalan_hibah']                + $jumlah['asset_hibah']                + $jumlah['kontruksi_hibah'] }}</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
@endsection
