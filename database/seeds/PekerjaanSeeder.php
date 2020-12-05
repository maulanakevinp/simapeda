<?php

use App\Pekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pekerjaan::truncate();
        Pekerjaan::create(['nama' => 'Ahli Pengobatan Alternatif']);
        Pekerjaan::create(['nama' => 'Akuntan']);
        Pekerjaan::create(['nama' => 'Anggota kabinet kementrian']);
        Pekerjaan::create(['nama' => 'Anggota Legislatif']);
        Pekerjaan::create(['nama' => 'Anggota Mahkama Konstitusi']);
        Pekerjaan::create(['nama' => 'Apoteker']);
        Pekerjaan::create(['nama' => 'Arsitektur/Desainer']);
        Pekerjaan::create(['nama' => 'Belum Bekerja']);
        Pekerjaan::create(['nama' => 'Biarawati']);
        Pekerjaan::create(['nama' => 'Bidan Swasta']);
        Pekerjaan::create(['nama' => 'Bupati/walikota']);
        Pekerjaan::create(['nama' => 'Bidan swasta']);
        Pekerjaan::create(['nama' => 'Buruh Harian Lepas']);
        Pekerjaan::create(['nama' => 'Buruh jasa perdagangan hasil bumi']);
        Pekerjaan::create(['nama' => 'Buruh Migran']);
        Pekerjaan::create(['nama' => 'Buruh usaha hotel dan penginapan lainnya']);
        Pekerjaan::create(['nama' => 'Buruh usaha jasa hiburan dan pariwisata']);
        Pekerjaan::create(['nama' => 'Buruh usaha jasa informasi dan komunikasi']);
        Pekerjaan::create(['nama' => 'Buruh usaha jasa transportasi dan perhubungan']);
        Pekerjaan::create(['nama' => 'Dokter swasta']);
        Pekerjaan::create(['nama' => 'Dosen swasta']);
        Pekerjaan::create(['nama' => 'Dukun Tradisional']);
        Pekerjaan::create(['nama' => 'Dukun/paranormal/supranatural']);
        Pekerjaan::create(['nama' => 'Duta Besar']);
        Pekerjaan::create(['nama' => 'Gubernur']);
        Pekerjaan::create(['nama' => 'Guru swasta']);
        Pekerjaan::create(['nama' => 'Ibu Rumah Tangga']);
        Pekerjaan::create(['nama' => 'Jasa Konsultansi Manajemen dan Teknis']);
        Pekerjaan::create(['nama' => 'Jasa pengobatan alternatif']);
        Pekerjaan::create(['nama' => 'Jasa penyewaan peralatan pesta']);
        Pekerjaan::create(['nama' => 'Juru Masak']);
        Pekerjaan::create(['nama' => 'Karyawan Honorer']);
        Pekerjaan::create(['nama' => 'Karyawan Perusahaan Pemerintah']);
        Pekerjaan::create(['nama' => 'Karyawan Perusahaan Swasta']);
        Pekerjaan::create(['nama' => 'Kepala Daerah']);
        Pekerjaan::create(['nama' => 'Konsultan Manajemen dan Teknis']);
        Pekerjaan::create(['nama' => 'Kontraktor']);
        Pekerjaan::create(['nama' => 'Montir']);
        Pekerjaan::create(['nama' => 'Nelayan']);
        Pekerjaan::create(['nama' => 'Notaris']);
        Pekerjaan::create(['nama' => 'Pedagang barang kelontong']);
        Pekerjaan::create(['nama' => 'Pedagang Keliling']);
        Pekerjaan::create(['nama' => 'Pegawai Negeri Sipil']);
        Pekerjaan::create(['nama' => 'Pelajar']);
        Pekerjaan::create(['nama' => 'Pelaut']);
        Pekerjaan::create(['nama' => 'Pembantu rumah tangga']);
        Pekerjaan::create(['nama' => 'Pemilik perusahaan']);
        Pekerjaan::create(['nama' => 'Pemilik usaha hotel dan penginapan lainnya']);
        Pekerjaan::create(['nama' => 'Pemilik usaha informasi dan komunikasi']);
        Pekerjaan::create(['nama' => 'Pemilik usaha jasa hiburan dan pariwisata']);
        Pekerjaan::create(['nama' => 'Pemilik usaha jasa transportasi dan perhubungan']);
        Pekerjaan::create(['nama' => 'Pemilik usaha warung, rumah makan dan restoran']);
        Pekerjaan::create(['nama' => 'Pemuka Agama']);
        Pekerjaan::create(['nama' => 'Pemulung']);
        Pekerjaan::create(['nama' => 'Penambang']);
        Pekerjaan::create(['nama' => 'peneliti']);
        Pekerjaan::create(['nama' => 'Pengacara']);
        Pekerjaan::create(['nama' => 'Pengrajin']);
        Pekerjaan::create(['nama' => 'Pengrajin industri rumah tangga lainnya']);
        Pekerjaan::create(['nama' => 'Pengusaha kecil, menengah dan besar']);
        Pekerjaan::create(['nama' => 'Pengusaha perdagangan hasil bumi']);
        Pekerjaan::create(['nama' => 'Penyiar radio']);
        Pekerjaan::create(['nama' => 'Perangkat Desa']);
        Pekerjaan::create(['nama' => 'Perawat swasta']);
        Pekerjaan::create(['nama' => 'Petani']);
        Pekerjaan::create(['nama' => 'Peternak']);
        Pekerjaan::create(['nama' => 'Pialang']);
        Pekerjaan::create(['nama' => 'Pilot']);
        Pekerjaan::create(['nama' => 'POLRI']);
        Pekerjaan::create(['nama' => 'Presiden']);
        Pekerjaan::create(['nama' => 'Pskiater/Psikolog']);
        Pekerjaan::create(['nama' => 'Purnawirawan/Pensiunan']);
        Pekerjaan::create(['nama' => 'Satpam/Security']);
        Pekerjaan::create(['nama' => 'Seniman/artis']);
        Pekerjaan::create(['nama' => 'Sopir']);
        Pekerjaan::create(['nama' => 'Tidak Mempunyai Pekerjaan Tetap']);
        Pekerjaan::create(['nama' => 'TNI']);
        Pekerjaan::create(['nama' => 'Tukang Anyaman']);
        Pekerjaan::create(['nama' => 'Tukang Batu']);
        Pekerjaan::create(['nama' => 'Tukang Cuci']);
        Pekerjaan::create(['nama' => 'Tukang Gigi']);
        Pekerjaan::create(['nama' => 'Tukang Jahit']);
        Pekerjaan::create(['nama' => 'Tukang Kayu']);
        Pekerjaan::create(['nama' => 'Tukang Kue']);
        Pekerjaan::create(['nama' => 'Tukang Las']);
        Pekerjaan::create(['nama' => 'Tukang Listrik']);
        Pekerjaan::create(['nama' => 'Tukang Rias']);
        Pekerjaan::create(['nama' => 'Tukang Sumur']);
        Pekerjaan::create(['nama' => 'Usaha jasa pengerah tenaga kerja']);
        Pekerjaan::create(['nama' => 'Wakil bupati']);
        Pekerjaan::create(['nama' => 'Wakil Gubernur']);
        Pekerjaan::create(['nama' => 'Wakil presiden']);
        Pekerjaan::create(['nama' => 'Wartawan']);
        Pekerjaan::create(['nama' => 'Wiraswasta']);
        Pekerjaan::create(['nama' => 'Lainnya']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
