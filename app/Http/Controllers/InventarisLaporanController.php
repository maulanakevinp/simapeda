<?php

namespace App\Http\Controllers;

use App\Desa;
use App\InventarisAsset;
use App\InventarisGedung;
use App\InventarisJalan;
use App\InventarisKontruksi;
use App\InventarisPeralatan;
use App\InventarisTanah;
use App\PemerintahanDesa;
use Illuminate\Http\Request;

class InventarisLaporanController extends Controller
{
    public function index()
    {
        $pemerintahan_desa = PemerintahanDesa::all();
        $jumlah = $this->data();

        return view('inventaris.laporan.index', compact('pemerintahan_desa','jumlah'));
    }

    public function print(Request $request)
    {
        $desa = Desa::find(1);
        $ditandatangani = PemerintahanDesa::find($request->ditandatangani);
        $tahun = $request->tahun;
        $jumlah = $this->data($tahun);

        return view('inventaris.laporan.print', compact('ditandatangani','jumlah','desa','tahun'));
    }

    private function data($tahun = null)
    {
        if ($tahun) {
            $data = [
                'tanah_pembelian_sendiri'       =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'tanah_bantuan_pemerintah'      =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'tanah_bantuan_provinsi'        =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'tanah_bantuan_kabupaten'       =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'tanah_sumbangan'               =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Sumbangan')->count(),
                'tanah_hak_adat'                =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Hak Adat')->count(),
                'tanah_hibah'                   =>  InventarisTanah::where('tahun_pengadaan', $tahun)->where('asal_usul','Hibah')->count(),
                'peralatan_pembelian_sendiri'   =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'peralatan_bantuan_pemerintah'  =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'peralatan_bantuan_provinsi'    =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'peralatan_bantuan_kabupaten'   =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'peralatan_sumbangan'           =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Sumbangan')->count(),
                'peralatan_hak_adat'            =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Hak Adat')->count(),
                'peralatan_hibah'               =>  InventarisPeralatan::where('tahun_pembelian', $tahun)->where('asal_usul','Hibah')->count(),
                'gedung_pembelian_sendiri'      =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'gedung_bantuan_pemerintah'     =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'gedung_bantuan_provinsi'       =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'gedung_bantuan_kabupaten'      =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'gedung_sumbangan'              =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Sumbangan')->count(),
                'gedung_hak_adat'               =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Hak Adat')->count(),
                'gedung_hibah'                  =>  InventarisGedung::where('tahun_pengadaan', $tahun)->where('asal_usul','Hibah')->count(),
                'jalan_pembelian_sendiri'       =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'jalan_bantuan_pemerintah'      =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'jalan_bantuan_provinsi'        =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'jalan_bantuan_kabupaten'       =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'jalan_sumbangan'               =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Sumbangan')->count(),
                'jalan_hak_adat'                =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Hak Adat')->count(),
                'jalan_hibah'                   =>  InventarisJalan::where('tahun_pengadaan', $tahun)->where('asal_usul','Hibah')->count(),
                'asset_pembelian_sendiri'       =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'asset_bantuan_pemerintah'      =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'asset_bantuan_provinsi'        =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'asset_bantuan_kabupaten'       =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'asset_sumbangan'               =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Sumbangan')->count(),
                'asset_hak_adat'                =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Hak Adat')->count(),
                'asset_hibah'                   =>  InventarisAsset::where('tahun_pengadaan', $tahun)->where('asal_usul','Hibah')->count(),
                'kontruksi_pembelian_sendiri'   =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Pembelian Sendiri')->count(),
                'kontruksi_bantuan_pemerintah'  =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Bantuan Pemerintah')->count(),
                'kontruksi_bantuan_provinsi'    =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Bantuan Provinsi')->count(),
                'kontruksi_bantuan_kabupaten'   =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Bantuan Kabupaten')->count(),
                'kontruksi_sumbangan'           =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Sumbangan')->count(),
                'kontruksi_hak_adat'            =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Hak Adat')->count(),
                'kontruksi_hibah'               =>  InventarisKontruksi::whereYear('tanggal_mulai', $tahun)->where('asal_usul','Hibah')->count(),
            ];
        } else {
            $data = [
                'tanah_pembelian_sendiri'       =>  InventarisTanah::where('asal_usul','Pembelian Sendiri')->count(),
                'tanah_bantuan_pemerintah'      =>  InventarisTanah::where('asal_usul','Bantuan Pemerintah')->count(),
                'tanah_bantuan_provinsi'        =>  InventarisTanah::where('asal_usul','Bantuan Provinsi')->count(),
                'tanah_bantuan_kabupaten'       =>  InventarisTanah::where('asal_usul','Bantuan Kabupaten')->count(),
                'tanah_sumbangan'               =>  InventarisTanah::where('asal_usul','Sumbangan')->count(),
                'tanah_hak_adat'                =>  InventarisTanah::where('asal_usul','Hak Adat')->count(),
                'tanah_hibah'                   =>  InventarisTanah::where('asal_usul','Hibah')->count(),
                'peralatan_pembelian_sendiri'   =>  InventarisPeralatan::where('asal_usul','Pembelian Sendiri')->count(),
                'peralatan_bantuan_pemerintah'  =>  InventarisPeralatan::where('asal_usul','Bantuan Pemerintah')->count(),
                'peralatan_bantuan_provinsi'    =>  InventarisPeralatan::where('asal_usul','Bantuan Provinsi')->count(),
                'peralatan_bantuan_kabupaten'   =>  InventarisPeralatan::where('asal_usul','Bantuan Kabupaten')->count(),
                'peralatan_sumbangan'           =>  InventarisPeralatan::where('asal_usul','Sumbangan')->count(),
                'peralatan_hak_adat'            =>  InventarisPeralatan::where('asal_usul','Hak Adat')->count(),
                'peralatan_hibah'               =>  InventarisPeralatan::where('asal_usul','Hibah')->count(),
                'gedung_pembelian_sendiri'      =>  InventarisGedung::where('asal_usul','Pembelian Sendiri')->count(),
                'gedung_bantuan_pemerintah'     =>  InventarisGedung::where('asal_usul','Bantuan Pemerintah')->count(),
                'gedung_bantuan_provinsi'       =>  InventarisGedung::where('asal_usul','Bantuan Provinsi')->count(),
                'gedung_bantuan_kabupaten'      =>  InventarisGedung::where('asal_usul','Bantuan Kabupaten')->count(),
                'gedung_sumbangan'              =>  InventarisGedung::where('asal_usul','Sumbangan')->count(),
                'gedung_hak_adat'               =>  InventarisGedung::where('asal_usul','Hak Adat')->count(),
                'gedung_hibah'                  =>  InventarisGedung::where('asal_usul','Hibah')->count(),
                'jalan_pembelian_sendiri'       =>  InventarisJalan::where('asal_usul','Pembelian Sendiri')->count(),
                'jalan_bantuan_pemerintah'      =>  InventarisJalan::where('asal_usul','Bantuan Pemerintah')->count(),
                'jalan_bantuan_provinsi'        =>  InventarisJalan::where('asal_usul','Bantuan Provinsi')->count(),
                'jalan_bantuan_kabupaten'       =>  InventarisJalan::where('asal_usul','Bantuan Kabupaten')->count(),
                'jalan_sumbangan'               =>  InventarisJalan::where('asal_usul','Sumbangan')->count(),
                'jalan_hak_adat'                =>  InventarisJalan::where('asal_usul','Hak Adat')->count(),
                'jalan_hibah'                   =>  InventarisJalan::where('asal_usul','Hibah')->count(),
                'asset_pembelian_sendiri'       =>  InventarisAsset::where('asal_usul','Pembelian Sendiri')->count(),
                'asset_bantuan_pemerintah'      =>  InventarisAsset::where('asal_usul','Bantuan Pemerintah')->count(),
                'asset_bantuan_provinsi'        =>  InventarisAsset::where('asal_usul','Bantuan Provinsi')->count(),
                'asset_bantuan_kabupaten'       =>  InventarisAsset::where('asal_usul','Bantuan Kabupaten')->count(),
                'asset_sumbangan'               =>  InventarisAsset::where('asal_usul','Sumbangan')->count(),
                'asset_hak_adat'                =>  InventarisAsset::where('asal_usul','Hak Adat')->count(),
                'asset_hibah'                   =>  InventarisAsset::where('asal_usul','Hibah')->count(),
                'kontruksi_pembelian_sendiri'   =>  InventarisKontruksi::where('asal_usul','Pembelian Sendiri')->count(),
                'kontruksi_bantuan_pemerintah'  =>  InventarisKontruksi::where('asal_usul','Bantuan Pemerintah')->count(),
                'kontruksi_bantuan_provinsi'    =>  InventarisKontruksi::where('asal_usul','Bantuan Provinsi')->count(),
                'kontruksi_bantuan_kabupaten'   =>  InventarisKontruksi::where('asal_usul','Bantuan Kabupaten')->count(),
                'kontruksi_sumbangan'           =>  InventarisKontruksi::where('asal_usul','Sumbangan')->count(),
                'kontruksi_hak_adat'            =>  InventarisKontruksi::where('asal_usul','Hak Adat')->count(),
                'kontruksi_hibah'               =>  InventarisKontruksi::where('asal_usul','Hibah')->count(),
            ];
        }
        return $data;
    }
}
