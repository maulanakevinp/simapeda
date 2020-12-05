<?php

use App\KodeSurat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KodeSurat::truncate();
        KodeSurat::create([
            'kode'      => '000',
            'nama'      => 'UMUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001',
            'nama'      => 'Lambang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.1',
            'nama'      => 'Garuda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.2',
            'nama'      => 'Bendera Kebangsaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.3',
            'nama'      => 'Lagu Kebangsaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.4',
            'nama'      => 'Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.31',
            'nama'      => 'Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '001.32',
            'nama'      => 'Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002',
            'nama'      => 'Tanda Kehormatan/Penghargaan untuk pegawai ',
            'uraian'    => 'lihat 861.1'])
        ;
        KodeSurat::create([
            'kode'      => '002.1',
            'nama'      => 'Bintang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002.2',
            'nama'      => 'Satyalencana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002.3',
            'nama'      => 'Samkarya Nugraha',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002.4',
            'nama'      => 'Monumen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002.5',
            'nama'      => 'Penghargaan Secara Adat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '002.6',
            'nama'      => 'Penghargaan lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '003',
            'nama'      => 'Hari Raya/Besar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '003.1',
            'nama'      => 'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '003.2',
            'nama'      => 'Hari Raya Keagamaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '003.3',
            'nama'      => 'Hari Ulang Tahun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '003.4',
            'nama'      => 'Hari-hari Besar Internasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '004',
            'nama'      => 'Ucapan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '004.1',
            'nama'      => 'Ucapan Terima Kasih',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '004.2',
            'nama'      => 'Ucapan Selamat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '004.3',
            'nama'      => 'Ucapan Belasungkawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '004.4',
            'nama'      => 'Ucapan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '005',
            'nama'      => 'Undangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '006',
            'nama'      => 'Tanda Jabatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '006.1',
            'nama'      => 'Pamong Praja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '006.2',
            'nama'      => 'Tanda Pengenal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '006.3',
            'nama'      => 'Pejabat lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '007',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '008',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '009',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '010',
            'nama'      => 'URUSAN DALAM ',
            'uraian'    => 'Gedung Kantor/Termasuk Instalasi Prasarana Fisik Pamong'])
        ;
        KodeSurat::create([
            'kode'      => '011',
            'nama'      => 'Kantor Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012',
            'nama'      => 'Rumah Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.1',
            'nama'      => 'Tanah Untuk Rumah Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.2',
            'nama'      => 'Perabot Rumah Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.3',
            'nama'      => 'Rumah Dinas Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.4',
            'nama'      => 'Rumah Dinas Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.5',
            'nama'      => 'Rumah Dinas Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.6',
            'nama'      => 'Rumah/Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '012.7',
            'nama'      => 'Rumah Pejabat Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '013',
            'nama'      => 'Mess/Guest House',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '014',
            'nama'      => 'Rumah Susun/Apartemen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '015',
            'nama'      => 'Penerangan Listrik/Jasa Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '016',
            'nama'      => 'Telepon/Faximile/Internet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '017',
            'nama'      => 'Keamanan/Ketertiban Kantor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '018',
            'nama'      => 'Kebersihan Kantor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019',
            'nama'      => 'Protokol',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.1',
            'nama'      => 'Upacara Bendera',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.2',
            'nama'      => 'Tata Tempat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.21',
            'nama'      => 'Pemasangan Gambar Presiden/Wakil Presiden',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.3',
            'nama'      => 'Audiensi / Menghadap Pimpinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.4',
            'nama'      => 'Alamat-Alamat Kantor Pejabat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '019.5',
            'nama'      => 'Bandir/Umbul-Umbul/Spanduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '020',
            'nama'      => 'PERALATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '020.1',
            'nama'      => 'Penawaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '021',
            'nama'      => 'Alat Tulis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '022',
            'nama'      => 'Mesin Kantor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '023',
            'nama'      => 'Perabot Kantor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '024',
            'nama'      => 'Alat Angkutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '025',
            'nama'      => 'Pakaian Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '026',
            'nama'      => 'Senjata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '027',
            'nama'      => 'Pengadaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '028',
            'nama'      => 'Inventaris',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '029',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '030',
            'nama'      => 'KEKAYAAN DAERAH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '031',
            'nama'      => 'Sumber Daya Alam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '032',
            'nama'      => 'Asset Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '033',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '034',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '035',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '036',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '040',
            'nama'      => 'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041',
            'nama'      => 'Perpustakaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041.1',
            'nama'      => 'Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041.2',
            'nama'      => 'Khusus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041.3',
            'nama'      => 'Perguruan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041.4',
            'nama'      => 'Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '041.5',
            'nama'      => 'Keliling',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '042',
            'nama'      => 'Dokumentasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '043',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '044',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045',
            'nama'      => 'Kearsipan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.1',
            'nama'      => 'Pola Klasifikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.2',
            'nama'      => 'Penataan Berkas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.3',
            'nama'      => 'Penyusutan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.31',
            'nama'      => 'Jadwal Retensi Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.32',
            'nama'      => 'Pemindahan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.33',
            'nama'      => 'Penilaian Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.34',
            'nama'      => 'Pemusnahan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.35',
            'nama'      => 'Penyerahan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.36',
            'nama'      => 'Berita Acara Penyusutan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.37',
            'nama'      => 'Daftar Pencarian Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.4',
            'nama'      => 'Pembinaan Kearsipan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.41',
            'nama'      => 'Bimbingan Teknis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.5',
            'nama'      => 'Pemeliharaan /Perawatan Arsip',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '045.6',
            'nama'      => 'Pengawetan/Fumigasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '046',
            'nama'      => 'Sandi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '047',
            'nama'      => 'Website',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '048',
            'nama'      => 'Pengelolaan Data',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '049',
            'nama'      => 'Jaringan Komunikasi Data',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '050',
            'nama'      => 'PERENCANAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '050.1',
            'nama'      => 'Repelita/8 Sukses',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '050.11',
            'nama'      => 'Pelita Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '050.12',
            'nama'      => 'Bantuan Pembangunan Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '050.13',
            'nama'      => 'Bappeda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '051',
            'nama'      => 'Proyek Bidang Pemerintahan',
            'uraian'    => 'Klasifikasikan Disini : Proyek Prasaran Fisik Pemerintahan, Tambahkan Perincian 100 Pada 051 Contoh: Proyek Kepenjaraan 051.86'
        ]);
        KodeSurat::create([
            'kode'      => '052',
            'nama'      => 'Bidang Politik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '053',
            'nama'      => 'Bidang Keamanan Dan Ketertiban',
            'uraian'    => 'Tambahkan Perincian 300 Pada 053 Contoh: Proyek Ketataprajaan 053.311 '])
        ;
        KodeSurat::create([
            'kode'      => '054',
            'nama'      => 'Bidang Kesejahteraan Rakyat ',
            'uraian'    => 'Tambahkan Peincian 400 pada 054 Contoh: Proyek Resettlement Desa 054.671'])
        ;
        KodeSurat::create([
            'kode'      => '055',
            'nama'      => 'Bidang Perekonomian ',
            'uraian'    => 'Tambahkan Perincian 500 Pada 055 Contoh: Proyek Pasar 055.112'])
        ;
        KodeSurat::create([
            'kode'      => '056',
            'nama'      => 'Bidang Pekerjaan Umum ',
            'uraian'    => 'Tambahkan Perincian 600 pada 056 Contoh: Proyek Jembatan 056.3'])
        ;
        KodeSurat::create([
            'kode'      => '057',
            'nama'      => 'Bidang Pengawasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '058',
            'nama'      => 'Bidang Kepegawaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '059',
            'nama'      => 'Bidang Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '060',
            'nama'      => 'ORGANISASI / KETATALAKSANAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '060.1',
            'nama'      => 'Program Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '061',
            'nama'      => 'Organisasi Instansi Pemerintah (struktur organisasi)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '061.1',
            'nama'      => 'Susunan dan Tata Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '061.2',
            'nama'      => 'Tata Tertib Kantor, Jam Kerja di Bulan Puasa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '062',
            'nama'      => 'Organisasi Badan Non Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '063',
            'nama'      => 'Organisasi Badan Internasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '064',
            'nama'      => 'Organisasi Semi Pemerintah, BKS-AKSI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '065',
            'nama'      => 'Ketatalaksanaan / Tata Naskah / Sistem',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '066',
            'nama'      => 'Stempel Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '067',
            'nama'      => 'Pelayanan Umum / Pelayanan Publik / Analisis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '068',
            'nama'      => 'Komputerisasi / Siskomdagri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '069',
            'nama'      => 'Standar Pelayanan Minimal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '070',
            'nama'      => 'PENELITIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '071',
            'nama'      => 'Riset',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '072',
            'nama'      => 'Survey',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '073',
            'nama'      => 'Kajian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '074',
            'nama'      => 'Kerjasama Penelitian Dengan Perguruan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '075',
            'nama'      => 'Kementerian Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '076',
            'nama'      => 'Non Kementerian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '077',
            'nama'      => 'Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '078',
            'nama'      => 'Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '079',
            'nama'      => 'Kecamatan /Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '080',
            'nama'      => 'KONFERENSI / RAPAT / SEMINAR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '081',
            'nama'      => 'Gubernur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '082',
            'nama'      => 'Bupati / Walikota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '083',
            'nama'      => 'Komponen, Eselon Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '084',
            'nama'      => 'Instansi Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '085',
            'nama'      => 'Internasional Di Dalam Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '086',
            'nama'      => 'Internasional Di Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '087',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '088',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '089',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '090',
            'nama'      => 'PERJALANAN DINAS',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '091',
            'nama'      => 'Perjalanan Presiden/Wakil Presiden Ke Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '092',
            'nama'      => 'Perjalanan Menteri Ke Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '093',
            'nama'      => 'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '094',
            'nama'      => 'Perjalanan Pegawai Termasuk Pemanggilan Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '095',
            'nama'      => 'Perjalanan Tamu Asing Ke Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '096',
            'nama'      => 'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '097',
            'nama'      => 'Perjalanan Menteri Ke Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '098',
            'nama'      => 'Perjalanan Pejabat Tinggi Ke Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '099',
            'nama'      => 'Perjalanan Pegawai ke Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '100',
            'nama'      => 'PEMERINTAHAN',
            'uraian'    => 'Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan luar'])
        ;
        KodeSurat::create([
            'kode'      => '101',
            'nama'      => 'negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '102',
            'nama'      => 'GDN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '103',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '104',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '105',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '110',
            'nama'      => 'PEMERINTAHAN PUSAT',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '111',
            'nama'      => 'Presiden',
            'uraian'    => 'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan'])
        ;
        KodeSurat::create([
            'kode'      => '111.1',
            'nama'      => 'Pertanggung jawaban presiden kpd MPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '111.2',
            'nama'      => 'Amanat Presiden/Amanat Kenegaraan/Pidato',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '112',
            'nama'      => 'Wakil Presiden',
            'uraian'    => 'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan'])
        ;
        KodeSurat::create([
            'kode'      => '112.1',
            'nama'      => 'Pertanggung jawaban wakil presiden kepada MPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '112.2',
            'nama'      => 'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '113',
            'nama'      => 'Susunan Kabinet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '113.1',
            'nama'      => 'Reshuffle',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '113.2',
            'nama'      => 'Penunjukan Menteri ad interim',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '113.3',
            'nama'      => 'Sidang Kabinet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '114',
            'nama'      => 'Kementerian Dalam Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '114.1',
            'nama'      => 'Amanat Menteri Dalam Negeri/Sambutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '115',
            'nama'      => 'Kementerian lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '116',
            'nama'      => 'Lembaga Tinggi Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '117',
            'nama'      => 'Lembaga Non Kementerian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '118',
            'nama'      => 'Otonomi/Desentralisasi/Dekonsentrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '119',
            'nama'      => 'Kerjasama Antar Kementerian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120',
            'nama'      => 'PEMERINTAH PROVINSI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.04',
            'nama'      => 'Laporan daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.42',
            'nama'      => 'Monografi tambahkan kode wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.1',
            'nama'      => 'Koordinasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.2',
            'nama'      => 'Instansi Tingkat Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.21',
            'nama'      => 'Dinas Otonomi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.22',
            'nama'      => 'Instansi Vertikal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '120.23',
            'nama'      => 'Kerjasama antar Provinsi/Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '121',
            'nama'      => 'Gubernur tambahkan kode wilayah',
            'nama'      =>  'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.'
        ]);
        KodeSurat::create([
            'kode'      => '122',
            'nama'      => 'Wakil Gubernur tambahkan kode wilayah',
            'nama'      =>  'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan  dan sebagainya.'
        ]);
        KodeSurat::create([
            'kode'      => '123',
            'nama'      => 'Sekretaris Wilayah tambahkan kode wilayah',
            'nama'      =>  'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.'
        ]);
        KodeSurat::create([
            'kode'      => '124',
            'nama'      => 'Pembentukan/Pemekaran Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '124.1',
            'nama'      => 'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '124.2',
            'nama'      => 'Pemekaran  Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '124.3',
            'nama'      => 'Forum Koordinasi lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125',
            'nama'      => 'Pembentukan Pemekaran Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125.1',
            'nama'      => 'Pembinaan/Perubahan Nama Kepada: Daerah, Kota, Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas Laut, dan sebagainya.',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125.2',
            'nama'      => 'Pembentukan Wialayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125.3',
            'nama'      => 'Pemindahan Ibukota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125.4',
            'nama'      => 'Perubahan batas Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '125.5',
            'nama'      => 'Pemekaran Wialayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '126',
            'nama'      => 'Pembagian Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '127',
            'nama'      => 'Penyerahan Urusan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '128',
            'nama'      => 'Swaparaja/Penataan Wilayah/Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '129',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '130',
            'nama'      => 'PEMERINTAH KABUPATEN / KOTA',
            'uraian'    => 'Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan,Pengangkatan, Meninggal, Pelantikan,'
        ]);
        KodeSurat::create([
            'kode'      => '131',
            'nama'      => 'Pemberhentian, Serah Terima Jabatan, dsb',
            'uraian'    => 'Sambutan / Pengarahan / Amanat Wakil Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan,'
        ]);
        KodeSurat::create([
            'kode'      => '132',
            'nama'      => 'Pemberhentian, Serah Terima Jabatan, Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah',
            'uraian'    => 'Meliputi: Pencalonan, Pengangkatan, Meninggal,'
        ]);
        KodeSurat::create([
            'kode'      => '133',
            'nama'      => 'Pelantikan, Pemberhentian, Serah Terima Jabatan,.',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '134',
            'nama'      => 'Forum Koordinasi Pemerintah Di Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '134.1',
            'nama'      => 'Muspida',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '134.2',
            'nama'      => 'Forum PAN (Panitian Anggaran Nasional)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '134.3',
            'nama'      => 'Forum Koordinasi Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '134.4',
            'nama'      => 'Kerjasama antar Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135',
            'nama'      => 'Pembentukan / Pemekaran Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.1',
            'nama'      => 'Pemindahan Ibukota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.2',
            'nama'      => 'Pembentukan Wilayah Pembantu Bupati/Walikota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.3',
            'nama'      => 'Pemabagian Wilayah Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.4',
            'nama'      => 'Perubahan Batas Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.5',
            'nama'      => 'Pemekaran Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.6',
            'nama'      => 'Permasalahan Batas Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.7',
            'nama'      => 'Pembentukan Ibukota Kabupaten/Kota Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah,',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '135.8',
            'nama'      => 'Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '136',
            'nama'      => 'Pembagian Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '137',
            'nama'      => 'Penyerahan Urusan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138',
            'nama'      => 'Pemerintah Wilayah Kecamatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.1',
            'nama'      => 'Sambutan / Pengarahan / Amanat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.2',
            'nama'      => 'Pembentukan Kecamatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.3',
            'nama'      => 'Pemekaran Kecamatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.4',
            'nama'      => 'Perluasan/Perubahan Batas Wilayah Kecamatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.5',
            'nama'      => 'Pembentukan Perwakilan Kecamatan/Kemantren',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.6',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '138.7',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '139',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '140',
            'nama'      => 'PEMERINTAHAN DESA / KELURAHAN',
            'uraian'    => 'Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal,']
    );
        KodeSurat::create([
            'kode'      => '141',
            'nama'      => 'Pengangkatan, Pemberhenian, dan sebagainya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '142',
            'nama'      => 'Penghasilan Pamong Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '143',
            'nama'      => 'Kekayaan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '144',
            'nama'      => 'Dewan Tingkat Desa, Dewan Marga, Rembug Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '145',
            'nama'      => 'Administrasi Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146',
            'nama'      => 'Kewilayahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146.1',
            'nama'      => 'Pembentukan Desa/Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146.2',
            'nama'      => 'Pemekaran Desa/Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146.3',
            'nama'      => 'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146.4',
            'nama'      => 'Perubahan Nama Desa / Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '146.5',
            'nama'      => 'Kerjasama Antar Desa / Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '147',
            'nama'      => 'Lembaga-lembaga Tingkat Desa',
            'uraian'    => 'Jangan Klasifikasikan Disini, Lihat 410 Dengan Perinciannya'])
        ;
        KodeSurat::create([
            'kode'      => '148',
            'nama'      => 'Perangkat Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '148.1',
            'nama'      => 'Kepala Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '148.2',
            'nama'      => 'Sekretaris Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '148.3',
            'nama'      => 'Staf Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '149.1',
            'nama'      => 'Dewan Kelurahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '149.2',
            'nama'      => 'Rukun Tetangga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '149.3',
            'nama'      => 'Rukun Warga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '149.4',
            'nama'      => 'Rukun Kampung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '150',
            'nama'      => 'LEGISLATIF MPR / DPR / DPD',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '151',
            'nama'      => 'Keanggotaan MPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '151.1',
            'nama'      => 'Pencalonan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '151.2',
            'nama'      => 'Pemberhentian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '151.3',
            'nama'      => 'Recall',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '151.4',
            'nama'      => 'Pelanggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '152',
            'nama'      => 'Persidangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '153',
            'nama'      => 'Kesejahteraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '153.1',
            'nama'      => 'Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '153.2',
            'nama'      => 'Penghargaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '154',
            'nama'      => 'Hak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '155',
            'nama'      => 'Keanggotaan DPR ',
            'uraian'    => 'Pencalonan Pengangkatan Persidangan Sidang Pleno Dengar Pendapat/Rapat Komisi'])
        ;
        KodeSurat::create([
            'kode'      => '156',
            'nama'      => 'Reses',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '157',
            'nama'      => 'Kesejahteraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '157.1',
            'nama'      => 'Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '157.2',
            'nama'      => 'Penghargaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '158',
            'nama'      => 'Jawaban Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '159',
            'nama'      => 'Hak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '160',
            'nama'      => 'DPRD PROVINSI TAMBAHKAN KODE WILAYAH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161',
            'nama'      => 'Keanggotaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.1',
            'nama'      => 'Pencalonan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.2',
            'nama'      => 'Pengangkatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.3',
            'nama'      => 'Pemberhentian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.4',
            'nama'      => 'Recall',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.5',
            'nama'      => 'Meninggal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '161.6',
            'nama'      => 'Pelanggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '162',
            'nama'      => 'Persidangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '162.1',
            'nama'      => 'Reses',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '163',
            'nama'      => 'Kesejahteraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '163.1',
            'nama'      => 'Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '163.2',
            'nama'      => 'Penghargaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '164',
            'nama'      => 'Hak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '165',
            'nama'      => 'Sekretaris DPRD Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '166',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '167',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '168',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '169',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '170',
            'nama'      => 'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171',
            'nama'      => 'Keanggotaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171.1',
            'nama'      => 'Pencalonan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171.2',
            'nama'      => 'Pengangkatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171.3',
            'nama'      => 'Pemberhentian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171.4',
            'nama'      => 'Recall',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '171.5',
            'nama'      => 'Pelanggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '172',
            'nama'      => 'Persidangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '173',
            'nama'      => 'Kesejahteraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '173.1',
            'nama'      => 'Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '173.2',
            'nama'      => 'Penghargaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '174',
            'nama'      => 'Hak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '175',
            'nama'      => 'Sekretaris DPRD Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '176',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '177',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '178',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180',
            'nama'      => 'HUKUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180.1',
            'nama'      => 'Kontitusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180.11',
            'nama'      => 'Dasar Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180.12',
            'nama'      => 'Undang-Undang Dasar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180.2',
            'nama'      => 'GBHN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '180.3',
            'nama'      => 'Amnesti, Abolisi dan Grasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181',
            'nama'      => 'Perdata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.1',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.2',
            'nama'      => 'Rumah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.3',
            'nama'      => 'Utang/Piutang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.31',
            'nama'      => 'Gadai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.32',
            'nama'      => 'Hipotik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '181.4',
            'nama'      => 'Notariat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '182',
            'nama'      => 'Pidana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '182.1',
            'nama'      => 'Penyidik Pegawai Negeri Sipil (PPNS)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '183',
            'nama'      => 'Peradilan',
            'uraian'    => 'Peradilan Agama Islam 451.6, Peradilan Perkara Tanah 593.71'])
        ;
        KodeSurat::create([
            'kode'      => '183.1',
            'nama'      => 'Bantuan Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '184',
            'nama'      => 'Hukum Internasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185',
            'nama'      => 'Imigrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185.1',
            'nama'      => 'Visa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185.2',
            'nama'      => 'Pasport',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185.3',
            'nama'      => 'Exit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185.4',
            'nama'      => 'Reentry',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '185.5',
            'nama'      => 'Lintas Batas/Batas Antar Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '186',
            'nama'      => 'Kepenjaraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '187',
            'nama'      => 'Kejaksaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188',
            'nama'      => 'Peraturan Perundang-Undangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.1',
            'nama'      => 'TAP MPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.2',
            'nama'      => 'Undang-Undang Dasar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.3',
            'nama'      => 'Peraturan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.31',
            'nama'      => 'Peraturan Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.32',
            'nama'      => 'Peraturan Menteri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.33',
            'nama'      => 'Peraturan Lembaga Non Departemen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.34',
            'nama'      => 'Peraturan Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.341',
            'nama'      => 'Peraturan Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.342',
            'nama'      => 'Peraturan Kabupaten/Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.4',
            'nama'      => 'Keputusan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.41',
            'nama'      => 'Presiden',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.42',
            'nama'      => 'Menteri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.43',
            'nama'      => 'Lembaga Non Departemen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.44',
            'nama'      => 'Gubernur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.45',
            'nama'      => 'Bupati/Walikota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.5',
            'nama'      => 'Instruksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.51',
            'nama'      => 'Presiden',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.52',
            'nama'      => 'Menteri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.53',
            'nama'      => 'Lembaga Non Departemen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.54',
            'nama'      => 'Gubernur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '188.55',
            'nama'      => 'Bupati/Walikota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '189',
            'nama'      => 'Hukum Adat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '189.1',
            'nama'      => 'Tokoh Adat/Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '190',
            'nama'      => 'HUBUNGAN LUAR NEGERI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '191',
            'nama'      => 'Perwakilan Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '192',
            'nama'      => 'Tamu Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '193',
            'nama'      => 'Kerjasama Dengan Negara Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '193.1',
            'nama'      => 'Asean',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '193.2',
            'nama'      => 'Bantuan Luar Negeri/Hibah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '194',
            'nama'      => 'Perwakilan RI Di Luar Negeri/Hibah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '195',
            'nama'      => 'PBB',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '196',
            'nama'      => 'Laporan Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '197',
            'nama'      => 'Hutang Luar Negeri PHLN/LOAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '198',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '199',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '200',
            'nama'      => 'POLITIK',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '201',
            'nama'      => 'Kebijaksanaan umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '202',
            'nama'      => 'Orde baru',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '203',
            'nama'      => 'Reformasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '204',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '205',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '206',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '210',
            'nama'      => 'KEPARTAIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '211',
            'nama'      => 'Lambang partai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '212',
            'nama'      => 'Kartu tanda anggota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '213',
            'nama'      => 'Bantuan keuangan parpol',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '214',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '215',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '216',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '220',
            'nama'      => 'ORGANISASI KEMASYARAKATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '221',
            'nama'      => 'Berdasarkan perjuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '221.1',
            'nama'      => 'Perintis kemerdekaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '221.2',
            'nama'      => 'angkatan 45',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '221.3',
            'nama'      => 'Veteran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '222',
            'nama'      => 'Berdasarkan Kekaryaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '222.1',
            'nama'      => 'PEPABRI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '222.2',
            'nama'      => 'Wredatama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '223',
            'nama'      => 'Berdasarkan kerohanian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '224',
            'nama'      => 'Lembaga adat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '225',
            'nama'      => 'Lembaga Swadaya Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '226',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '230',
            'nama'      => 'ORGANISASI PROFESI DAN FUNGSIONAL',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '231',
            'nama'      => 'Ikatan Dokter Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '232',
            'nama'      => 'Persatuan Guru Republik Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '233',
            'nama'      => 'PERSATUAN SARJANA HUKUM INDONESIA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '234',
            'nama'      => 'Persatuan Advokat Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '235',
            'nama'      => 'Lembaga Bantuan Hukum Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '236',
            'nama'      => 'Korps Pegawai Republik Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '237',
            'nama'      => 'Persatuan Wartawan Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '238',
            'nama'      => 'Ikatan Cendikiawan Muslim Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '239',
            'nama'      => 'Organisasi Profesi Dan Fungsional Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '240',
            'nama'      => 'ORGANISASI PEMUDA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '241',
            'nama'      => 'Komite Nasional Pemuda Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '242',
            'nama'      => 'Organisasi Mahasiswa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '243',
            'nama'      => 'Organisasi Pelajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '244',
            'nama'      => 'Gerakan Pemuda Ansor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '245',
            'nama'      => 'Gerakan Pemuda Islam Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '246',
            'nama'      => 'Gerakan Pemuda Marhaenis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '247',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '248',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '250',
            'nama'      => 'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '251',
            'nama'      => 'Federasi Buruh Seluruh Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '252',
            'nama'      => 'Organisasi Buruh Internasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '253',
            'nama'      => 'Himpunan Kerukunan Tani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '254',
            'nama'      => 'Himpunan Nelayan Seluruh Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '255',
            'nama'      => 'Keluarga Sopir Proporsional Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '256',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '257',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '258',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '260',
            'nama'      => 'ORGANISASI WANITA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '261',
            'nama'      => 'Dharma Wanita',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '262',
            'nama'      => 'Persatuan Wanita Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '263',
            'nama'      => 'Pemberdayaan Perempuan (wanita)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '264',
            'nama'      => 'Kongres Wanita',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '265',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '266',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '267',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '268',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '269',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '270',
            'nama'      => 'PEMILIHAN UMUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '271',
            'nama'      => 'Pencalonan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '272',
            'nama'      => 'Nomor Urut Partai / Tanda Gambar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '273',
            'nama'      => 'Kampanye',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '274',
            'nama'      => 'Petugas Pemilu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '275',
            'nama'      => 'Pemilih / Daftar Pemilih',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276',
            'nama'      => 'Sarana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276.1',
            'nama'      => 'TPS',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276.2',
            'nama'      => 'Kendaraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276.3',
            'nama'      => 'Surat Suara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276.4',
            'nama'      => 'Kotak Suara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '276.5',
            'nama'      => 'Dana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '277',
            'nama'      => 'Pemungutan Suara / Perhitungan Suara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '278',
            'nama'      => 'Penetapan Hasil Pemilu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '279',
            'nama'      => 'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '280',
            'nama'      => 'Pengucapan Sumpah Janji MPR,DPR,DPD',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '281',
            'nama'      => '',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '282',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '283',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '284',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '300',
            'nama'      => 'KEAMANAN / KETERTIBAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '301',
            'nama'      => 'Keamanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '302',
            'nama'      => 'Ketertiban',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '303',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '310',
            'nama'      => 'PERTAHANAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '311',
            'nama'      => 'Darat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '312',
            'nama'      => 'Laut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '313',
            'nama'      => 'Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '314',
            'nama'      => 'Perbatasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '315',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '316',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '317',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '320',
            'nama'      => 'KEMILITERAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '321',
            'nama'      => 'Latihan Militer',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '322',
            'nama'      => 'Wajib Militer',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '323',
            'nama'      => 'Operasi Militer',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '324',
            'nama'      => 'Kekaryaan TNI Pejabat Sipil dari TNI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '324.1',
            'nama'      => 'TMD',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '325',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '326',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '327',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '328',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '330',
            'nama'      => 'KEAMANAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '331',
            'nama'      => 'Kepolisian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '331.1',
            'nama'      => 'Polisi Pamong Praja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '331.2',
            'nama'      => 'Kamra',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '331.3',
            'nama'      => 'Kamling',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '331.4',
            'nama'      => 'Jaga Wana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '332',
            'nama'      => 'Huru-Hara / Demonstrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '333',
            'nama'      => 'Senjata Api Tajam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '334',
            'nama'      => 'Bahan Peledak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '335',
            'nama'      => 'Perjudian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '336',
            'nama'      => 'Surat-Surat Kaleng',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '337',
            'nama'      => 'Pengaduan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '338',
            'nama'      => 'Himbauan / Larangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '339',
            'nama'      => 'Teroris',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '340',
            'nama'      => 'PERTAHANAN SIPIL',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '341',
            'nama'      => 'Perlindungan Sipil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '342',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '343',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '344',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '350',
            'nama'      => 'KEJAHATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '351',
            'nama'      => 'Makar / Pemberontak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '352',
            'nama'      => 'Pembunuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '353',
            'nama'      => 'Penganiayaan, Pencurian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '354',
            'nama'      => 'Subversi / Penyelundupan / Narkotika',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '355',
            'nama'      => 'Pemalsuan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '356',
            'nama'      => 'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '357',
            'nama'      => 'Pemerkosaan / Perbuatan Cabul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '358',
            'nama'      => 'Kenakalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '359',
            'nama'      => 'Kejahatan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '360',
            'nama'      => 'BENCANA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '361',
            'nama'      => 'Gunung Berapi / Gempa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '362',
            'nama'      => 'Banjir / Tanah Longsor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '363',
            'nama'      => 'Angin Topan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '364',
            'nama'      => 'Kebakaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '364.1',
            'nama'      => 'Pemadam Kebakaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '365',
            'nama'      => 'Kekeringan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '366',
            'nama'      => 'Tsunami',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '367',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '368',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '370',
            'nama'      => 'KECELAKAAN / SAR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '371',
            'nama'      => 'Darat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '372',
            'nama'      => 'Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '373',
            'nama'      => 'Laut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '374',
            'nama'      => 'Sungai / Danau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '375',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '376',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '377',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '380',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '381',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '382',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '383',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '390',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '391',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '392',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '393',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '400',
            'nama'      => 'KESEJAHTERAAN RAKYAT',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '401',
            'nama'      => 'Keluarga Miskin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '402',
            'nama'      => 'PNPM Mandiri Pedesaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '403',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '404',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '410',
            'nama'      => 'PEMBANGUNAN DESA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411',
            'nama'      => 'Pembinaan Usaha Gotong Royong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.1',
            'nama'      => 'Swadaya Gotong Royong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.11',
            'nama'      => 'Penataan Gotong Royong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.12',
            'nama'      => 'Gotong Royong Dinamis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.13',
            'nama'      => 'Gotong Royong Statis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.14',
            'nama'      => 'Pungutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.2',
            'nama'      => 'Lembaga Sosial Desa (LSD)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.21',
            'nama'      => 'Pembinaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.22',
            'nama'      => 'Klasifikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.23',
            'nama'      => 'Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.24',
            'nama'      => 'Musyawarah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.3',
            'nama'      => 'Latihan Kerja Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.31',
            'nama'      => 'Kader Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.32',
            'nama'      => 'Kuliah Kerja Nyata (KKN)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.33',
            'nama'      => 'Pusat Latihan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.34',
            'nama'      => 'Kursus-Kursus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.35',
            'nama'      => 'Kurikulum / Sylabus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.36',
            'nama'      => 'Ketrampilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.37',
            'nama'      => 'Pramuka',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.4',
            'nama'      => 'Pembinaan Kesejahteraan Keluarga (PKK)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.41',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.42',
            'nama'      => 'Pembinaan Organisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.43',
            'nama'      => 'Kegiatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.5',
            'nama'      => 'Penyuluhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.51',
            'nama'      => 'Publikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.52',
            'nama'      => 'Peragaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.53',
            'nama'      => 'Sosio Drama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.54',
            'nama'      => 'Siaran Pedesaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.55',
            'nama'      => 'Penyuluhan Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.6',
            'nama'      => 'Kelembagaan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.61',
            'nama'      => 'Kelompok Tani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.62',
            'nama'      => 'Rukun Tani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.63',
            'nama'      => 'Subak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '411.64',
            'nama'      => 'Dharma Tirta',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412',
            'nama'      => 'Perekonomian Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.1',
            'nama'      => 'Produksi Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.11',
            'nama'      => 'Pengolahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.12',
            'nama'      => 'Pemasaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.2',
            'nama'      => 'Keuangan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.21',
            'nama'      => 'Perkreditan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.22',
            'nama'      => 'Inventarisasi Data',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.23',
            'nama'      => 'Perkembangan / Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.24',
            'nama'      => 'Bantuan / Stimulans',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.25',
            'nama'      => 'Petunjuk / Pembinaan Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.3',
            'nama'      => 'Koperasi Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.31',
            'nama'      => 'Badan Usaha Unit Desa (BUUD)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.32',
            'nama'      => 'Koperasi Usaha Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.4',
            'nama'      => 'Penataan Bantuan Pembangunan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.41',
            'nama'      => 'Jumlah Desa Yang Diberi Bantuan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.42',
            'nama'      => 'Pengarahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.43',
            'nama'      => 'Pusat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.44',
            'nama'      => 'Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.5',
            'nama'      => 'Alokasi Bantuan Pembangunan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.51',
            'nama'      => 'Pusat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.52',
            'nama'      => 'Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.6',
            'nama'      => 'Pelaksanaan Bantuan Pembangunan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.61',
            'nama'      => 'Bantuan Langsung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.62',
            'nama'      => 'Bantuan Keserasian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '412.63',
            'nama'      => 'Bantuan Juara Lomba Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413',
            'nama'      => 'Prasarana Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.1',
            'nama'      => 'Prasarana Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.11',
            'nama'      => 'Pembinaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.12',
            'nama'      => 'Bimbingan Teknis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.2',
            'nama'      => 'Pemukiman Kembali Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.21',
            'nama'      => 'Lokasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.22',
            'nama'      => 'Diskusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.23',
            'nama'      => 'Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.3',
            'nama'      => 'Masyarakat Pradesa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.31',
            'nama'      => 'Pembinaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.32',
            'nama'      => 'Penyuluhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.4',
            'nama'      => 'Pemugaran Perumahan Dan Lingkungan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.41',
            'nama'      => 'Rumah Sehat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.42',
            'nama'      => 'Proyek Perintis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.43',
            'nama'      => 'Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.44',
            'nama'      => 'Pengembangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '413.45',
            'nama'      => 'Perbaikan Kampung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414',
            'nama'      => 'Pengembangan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.1',
            'nama'      => 'Tingkat Perkembangan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.11',
            'nama'      => 'Jumlah Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.12',
            'nama'      => 'Pemekaran Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.13',
            'nama'      => 'Pembentukan Desa Baru',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.14',
            'nama'      => 'Evaluasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.15',
            'nama'      => 'Bagan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.2',
            'nama'      => 'Unit Desa Kerja Pembangunan (UDKP)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.21',
            'nama'      => 'Penyuluhan Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.22',
            'nama'      => 'Lokasi UDKP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.23',
            'nama'      => 'Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.24',
            'nama'      => 'Bimbingan/Pembinaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.25',
            'nama'      => 'Evaluasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.3',
            'nama'      => 'Tata Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.31',
            'nama'      => 'Inventarisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.32',
            'nama'      => 'Penyusunan Pola Tata Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.33',
            'nama'      => 'Aplikasi Tata Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.34',
            'nama'      => 'Pemetaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.35',
            'nama'      => 'Pedoman Pelaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.36',
            'nama'      => 'Evaluasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.4',
            'nama'      => 'Perlombaan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.41',
            'nama'      => 'Pedoman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.42',
            'nama'      => 'Penilaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.43',
            'nama'      => 'Kejuaraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '414.44',
            'nama'      => 'Piagam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415',
            'nama'      => 'Koordinasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.1',
            'nama'      => 'Sektor Khusus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.2',
            'nama'      => 'Rapat Koordinasi Horizontal (RKH)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.3',
            'nama'      => 'Tim Koordinasi Pusat (TKP)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.4',
            'nama'      => 'Kerjasama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.41',
            'nama'      => 'Luar Negeri (UNICEF)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.42',
            'nama'      => 'Perguruan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '415.43',
            'nama'      => 'Kementerian / Lembaga Non Kementerian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '416',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '417',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '418',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '420',
            'nama'      => 'PENDIDIKAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '420.1',
            'nama'      => 'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421',
            'nama'      => 'Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.1',
            'nama'      => 'Pra Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.2',
            'nama'      => 'Sekolah Dasar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.3',
            'nama'      => 'Sekolah Menengah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.4',
            'nama'      => 'Sekolah Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.5',
            'nama'      => 'Sekolah Kejuruan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.6',
            'nama'      => 'Kegiatan Sekolah, Dies Natalis Lustrum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.7',
            'nama'      => 'Kegiatan Pelajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.71',
            'nama'      => 'Reuni Darmawisata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.72',
            'nama'      => 'Pelajar Teladan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.73',
            'nama'      => 'Resimen Mahasiswa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.8',
            'nama'      => 'Sekolah Pendidikan Luar Biasa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '421.9',
            'nama'      => 'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '422',
            'nama'      => 'Administrasi Sekolah',
            'uraian'    => 'Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran,']
    );
        KodeSurat::create([
            'kode'      => '422.1',
            'nama'      => 'Mapras, Perpeloncoan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '422.2',
            'nama'      => 'Tahun Pelajaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '422.3',
            'nama'      => 'Hari Libur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '422.4',
            'nama'      => 'Uang Sekolah, Klasifikasi Disini SPP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '422.5',
            'nama'      => 'Beasiswa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423',
            'nama'      => 'Metode Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.1',
            'nama'      => 'Kuliah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.2',
            'nama'      => 'Ceramah, Simposium',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.3',
            'nama'      => 'Diskusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.4',
            'nama'      => 'Kuliah Lapangan, Widyawisata, KKN, Studi Tur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.5',
            'nama'      => 'Kurikulum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.6',
            'nama'      => 'Karya Tulis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '423.7',
            'nama'      => 'Ujian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '424',
            'nama'      => 'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor',
            'uraian'    => 'Klasifikasi Disini: Guru Teladan'])
        ;
        KodeSurat::create([
            'kode'      => '425',
            'nama'      => 'Sarana Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.1',
            'nama'      => 'Gedung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.11',
            'nama'      => 'Gedung Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.12',
            'nama'      => 'Kampus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.13',
            'nama'      => 'Pusat Kegiatan Mahasiswa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.2',
            'nama'      => 'Buku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '425.3',
            'nama'      => 'Perlengkapan Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426',
            'nama'      => 'Keolahragaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.1',
            'nama'      => 'Cabang Olah Raga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.2',
            'nama'      => 'Sarana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.21',
            'nama'      => 'Gedung Olah Raga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.22',
            'nama'      => 'Stadion',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.23',
            'nama'      => 'Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.24',
            'nama'      => 'Kolam renang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '426.3',
            'nama'      => 'Pesta Olah Raga',
            'nama'      =>  'Klasifikasi Disini: PON, Porsade, Olimpiade, dsb']
        );
        KodeSurat::create([
            'kode'      => '426.4',
            'nama'      => 'KONI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '427',
            'nama'      => 'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja',
            'uraian'    => 'Klasifikasi Disini: Gelanggang Remaja'])
        ;
        KodeSurat::create([
            'kode'      => '428',
            'nama'      => 'Kepramukaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '429',
            'nama'      => 'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '430',
            'nama'      => 'KEBUDAYAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '431',
            'nama'      => 'Kesenian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '431.1',
            'nama'      => 'Cabang Kesenian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '431.2',
            'nama'      => 'Sarana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '431.21',
            'nama'      => 'Gedung Kesenian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '432',
            'nama'      => 'Kepurbakalaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '432.1',
            'nama'      => 'Museum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '432.2',
            'nama'      => 'Peninggalan Kuno',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '432.21',
            'nama'      => 'Candi Termasuk Pemugaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '432.22',
            'nama'      => 'Benda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '433',
            'nama'      => 'Sejarah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '434',
            'nama'      => 'Bahasa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '435',
            'nama'      => 'Usaha Pertunjukan, Hiburan, Kesenangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '436',
            'nama'      => 'Kepercayaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '437',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '438',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '439',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '440',
            'nama'      => 'KESEHATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441',
            'nama'      => 'Pembinaan Kesehatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.1',
            'nama'      => 'Gizi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.2',
            'nama'      => 'Mata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.3',
            'nama'      => 'Jiwa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.4',
            'nama'      => 'Kanker',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.5',
            'nama'      => 'Usaha Kegiatan Sekolah (UKS)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.6',
            'nama'      => 'Perawatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.7',
            'nama'      => 'Penyuluhan Kesehatan Masyarakat (PKM)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '441.8',
            'nama'      => 'Pekan Imunisasi Nasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '442',
            'nama'      => 'Obat-obatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '442.1',
            'nama'      => 'Pengadaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '442.2',
            'nama'      => 'Penyimpanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443',
            'nama'      => 'Penyakit Menular',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.1',
            'nama'      => 'Pencegahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.2',
            'nama'      => 'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.21',
            'nama'      => 'Kusta',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.22',
            'nama'      => 'Kelamin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.23',
            'nama'      => 'Frambosia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.24',
            'nama'      => 'TBC / AIDS / HIV',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.3',
            'nama'      => 'Epidemiologi dan Karantina (Epidka)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.31',
            'nama'      => 'Kholera',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.32',
            'nama'      => 'Imunisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.33',
            'nama'      => 'Survailense',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.34',
            'nama'      => 'Rabies (Anjing Gila) Antraks',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.4',
            'nama'      => 'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.41',
            'nama'      => 'Malaria',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.42',
            'nama'      => 'Dengue Faemorrhagic Fever (Demam Berdarah HDF)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.43',
            'nama'      => 'Filaria',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.44',
            'nama'      => 'Serangga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.5',
            'nama'      => 'Hygiene Sanitasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.51',
            'nama'      => 'Tempat-tempat Pembuatan Dan Penjualan Makanan dan Minuman (TPPMM)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.52',
            'nama'      => 'Sarana Air Minum Dan Jamban Keluarga (Samijaga)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '443.53',
            'nama'      => 'Pestisida',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444',
            'nama'      => 'Gizi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444.1',
            'nama'      => ' Kekurangan Makanan Bahaya Kelaparan, Busung Lapar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444.2',
            'nama'      => 'Keracunan Makanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444.3',
            'nama'      => 'Menu Makanan Rakyat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444.4',
            'nama'      => 'Badan Perbaikan Gizi Daerah (BPGD)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '444.5',
            'nama'      => 'Program Makanan Tambahn Anak Sekolah (PMT-AS)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '445',
            'nama'      => 'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS, Keliling, Poliklinik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '446',
            'nama'      => 'Tenaga Medis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '448',
            'nama'      => 'Pengobatan Tadisional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '448.1',
            'nama'      => 'Pijat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '448.2',
            'nama'      => 'Tusuk Jarum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '448.3',
            'nama'      => 'Jamu Tradisional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '448.4',
            'nama'      => 'Dukun / Paranormal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '450',
            'nama'      => 'AGAMA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451',
            'nama'      => 'Islam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.1',
            'nama'      => 'Peribadatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.11',
            'nama'      => 'Sholat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.12',
            'nama'      => 'Zakat Fitrah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.13',
            'nama'      => 'Puasa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.14',
            'nama'      => 'MTQ',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.2',
            'nama'      => 'Rumah Ibadah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.3',
            'nama'      => 'Tokoh Agama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.4',
            'nama'      => 'Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.41',
            'nama'      => 'Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.42',
            'nama'      => 'Menengah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.43',
            'nama'      => 'Dasar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.44',
            'nama'      => 'Pondok Pesantren',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.45',
            'nama'      => 'Gedung Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.46',
            'nama'      => 'Tenaga Pengajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.47',
            'nama'      => 'Buku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.48',
            'nama'      => 'Dakwah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.49',
            'nama'      => 'Organisasi / Lembaga Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.5',
            'nama'      => 'Harta Agama Wakaf, Baitulmal, dsb',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.6',
            'nama'      => 'Peradilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.7',
            'nama'      => 'Organisasi Keagamaan Bukan Politik Majelis Ulama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '451.8',
            'nama'      => 'Mazhab',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452',
            'nama'      => 'Protestan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452.1',
            'nama'      => 'Peribadatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452.2',
            'nama'      => 'Rumah Ibadah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452.3',
            'nama'      => 'Tokoh Agama, Rohaniawan, Pendeta, Domine',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452.4',
            'nama'      => 'Mazhab',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '452.5',
            'nama'      => 'Organisasi Gerejani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453',
            'nama'      => 'Katolik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453.1',
            'nama'      => 'Peribadatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453.2',
            'nama'      => 'Rumah Ibadah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453.3',
            'nama'      => 'Tokoh Agama, Rohaniawan, Pendeta, Pastor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453.4',
            'nama'      => 'Mazhab',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '453.5',
            'nama'      => 'Organisasi Gerejani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454',
            'nama'      => 'Hindu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454.1',
            'nama'      => 'Peribadatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454.2',
            'nama'      => 'Rumah Ibadah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454.3',
            'nama'      => 'Tokoh Agama, Rohaniawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454.4',
            'nama'      => 'Mazhab',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '454.5',
            'nama'      => 'Organisasi Keagamaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455',
            'nama'      => 'Budha',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455.1',
            'nama'      => 'Peribadatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455.2',
            'nama'      => 'Rumah Ibadah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455.3',
            'nama'      => 'Tokoh Agama, Rohaniawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455.4',
            'nama'      => 'Mazhab',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '455.5',
            'nama'      => 'Organisasi Keagamaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '456',
            'nama'      => 'Urusan Haji',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '456.1',
            'nama'      => 'ONH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '456.2',
            'nama'      => 'Manasik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '457',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '458',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '458',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '460',
            'nama'      => 'SOSIAL',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '461',
            'nama'      => 'Rehabilitasi Penderita Cacat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '461.1',
            'nama'      => 'Cacat Maat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '461.2',
            'nama'      => 'Cacat Tubuh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '461.3',
            'nama'      => 'Cacat Mental',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '461.4',
            'nama'      => 'Bisul/Tuli',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '462',
            'nama'      => 'Tuna Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '462.1',
            'nama'      => 'Gelandangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '462.2',
            'nama'      => 'Pengemis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '462.3',
            'nama'      => 'Tuna Susila',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '462.4',
            'nama'      => 'Anak Nakal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '463',
            'nama'      => 'Kesejahteraan Anak / Keluarga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '463.1',
            'nama'      => 'Anak Putus Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '463.2',
            'nama'      => 'Ibu Teladan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '463.3',
            'nama'      => 'Anak Asuh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '464',
            'nama'      => 'Pembinaan Pahlawan',
            'uraian'    => 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan,']
    );
        KodeSurat::create([
            'kode'      => '464.1',
            'nama'      => 'Tunjangan Kepada Pahlawan Dan Jandanya',
            'uraian'    => 'Perintis Kemerdekaan Meliputi: Pembinaan, Penghargaan'])
        ;
        KodeSurat::create([
            'kode'      => '464.2',
            'nama'      => 'Dan Tunjangan Kepada Perintis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '464.3',
            'nama'      => 'Cacat Veteran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '465',
            'nama'      => 'Kesejahteraan Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '465.1',
            'nama'      => 'Lanjut Usia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '465.2',
            'nama'      => 'Korban Kekacauan, Pengungsi, Repatriasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466',
            'nama'      => 'Sumbangan Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466.1',
            'nama'      => 'Korban Bencana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466.2',
            'nama'      => 'Pencarian Dana Untuk Sumbangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466.3',
            'nama'      => 'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466.4',
            'nama'      => 'Panti Asuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '466.5',
            'nama'      => 'Panti Jompo',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '467',
            'nama'      => ' Bimbingan Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '467.1',
            'nama'      => 'Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '468',
            'nama'      => 'PMI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '469',
            'nama'      => 'Makam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '469.1',
            'nama'      => 'Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '469.2',
            'nama'      => 'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kpd Pahlawan Dan Jandanya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '469.3',
            'nama'      => 'Khusus Keluarga Raja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '469.4',
            'nama'      => 'Krematorium',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '470',
            'nama'      => 'KEPENDUDUKAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471',
            'nama'      => 'Pendaftaran Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.1',
            'nama'      => 'Identitas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.11',
            'nama'      => 'Biodata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.12',
            'nama'      => 'Nomor Induk Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.13',
            'nama'      => 'Kartu Tanda Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.14',
            'nama'      => 'Kartu Keluarga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.15',
            'nama'      => 'Advokasi Indentitas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.2',
            'nama'      => 'Perpindahan Penduduk Dalam Wilayah Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.21',
            'nama'      => 'Perpindahan Penduduk WNI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.22',
            'nama'      => 'Perpindahan Penduduk WNA Dalam Wilayah Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.23',
            'nama'      => 'Perpindahan Penduduk WNA dan WNI Tinggal Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.24',
            'nama'      => 'Daerah Terbelakan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.25',
            'nama'      => 'Bedol Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.3',
            'nama'      => 'Perpindahan Penduduk Antar Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.31',
            'nama'      => 'Penduduk Indonesia Ke Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.32',
            'nama'      => 'Orang Asing Tinggal Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.33',
            'nama'      => 'Orang Asing Tinggal Tetap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.34',
            'nama'      => 'Perpindahan Penduduk Antar Negara Di Wilayah Pembatasan Antar Negara (Pelintas Batas Tradisional)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.4',
            'nama'      => 'Pendaftaran Pengungsi Dan Penduduk Rentan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.41',
            'nama'      => 'Akibat Bencana Alam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.42',
            'nama'      => 'Akibat Kerusuhan Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.43',
            'nama'      => 'Pendaftaran Penduduk Daerah Terbelakang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '471.44',
            'nama'      => 'Pendaftaran Penduduk Rentan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472',
            'nama'      => 'Pencatatan Sipil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.1',
            'nama'      => 'Kelahiran, Kematian Dan Advokasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.11',
            'nama'      => 'Kelahiran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.12',
            'nama'      => 'Kematian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.13',
            'nama'      => 'Advokasi Kelahiran Dan Kematian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.2',
            'nama'      => 'Perkawinan, Peceraian Dan Advokasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.3',
            'nama'      => 'Perkawinan Agama Islam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.4',
            'nama'      => 'Perkawinan Agama Non Islam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.5',
            'nama'      => 'Perceraian Agama Islam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.6',
            'nama'      => 'Perceraian Agama Non Islam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.7',
            'nama'      => 'Advokasi Perkawinan Dan Perceraian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.3',
            'nama'      => 'Pengangkatan, Pengakuan, Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta Dan Advokasi Pengangkatan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.31',
            'nama'      => 'Pengangkatan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.32',
            'nama'      => 'Pengakuan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.33',
            'nama'      => 'Pengesahan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.34',
            'nama'      => 'Perubahan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.35',
            'nama'      => 'Pembatalan Anak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.36',
            'nama'      => 'Advokasi Pengurusan Pengangkatan, Pengakuan Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.4',
            'nama'      => 'Pencatatan Kewarganegaraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.41',
            'nama'      => 'Akibat Perkawinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.42',
            'nama'      => 'Akibat Kelahiran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.43',
            'nama'      => 'Non Perkawinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.44',
            'nama'      => 'Non Kelahiran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '472.45',
            'nama'      => 'Perubahan WNI ke WNA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473',
            'nama'      => 'Informasi Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.1',
            'nama'      => 'Teknologi Informasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.11',
            'nama'      => 'Perangkat Keras',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.12',
            'nama'      => 'Perangkat Lunak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.13',
            'nama'      => 'Jaringan Komunikasi Data',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.2',
            'nama'      => 'Kelembagaan Dan Sumber Daya Informasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.21',
            'nama'      => 'Daerah Maju',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.22',
            'nama'      => 'Daerah Berkembang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.23',
            'nama'      => 'Daerah Terbelakang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.3',
            'nama'      => 'Pengolahan Data Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.31',
            'nama'      => 'Pendaftaran Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.32',
            'nama'      => 'Kejadian Vital Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.33',
            'nama'      => 'Penduduk Non Registrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.4',
            'nama'      => 'Pelayanan Informasi Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.41',
            'nama'      => 'Media Elektronik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.42',
            'nama'      => 'Media Cetak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '473.43',
            'nama'      => 'Outlet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474',
            'nama'      => 'Perkembangan Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.1',
            'nama'      => 'Pengarahan Kuantitas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.11',
            'nama'      => 'Struktur Jumlah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.12',
            'nama'      => 'Komposisi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.13',
            'nama'      => 'Fertilitas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.14',
            'nama'      => 'Kesehatan Reproduksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.15',
            'nama'      => 'Morbiditas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.16',
            'nama'      => 'Mortalitas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.2',
            'nama'      => 'Pengembangan Kuantitas Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.21',
            'nama'      => 'Anak dan Remaja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.22',
            'nama'      => 'Penduduk Usia Produktif',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.23',
            'nama'      => 'Penduduk Lanjut Usia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.24',
            'nama'      => 'Gender',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.3',
            'nama'      => 'Penataan Persebaran Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.31',
            'nama'      => 'Migrasi Antar Wilayah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.32',
            'nama'      => 'Migrasi Internasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.33',
            'nama'      => 'Urbanisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.34',
            'nama'      => 'Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.35',
            'nama'      => 'Migrasi Non Permanen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.4',
            'nama'      => 'Perlindungan Pemberdayaan Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.41',
            'nama'      => 'Pengembangan Sistem Pelindungan Penduduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.42',
            'nama'      => 'Pelayanan Kelembagaan Ekonomi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.43',
            'nama'      => 'Pelayanan Kelembagaan Sosial Budaya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.44',
            'nama'      => 'Partisipasi Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.5',
            'nama'      => 'Pengembangan Wawasan Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.51',
            'nama'      => 'Pendidikan Jalur Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.52',
            'nama'      => 'Pendidikan Jalur Luar Sekolah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.53',
            'nama'      => 'Pendidikan Jalur Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '474.54',
            'nama'      => 'Pembangunan Berwawasan Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475',
            'nama'      => 'Proyeksi Dan Penyerasian Kebijakan Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.1',
            'nama'      => 'Indikator Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.11',
            'nama'      => 'Perumusan Penetapan Dan Pengembangan Indikator Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.12',
            'nama'      => 'Pemanfaatan Indikator Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.13',
            'nama'      => 'Sosialisasi Indikator Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.2',
            'nama'      => 'Proyeksi Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.21',
            'nama'      => 'Penyusunan Dan Pengembangan Proyeksi Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.22',
            'nama'      => 'Pemanfaatan Proyeksi Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.3',
            'nama'      => 'Analisis Dampak Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.31',
            'nama'      => 'Penyusunan Dan Pengembangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.32',
            'nama'      => 'Pemanfaatan Analisis Dampak Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.4',
            'nama'      => 'Penyerasian Kebijakan Lembaga Non Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.41',
            'nama'      => 'Lembaga Internasioanal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.42',
            'nama'      => 'Lembaga Masyarakat Dan Nirlaba',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.43',
            'nama'      => 'Lembaga Usaha Swasta',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.5',
            'nama'      => 'Penyerasian Kebijakan Lembaga Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.51',
            'nama'      => 'Lembaga Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.52',
            'nama'      => 'Pemerintah Provinsidan Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.53',
            'nama'      => 'Pemerintah Kabupaten',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '475.6',
            'nama'      => 'Analisis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '476',
            'nama'      => 'Monitoring',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '477',
            'nama'      => 'Evaluasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '478',
            'nama'      => 'Dokumentasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '479',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '480',
            'nama'      => 'MEDIA MASSA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '481',
            'nama'      => 'Penerbitan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '481.1',
            'nama'      => 'Surat Kabar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '481.2',
            'nama'      => 'Majalah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '481.3',
            'nama'      => 'Buku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '481.4',
            'nama'      => 'Penerjemahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '482',
            'nama'      => 'Radio',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '482.1',
            'nama'      => 'RRI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '482.11',
            'nama'      => 'Siaran Pedesaan Jgn Diklasifikasikan Disini',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '482.2',
            'nama'      => 'Non RRI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '482.3',
            'nama'      => 'Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '483',
            'nama'      => 'Televisi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '484',
            'nama'      => 'Film',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '485',
            'nama'      => 'Pers',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '485.1',
            'nama'      => 'Kewartawanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '485.2',
            'nama'      => 'Wawancara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '485.3',
            'nama'      => 'Informasi Nasional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '486',
            'nama'      => 'Grafika',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '487',
            'nama'      => 'Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '487.1',
            'nama'      => 'Pameran Non Komersil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '488',
            'nama'      => 'Operation Room',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '489',
            'nama'      => 'Hubungan Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '490',
            'nama'      => 'Pengaduan Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '491',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '492',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '500',
            'nama'      => 'PEREKONOMIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '500.1',
            'nama'      => 'Dewan Stabilisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '501',
            'nama'      => 'Pengadaan Pangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '502',
            'nama'      => 'Pengadaan Sandang Perizinan Pada Umumnya Untuk Perizinan Suatu Bidang,',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '503',
            'nama'      => 'Kalsifikasikan Masalahnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '504',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '505',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '506',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510',
            'nama'      => 'PERDAGANGAN',
            'uraian'    => 'Klasifikasikan Disini: Tata Niaga'])
        ;
        KodeSurat::create([
            'kode'      => '510.1',
            'nama'      => 'Promosi Perdagangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510.11',
            'nama'      => 'Pekan Raya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510.12',
            'nama'      => 'Iklan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510.13',
            'nama'      => 'Pameran Non Komersil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510.2',
            'nama'      => 'Pelelangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '510.3',
            'nama'      => 'Tera',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '511',
            'nama'      => 'Pemasaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '511.1',
            'nama'      => 'Sembilan Bahan Pokok, Tambahkan Kode Wilayah : Beras, Garam, Tanah, Minyak Goreng',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '511.2',
            'nama'      => 'Pasar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '511.3',
            'nama'      => 'Pertokoan, Kaki Lima, Kios',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '512',
            'nama'      => 'Ekspor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '513',
            'nama'      => 'Impor',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '514',
            'nama'      => 'Perdagangan Antar Pulau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '515',
            'nama'      => 'Perdagangan Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '516',
            'nama'      => 'Pergudangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '517',
            'nama'      => 'Aneka Usaha Perdagangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '518',
            'nama'      => 'Koperasi untuk BUUD, KUD lihat ( 412.31-412.32)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '519',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '520',
            'nama'      => 'PERTANIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521',
            'nama'      => 'Tanaman Pangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.1',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.11',
            'nama'      => 'Bimas / Inmas Termasuk Kredit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.12',
            'nama'      => 'Penyuluhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.2',
            'nama'      => 'Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.21',
            'nama'      => 'Padi / Panen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.22',
            'nama'      => 'Palawija',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.23',
            'nama'      => 'Jagung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.24',
            'nama'      => 'Ketela Pohon / Ubi-Ubian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.25',
            'nama'      => 'Hortikultura',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.26',
            'nama'      => 'Sayuran / Buah-Buahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.27',
            'nama'      => 'Tanaman Hias',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.28',
            'nama'      => 'Pembudidayaan Rumput Laut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.3',
            'nama'      => 'Saran Usaha Pertanian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.31',
            'nama'      => 'Peralatan Meliputi: Traktor Dan Peralatan Lainya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.32',
            'nama'      => 'Pembibitan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.33',
            'nama'      => 'Pupuk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.4',
            'nama'      => 'Perlindungan Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.41',
            'nama'      => 'Penyakit, Penyakit Daun, Penyakit Batang Hama, Serangga, Wereng, Walang Sangit, Tungru, Tikus Dan Sejenisnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.42',
            'nama'      => 'Pemberantasan Hama Meliputi: Penyemprotan, Penyiangan, Geropyokan, Sparayer,',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.43',
            'nama'      => 'Pemberantasan Melalui Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.44',
            'nama'      => 'Pestisida',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.5',
            'nama'      => 'Tanah Pertanian Pangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.51',
            'nama'      => 'Persawahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.52',
            'nama'      => 'Perladangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.53',
            'nama'      => 'Kebun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.54',
            'nama'      => 'Rumpun Ikan Laut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.55',
            'nama'      => 'KTA/Lahan Kritis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.6',
            'nama'      => 'Pengusaha Petani',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.7',
            'nama'      => 'Bina Usaha',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.71',
            'nama'      => 'Pasca Panen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '521.72',
            'nama'      => 'Pemasaran Hasil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522',
            'nama'      => 'Kehutanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.1',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.11',
            'nama'      => 'Hak Pengusahaan Hutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.12',
            'nama'      => 'Tata Guna Hutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.13',
            'nama'      => 'Perpetaan Hutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.14',
            'nama'      => 'Tumpangsari',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.2',
            'nama'      => 'Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.21',
            'nama'      => 'Kayu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.22',
            'nama'      => 'Non Kayu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.3',
            'nama'      => 'Sarana  Usaha  Kehutanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.4',
            'nama'      => 'Penghijauan, Reboisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.5',
            'nama'      => 'Kelestarian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.51',
            'nama'      => 'Cagar Alam, Marga Satwa, Suaka Marga Satwa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.52',
            'nama'      => 'Berburu Meliputi Larangan Dan Ijin Berburu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.53',
            'nama'      => 'Kebun Binatang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.54',
            'nama'      => 'Konservasi Lahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.6',
            'nama'      => 'Penyakit/Hama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.7',
            'nama'      => 'Jenis-jenis Hutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.71',
            'nama'      => 'Hutan Hidup',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.72',
            'nama'      => 'Hutan Wisata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.73',
            'nama'      => 'Hutan Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '522.74',
            'nama'      => 'Hutan Lindung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523',
            'nama'      => 'Perikanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.1',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.11',
            'nama'      => 'Penyuluhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.12',
            'nama'      => 'Teknologi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.2',
            'nama'      => 'Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.21',
            'nama'      => 'Pelelangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.3',
            'nama'      => 'Usaha Perikanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.31',
            'nama'      => 'Pembibitan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.32',
            'nama'      => 'Daerah Penagkapan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.33',
            'nama'      => 'Pertambakan Meliputi: ( Tambak Ikan Air Deras, Tambak Udang dll )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.34',
            'nama'      => 'Jaring Terapung',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.4',
            'nama'      => 'Sarana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.41',
            'nama'      => 'Peralatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.42',
            'nama'      => 'Kapal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.43',
            'nama'      => 'Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.5',
            'nama'      => 'Pengusaha',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '523.6',
            'nama'      => 'Nelayan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524',
            'nama'      => 'Peternakan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.1',
            'nama'      => 'Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.11',
            'nama'      => 'Susu Ternak Rakyat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.12',
            'nama'      => 'Telur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.13',
            'nama'      => 'Daging',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.14',
            'nama'      => 'Kulit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.2',
            'nama'      => 'Sarana Usaha Ternak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.21',
            'nama'      => 'Pembibitan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.22',
            'nama'      => 'Kandang Ternak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.3',
            'nama'      => 'Kesehatan Hewan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.31',
            'nama'      => 'Penyakit Hewan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.32',
            'nama'      => 'Pos Kesehatan Hewan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.33',
            'nama'      => 'Tesi Pullorum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.34',
            'nama'      => 'Karantina',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.35',
            'nama'      => 'Pemberantasan Penyakit Hewan Termasuk Usaha Pencegahannya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.4',
            'nama'      => 'Perunggasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.5',
            'nama'      => 'Pengembangan Ternak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.51',
            'nama'      => 'Inseminasi Buatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.52',
            'nama'      => 'Pembibitan / Bibit Unggul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.53',
            'nama'      => 'Penyebaran Ternak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.6',
            'nama'      => 'Makanan Ternak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.7',
            'nama'      => 'Tempat Pemotongan Hewan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '524.8',
            'nama'      => 'Data Peternakan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525',
            'nama'      => 'Perkebunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.1',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.2',
            'nama'      => 'Produksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.21',
            'nama'      => 'Karet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.22',
            'nama'      => 'The',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.23',
            'nama'      => 'Tembakau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.24',
            'nama'      => 'Tebu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.25',
            'nama'      => 'Cengkeh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.26',
            'nama'      => 'Kopra',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.27',
            'nama'      => 'Kopi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.28',
            'nama'      => 'Coklat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '525.29',
            'nama'      => 'Aneka Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '526',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '527',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '528',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '530',
            'nama'      => 'PERINDUSTRIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '530.08',
            'nama'      => 'Undang-Undang Gangguan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '531',
            'nama'      => 'Industri Logam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '532',
            'nama'      => 'Industri Mesin/Elektronik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '533',
            'nama'      => 'Industri Kimia/Farmasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '534',
            'nama'      => 'Industri Tekstil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '535',
            'nama'      => 'Industri Makanan / Minuman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '536',
            'nama'      => 'Aneka Industri / Perusahaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '537',
            'nama'      => 'Aneka Kerajinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '538',
            'nama'      => 'Usaha Negara / BUMN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '538.1',
            'nama'      => 'Perjan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '538.2',
            'nama'      => 'Perum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '538.3',
            'nama'      => 'Persero / PT, CV',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '539',
            'nama'      => 'Perusahaan Daerah / BUMD/BULD',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '540',
            'nama'      => 'PERTAMBANGAN / KESAMUDRAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '541',
            'nama'      => 'Minyak Bumi / Bensin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '541.1',
            'nama'      => 'Pengusahaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '542',
            'nama'      => 'Gas bumi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '542.1',
            'nama'      => 'Eksploitasi / Pengeboran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '542.11',
            'nama'      => 'Kontrak Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '542.2',
            'nama'      => 'Penogolahan,',
            'uraian'    => 'Meliputi :Tangki, Pompa, Tanker'])
        ;
        KodeSurat::create([
            'kode'      => '543',
            'nama'      => 'Aneka Tambang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '543.1',
            'nama'      => 'Timah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '543.2',
            'nama'      => 'Alumunium, Boxit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '543.3',
            'nama'      => 'Besi Termasuk Besi Tua',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '543.4',
            'nama'      => 'Tembaga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '543.5',
            'nama'      => 'Batu Bara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '544',
            'nama'      => 'Logam Mulia,Emas,Intan,Perak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '545',
            'nama'      => 'Logam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '546',
            'nama'      => 'Geologi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '546.1',
            'nama'      => 'Vulkanologi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '546.11',
            'nama'      => 'Pengawasan Gunung Berapi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '546.2',
            'nama'      => 'Sumur Artesis, Air Bawah Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '547',
            'nama'      => 'Hidrologi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '548',
            'nama'      => 'Kesamudraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '549',
            'nama'      => 'Pesisir Pantai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '550',
            'nama'      => 'PERHUBUNGAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551',
            'nama'      => 'Perhubungan Darat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.1',
            'nama'      => 'Lalu Lintas Jalan Raya, Sungai, Danau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.11',
            'nama'      => 'Keamanan Lalu Lintas, Rambu-Rambu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.2',
            'nama'      => 'Angkutan Jalan Raya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.21',
            'nama'      => 'Perizinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.22',
            'nama'      => 'Terminal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.23',
            'nama'      => 'Alat Angkutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.3',
            'nama'      => 'Angkutan Sungai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.31',
            'nama'      => 'Perizinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.32',
            'nama'      => 'Terminal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.33',
            'nama'      => 'Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.4',
            'nama'      => 'Angkutan Danau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.41',
            'nama'      => 'Perizinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.42',
            'nama'      => 'Terminal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.43',
            'nama'      => 'Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.5',
            'nama'      => 'Feri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.51',
            'nama'      => 'Perizinan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.52',
            'nama'      => 'Terminal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.53',
            'nama'      => 'Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '551.6',
            'nama'      => 'Perkereta-Apian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552',
            'nama'      => 'Perhubungan Laut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.1',
            'nama'      => 'Lalu Lintas Angkutan Laut, Pelayanan Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.11',
            'nama'      => 'Keamanan Lalu Lintas, Rambu-Rambu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.12',
            'nama'      => 'Pelayaran Dalam Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.13',
            'nama'      => 'Pelayaran Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.2',
            'nama'      => 'Perkapalan Alat Angkutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.3',
            'nama'      => 'Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.4',
            'nama'      => 'Pengerukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '552.5',
            'nama'      => 'Penjagaan Pantai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '553',
            'nama'      => 'Perhubungan Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '553.1',
            'nama'      => 'Lalu Lintas Udara / Keamanan Lalu Lintas Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '553.2',
            'nama'      => 'Pelabuhan Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '553.3',
            'nama'      => 'Alat Angkutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '554',
            'nama'      => 'Pos',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555',
            'nama'      => 'Telekomunikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555.1',
            'nama'      => 'Telepon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555.2',
            'nama'      => 'Telegram',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555.3',
            'nama'      => 'Telex / SSB, Faximile',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555.4',
            'nama'      => 'Satelit, Internet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '555.5',
            'nama'      => 'Stasiun Bumi, Parabola',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '556',
            'nama'      => 'Pariwisata dan Rekreasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '556.1',
            'nama'      => 'Obyek Kepariwisataan Taman Mini Indonesia Indah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '556.2',
            'nama'      => 'Perhotelan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '556.3',
            'nama'      => 'Travel service',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '556.4',
            'nama'      => 'Tempat Rekreasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '557',
            'nama'      => 'Meteorologi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '557.1',
            'nama'      => 'Ramalan Cuaca',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '557.2',
            'nama'      => 'Curah Hujan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '557.3',
            'nama'      => 'Kemarau Panjang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '558',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '559',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '560',
            'nama'      => 'TENAGA KERJA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '560.1',
            'nama'      => 'Pengangguran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '561',
            'nama'      => 'Upah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '562',
            'nama'      => 'Penempatan Tenaga Kerja, TKI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '563',
            'nama'      => 'Latihan Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '564',
            'nama'      => 'Tenaga Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '564.1',
            'nama'      => 'Butsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '564.2',
            'nama'      => 'Padat Karya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '565',
            'nama'      => 'Perselisihan Perburuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '566',
            'nama'      => 'Keselamatan Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '567',
            'nama'      => 'Pemutusan Hubungan Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '568',
            'nama'      => 'kesejahteraan Buruh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '569',
            'nama'      => 'Tenaga Orang Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '570',
            'nama'      => 'PERMODALAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '571',
            'nama'      => 'Modal Domestik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '572',
            'nama'      => 'Modal Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '573',
            'nama'      => 'Modal Patungan (Joint Venture) / Penyertaan Modal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '574',
            'nama'      => 'Pasar Uang Dan Modal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '575',
            'nama'      => 'Saham',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '576',
            'nama'      => 'Belanja Modal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '577',
            'nama'      => 'Modal Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '580',
            'nama'      => 'PERBANKAN / MONETER',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '581',
            'nama'      => 'Kredit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '582',
            'nama'      => 'Investasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '583',
            'nama'      => 'Pembukaan ,Perubahan,Penutupan Rekening, Deposito',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '584',
            'nama'      => 'Bank Pembangunan Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '585',
            'nama'      => 'Asuransi Dana Kecelakaan Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '586',
            'nama'      => 'Alat Pembayaran, Cek, Giro, Wesel, Transfer',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '587',
            'nama'      => 'Fiskal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '588',
            'nama'      => 'Hutang Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '589',
            'nama'      => 'Moneter',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '590',
            'nama'      => 'AGRARIA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591',
            'nama'      => 'Tataguna Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591.1',
            'nama'      => 'Pemetaan dan Pengukuran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591.2',
            'nama'      => 'Perpetaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591.3',
            'nama'      => 'penyediaan Data',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591.4',
            'nama'      => 'Fatwa Tata Guna Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '591.5',
            'nama'      => 'Tanah Kritis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592',
            'nama'      => 'Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.1',
            'nama'      => 'Redistribusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.11',
            'nama'      => 'Pendaftaran Pemilikan Dan Pengurusan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.12',
            'nama'      => 'Penentuan Tanah Obyek Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.13',
            'nama'      => 'Pembagian Tanah Obyek Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.14',
            'nama'      => 'Sengketa Redistribusi Tanah Obyek Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.2',
            'nama'      => 'Ganti Rugi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.21',
            'nama'      => 'Ganti Rugi Tanah Kelebihan',
            'uraian'    => 'Meliputi : Sengketa Ganti Rugi Tanah Kelebihan Tanah'])
        ;
        KodeSurat::create([
            'kode'      => '592.22',
            'nama'      => 'Ganti Rugi Tanah Absentee',
            'uraian'    => 'Meliputi : Sengketa Ganti Rugi Tanah Absentee'])
        ;
        KodeSurat::create([
            'kode'      => '592.23',
            'nama'      => 'Ganti Rugi Tanah Partikelir',
            'uraian'    => 'Meliputi : Sengketa Ganti Rugi Tanah Partikelir'])
        ;
        KodeSurat::create([
            'kode'      => '592.3',
            'nama'      => 'Bagi Hasil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.31',
            'nama'      => 'Penetapan Imbangan Bagi Hasil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.32',
            'nama'      => 'Pelaksanaan Perjanjian Bagi Hasil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.33',
            'nama'      => 'Sengketa Perjanjian Bagi Hasil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.4',
            'nama'      => 'Gadai Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.41',
            'nama'      => 'Pendaftaran Pemilikan Dan Pengurusan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.42',
            'nama'      => 'Pelaksanaan Gadai Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.43',
            'nama'      => 'Sengketa Gadai Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.5',
            'nama'      => 'Bimbingan dan Penyuluhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.6',
            'nama'      => 'Pengembangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '592.7',
            'nama'      => 'Yayasan Dana Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593',
            'nama'      => 'Pengurusan Hak-Hak Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.01',
            'nama'      => 'Penyusunan Program Dan Bimbingan Teknis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.1',
            'nama'      => 'Sewa Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.11',
            'nama'      => 'Sewa Tanah Untuk Tanaman Tertentu, Tebu, Tembakau, Rosela, Chorcorus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.2',
            'nama'      => 'Hak Milik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.21',
            'nama'      => 'Perorangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.22',
            'nama'      => 'Badan Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.3',
            'nama'      => 'Hak Pakai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.31',
            'nama'      => 'Perorangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.311',
            'nama'      => 'Warga Negara Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.312',
            'nama'      => 'Warga Negara Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.32',
            'nama'      => 'Badan Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.321',
            'nama'      => 'Badan Hukum Indonesia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.322',
            'nama'      => 'Badan Hukum Asing, Kedutaan, Konsulat Kantor Dagang Asing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.33',
            'nama'      => 'Tanah Gedung-Gedung Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.4',
            'nama'      => 'Guna Usaha',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.41',
            'nama'      => 'Perkebunan Besar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.42',
            'nama'      => 'Perkebunan Rakyat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.43',
            'nama'      => 'Peternakan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.44',
            'nama'      => 'Perikanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.45',
            'nama'      => 'Kehutanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.5',
            'nama'      => 'Hak Guna Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.51',
            'nama'      => 'Perorangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.52',
            'nama'      => 'Badan Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.53',
            'nama'      => 'P3MB (Panitia Pelaksana Penguasaan Milik Belanda)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.54',
            'nama'      => 'Badan Hukum Asing Belanda-Prrk No 5165',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.55',
            'nama'      => 'Pemulihan Hak (Pen Pres 4/1960)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.6',
            'nama'      => 'Hak Pengelolaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.61',
            'nama'      => 'PN Perumnas, Bonded Ware House, Industrial Estate, Real Estate',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.62',
            'nama'      => 'Perusahaan Daerah Pembangunan Perumahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.7',
            'nama'      => 'Sengketa Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.71',
            'nama'      => 'Peradilan Perkara Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.8',
            'nama'      => 'Pencabutan dan Pembebasan Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.81',
            'nama'      => 'Pencabutan Hak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.82',
            'nama'      => 'Pembebasan Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '593.83',
            'nama'      => 'Ganti Rugi Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594',
            'nama'      => 'Pendaftaran Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.1',
            'nama'      => 'Pengukuran / Pemetaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.11',
            'nama'      => 'Fotogrametri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.12',
            'nama'      => 'Terristris',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.13',
            'nama'      => 'Triangulasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.14',
            'nama'      => 'Peralatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.2',
            'nama'      => 'Dana Pengukuran (Permen Agraria No. 61/1965)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.3',
            'nama'      => 'Sertifikat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '594.4',
            'nama'      => 'Pejabat Pembuat Akta Tanah (PPAT)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '595',
            'nama'      => 'Lahan Transmigrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '595.1',
            'nama'      => 'Tataguna Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '595.2',
            'nama'      => 'Landreform',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '595.3',
            'nama'      => 'Pengurusan Hak-Hak Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '595.4',
            'nama'      => 'Pendaftaran Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '596',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '597',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '598',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '599',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '600',
            'nama'      => 'PEKERJAAN UMUM DAN KETENAGAKERJAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '601',
            'nama'      => 'Tata Bangunan Konstruksi Dan Industri Konstruksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602',
            'nama'      => 'Kontraktor Pemborong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602.1',
            'nama'      => 'Tender',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602.2',
            'nama'      => 'Pennunjukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602.3',
            'nama'      => 'Prakualifikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602.31',
            'nama'      => 'Daftar Rekanan Mampu (DRM)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '602.32',
            'nama'      => 'Tanda Daftar Rekanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '603',
            'nama'      => 'Arsitektur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604',
            'nama'      => 'Bahan Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.1',
            'nama'      => 'Tanah Dan Batu Seperti: Batu Belah, Steen Slaag, Split dsb',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.2',
            'nama'      => 'Aspal, Aspal Buatan, Aspal Alam (butas)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.3',
            'nama'      => 'Besi Dan Logam Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.31',
            'nama'      => 'Besi Beton',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.32',
            'nama'      => 'Besi Profil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.33',
            'nama'      => 'Paku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.34',
            'nama'      => 'Alumunium, Profil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.4',
            'nama'      => 'Bahan-Bahan Pelindung Dan Pengawet ',
            'uraian'    => '(Cat, Tech Til, Pengawet Kayu)']
    );
        KodeSurat::create([
            'kode'      => '604.5',
            'nama'      => 'Semen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.6',
            'nama'      => 'Kayu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.7',
            'nama'      => 'Bahan Penutup Atap ',
            'uraian'    => '(Genting, Asbes Gelombang, Seng Dan Sebagainya)']
    );
        KodeSurat::create([
            'kode'      => '604.8',
            'nama'      => 'Alat-Alat Penggantung Dan Pengunci',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '604.9',
            'nama'      => 'Bahan-Bahan Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605',
            'nama'      => 'Instalasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.1',
            'nama'      => 'Instalasi Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.2',
            'nama'      => 'Instalasi Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.3',
            'nama'      => 'Instalasi Air Sanitasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.4',
            'nama'      => 'Instalasi Pengatur Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.5',
            'nama'      => 'Instalasi Akustik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '605.6',
            'nama'      => 'Instalasi Cahaya / Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606',
            'nama'      => 'Konstruksi Pencegahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.1',
            'nama'      => 'Konstruksi Pencegahan Terhadap Kebakaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.2',
            'nama'      => 'Konstruksi Pencegahan Terhadap Gempa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.3',
            'nama'      => 'Konstruksi Penegahan Terhadap Angin Udara/Panas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.4',
            'nama'      => 'Konstruksi Pencegahan Terhadap Kegaduhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.5',
            'nama'      => 'Konstruksi Pencegahan Terhadap Gas/Explosive',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.6',
            'nama'      => 'Konstruksi Pencegahan Terhadap Serangga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '606.7',
            'nama'      => 'Konstruksi Pencegahan Terhadap Radiasi Atom',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '607',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '608',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '609',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '610',
            'nama'      => 'PENGAIRAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611',
            'nama'      => 'Irigasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.1',
            'nama'      => 'Bangunan Waduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.11',
            'nama'      => 'Bendungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.12',
            'nama'      => 'Tanggul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.13',
            'nama'      => 'Pelimpahan Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.14',
            'nama'      => 'Menara Pengambilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.2',
            'nama'      => 'Bangunan Pengambilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.21',
            'nama'      => 'Bendungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.22',
            'nama'      => 'Bendungan Dengan Pintu Bilas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.23',
            'nama'      => 'Bendungan Dengan Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.24',
            'nama'      => 'Pengambilan Bebas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.25',
            'nama'      => 'Pengambilan Bebas Dengan Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.26',
            'nama'      => 'Sumur Dengan Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.27',
            'nama'      => 'Kantung Lumpur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.28',
            'nama'      => 'Slit Ekstrator',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.29',
            'nama'      => 'Escope Channel',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.3',
            'nama'      => 'Bangunan Pembawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.31',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.311',
            'nama'      => 'Saluran Induk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.312',
            'nama'      => 'Saluran Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.313',
            'nama'      => 'Suplesi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.314',
            'nama'      => 'Tersier',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.315',
            'nama'      => 'Saluran Kwarter',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.316',
            'nama'      => 'Saluran Pasangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.317',
            'nama'      => 'Saluran Tertutup / Terowongan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.32',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.321',
            'nama'      => 'Bangunan Bagi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.322',
            'nama'      => 'Bangunan Bagi Dan Sadap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.323',
            'nama'      => 'Bangunan Sadap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.324',
            'nama'      => 'Bangunan Check',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.325',
            'nama'      => 'Bangunan Terjun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.33',
            'nama'      => 'Box Tersier',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.34',
            'nama'      => 'Got Miring',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.35',
            'nama'      => 'Talang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.36',
            'nama'      => 'Syphon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.37',
            'nama'      => 'Gorong-Gorong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.38',
            'nama'      => 'Pelimpah Samping',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.4',
            'nama'      => 'Bangunan Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.41',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.411',
            'nama'      => 'Saluran Pembuang Induk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.412',
            'nama'      => 'Saluran Pembuang Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.413',
            'nama'      => 'Saluran Tersier',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.42',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.421',
            'nama'      => 'Bangunan Outlet',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.422',
            'nama'      => 'Bangunan Terjun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.423',
            'nama'      => 'Bangunan Penahan Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.43',
            'nama'      => 'Gorong-Gorong Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.44',
            'nama'      => 'Talang Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.45',
            'nama'      => 'Syphon Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.5',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.51',
            'nama'      => 'Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.511',
            'nama'      => 'Jalan Inspeksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.512',
            'nama'      => 'Jalan Logistik Waduk Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.52',
            'nama'      => 'Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.521',
            'nama'      => 'Jembatan Inspeksi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.522',
            'nama'      => 'Jembatan Hewan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.53',
            'nama'      => 'Tangga Cuci',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.54',
            'nama'      => 'Kubangan Kerbau',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.55',
            'nama'      => 'Waduk Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.56',
            'nama'      => 'Bangunan Penunjang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.57',
            'nama'      => 'Jaringan Telepon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '611.58',
            'nama'      => 'Stasiun Agro',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612',
            'nama'      => 'Folder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.1',
            'nama'      => 'Tanggul Keliling',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.11',
            'nama'      => 'Tanggul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.12',
            'nama'      => 'Bangunan Penutup Sungai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.13',
            'nama'      => 'Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.2',
            'nama'      => 'Bangunan Pembawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.21',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.211',
            'nama'      => 'Saluran Muka',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.212',
            'nama'      => 'Saluran Pembawa Waduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.213',
            'nama'      => 'Saluran Pembawa Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.22',
            'nama'      => 'Stasiun Pompa Pemasukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.23',
            'nama'      => 'Bangunan Bagi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.24',
            'nama'      => 'Gorong-Gorong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.25',
            'nama'      => 'Syphon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.3',
            'nama'      => 'Bangunan Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.31',
            'nama'      => 'Stasiun Pompa Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.32',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.321',
            'nama'      => 'Saluran Pembuang Induk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.322',
            'nama'      => 'Saluran Pembuang Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.33',
            'nama'      => 'Pintu Air Pembuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.34',
            'nama'      => 'Gorong-Gorong Pembuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.35',
            'nama'      => 'Syphon Pembuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.4',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.41',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.411',
            'nama'      => 'Bangunan Pengukur Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.412',
            'nama'      => 'Bangunan Pengukur Curah Hujan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.413',
            'nama'      => 'Bangunan Gudang Stasiun Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.414',
            'nama'      => 'Bangunan Listrik Stasiun Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '612.42',
            'nama'      => 'Rumah Petugas Aksploitasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613',
            'nama'      => 'Pasang Surut',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.1',
            'nama'      => 'Bangunan Pembawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.11',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.111',
            'nama'      => 'Saluran Pembawa Induk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.112',
            'nama'      => 'Saluran Pembawa Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.113',
            'nama'      => 'Saluran Pembawa Tersier',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.114',
            'nama'      => 'Saluran penyimpanan air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.12',
            'nama'      => 'Bangunan Pintu Pemasukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.2',
            'nama'      => 'Bangunan Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.21',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.211',
            'nama'      => 'Saluran Pembuang Induk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.212',
            'nama'      => 'Saluran Pembuang Sekunder',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.213',
            'nama'      => 'Saluran Pembuang Tersier',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.214',
            'nama'      => 'Saluran Pengumpul Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.22',
            'nama'      => 'Bangunan Pintu Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.3',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.31',
            'nama'      => 'Kolam Pasang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.32',
            'nama'      => 'Saluran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.321',
            'nama'      => 'Saluran Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.322',
            'nama'      => 'Saluran Muka',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.33',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.331',
            'nama'      => 'Bangunan Penangkis Kotoran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.332',
            'nama'      => 'Bangunan Pengukur Muka Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.333',
            'nama'      => 'Bangunan Pengukur Curah Hujan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.34',
            'nama'      => 'Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '613.35',
            'nama'      => 'Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614',
            'nama'      => 'Pengendalian Sungai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.1',
            'nama'      => 'Bangunan Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.11',
            'nama'      => 'Tanggul Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.12',
            'nama'      => 'Pintu Pengatur Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.13',
            'nama'      => 'Klep Pengatur Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.14',
            'nama'      => 'Tembok Pengaman Talud',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.15',
            'nama'      => 'Krib',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.16',
            'nama'      => 'Kantung Lumpur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.17',
            'nama'      => 'Check-Dam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.18',
            'nama'      => 'Syphon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.2',
            'nama'      => 'Saluran Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.21',
            'nama'      => 'Saluran Banjir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.22',
            'nama'      => 'Saluran Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.23',
            'nama'      => 'Corepure',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.3',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.31',
            'nama'      => 'Warning System',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.32',
            'nama'      => 'Stasiun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.321',
            'nama'      => 'Stasiun Pengukur Curah Hujan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.322',
            'nama'      => 'Stasiun Pengukur Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.323',
            'nama'      => 'Stasiun Pengukur Cuaca',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '614.324',
            'nama'      => 'Stasiun Pos Penjagaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '615',
            'nama'      => 'Pengamanan Pantai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '615.1',
            'nama'      => 'Tanggul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '615.2',
            'nama'      => 'Krib',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '615.3',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '616',
            'nama'      => 'Air Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '616.1',
            'nama'      => 'Stasiun Pompa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '616.2',
            'nama'      => 'Bangunan Pembawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '616.3',
            'nama'      => 'Bangunan Pembuang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '616.4',
            'nama'      => 'Bangunan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '617',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '618',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '619',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '620',
            'nama'      => 'JALAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621',
            'nama'      => 'Jalan Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.1',
            'nama'      => 'Daerah Penguasaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.11',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.12',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.13',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.2',
            'nama'      => 'Bangunan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.21',
            'nama'      => 'Jalan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.22',
            'nama'      => 'Jembatan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.23',
            'nama'      => 'Kantor Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.24',
            'nama'      => 'Gedung Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.25',
            'nama'      => 'Barak Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.26',
            'nama'      => 'Laboratorium Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.27',
            'nama'      => 'Rumah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.3',
            'nama'      => 'Badan Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.31',
            'nama'      => 'Pekerjaan Tanah (Earth Work)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.32',
            'nama'      => 'Stabilisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.4',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.41',
            'nama'      => 'Lapis Pondasi Bawah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.42',
            'nama'      => 'Lapis Pondasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.43',
            'nama'      => 'Lapis Permukaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.5',
            'nama'      => 'Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.51',
            'nama'      => 'Parit Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.52',
            'nama'      => 'Gorong-Gorong (Culvert)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.6',
            'nama'      => 'Buku Trotuir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.61',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.62',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.63',
            'nama'      => 'Pasangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.7',
            'nama'      => 'Median',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.71',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.72',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.73',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.74',
            'nama'      => 'Pasangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.8',
            'nama'      => 'Daerah Samping',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.81',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.82',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.9',
            'nama'      => 'Bangunan Pelengkap Dan Pengamanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.91',
            'nama'      => 'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.92',
            'nama'      => 'Lampu Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.93',
            'nama'      => 'Lampu Pengatur Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.94',
            'nama'      => 'Patok-Patok KM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.95',
            'nama'      => 'Patok-Patok ROW (Sempadan)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.96',
            'nama'      => 'Rel Pengamanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.97',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.98',
            'nama'      => 'Turap Penahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '621.99',
            'nama'      => 'Bronjong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622',
            'nama'      => 'Jalan Luar Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.1',
            'nama'      => 'Daerah Penguasaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.11',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.12',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.13',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.2',
            'nama'      => 'Bangunan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.21',
            'nama'      => 'Jalan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.22',
            'nama'      => 'Jembatan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.23',
            'nama'      => 'Kantor Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.24',
            'nama'      => 'Gudang Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.25',
            'nama'      => 'Barak Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.26',
            'nama'      => 'Laboratorium Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.27',
            'nama'      => 'Rumah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.3',
            'nama'      => 'Badan Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.31',
            'nama'      => 'Pekerjaan Tanah (Earth Work)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.32',
            'nama'      => 'Stabilisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.4',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.41',
            'nama'      => 'Lapis Pondasi Bawah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.42',
            'nama'      => 'Lapis Pondasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.43',
            'nama'      => 'Lapis Permukaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.5',
            'nama'      => 'Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.51',
            'nama'      => 'Parit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.52',
            'nama'      => 'Gorong-Gorong (Culvert)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.53',
            'nama'      => 'Sub Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.6',
            'nama'      => 'Trotoar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.61',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.62',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.7',
            'nama'      => 'Median',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.71',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.72',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.73',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.74',
            'nama'      => 'Pasangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.8',
            'nama'      => 'Daerah Samping',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.81',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.82',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.9',
            'nama'      => 'Bangunan Pelengkap Dan Pengamanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.91',
            'nama'      => 'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.92',
            'nama'      => 'Lampu Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.93',
            'nama'      => 'Lampu Pengatur Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.94',
            'nama'      => 'Patok-Patok KM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.95',
            'nama'      => 'Patok-Patok ROW (Sempadan)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.96',
            'nama'      => 'Rel Pengamanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.97',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.98',
            'nama'      => 'Turap Penahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '622.99',
            'nama'      => 'Bronjong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '623',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '623',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '623',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '630',
            'nama'      => 'JEMBATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631',
            'nama'      => 'Jembatan Pada Jalan Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.1',
            'nama'      => 'Daerah Penguasaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.11',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.12',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.13',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.2',
            'nama'      => 'Bangunan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.21',
            'nama'      => 'Jalan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.22',
            'nama'      => 'Jembatan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.23',
            'nama'      => 'Kantor Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.24',
            'nama'      => 'Gudang Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.25',
            'nama'      => 'Barak Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.26',
            'nama'      => 'Laboratorium Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.27',
            'nama'      => 'Rumah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.3',
            'nama'      => 'Pekerjaan Tanah (Earth Work)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.31',
            'nama'      => 'Galian Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.32',
            'nama'      => 'Timbunan Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.4',
            'nama'      => 'Pondasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.41',
            'nama'      => 'Pondasi Kepala Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.42',
            'nama'      => 'Pondasi Pilar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.43',
            'nama'      => 'Angker',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.5',
            'nama'      => 'Bangunan Bawah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.51',
            'nama'      => 'Kepala Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.52',
            'nama'      => 'Pilar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.53',
            'nama'      => 'Piloon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.54',
            'nama'      => 'Landasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.6',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.61',
            'nama'      => 'Gelagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.62',
            'nama'      => 'Lantai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.63',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.64',
            'nama'      => 'Jalan Orang / Trotoar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.65',
            'nama'      => 'Sandaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.66',
            'nama'      => 'Talang air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.7',
            'nama'      => 'Bangunan / Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.71',
            'nama'      => 'Turap Penahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.72',
            'nama'      => 'Bronjong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.73',
            'nama'      => '',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.74',
            'nama'      => 'Kist Dam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.75',
            'nama'      => 'Corepure',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.76',
            'nama'      => 'Krib',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.8',
            'nama'      => 'Bangunan Pelengkap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.81',
            'nama'      => 'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.82',
            'nama'      => 'Lampu Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.83',
            'nama'      => 'Lampu Pengatur Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.84',
            'nama'      => 'Patok Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.85',
            'nama'      => 'Patok ROW (Sempadan)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.86',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.9',
            'nama'      => 'Oprit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.91',
            'nama'      => 'Badan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.92',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.93',
            'nama'      => 'Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.94',
            'nama'      => 'Baku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '631.95',
            'nama'      => 'Median',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632',
            'nama'      => 'Jembatan Pada Jalan Luar Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.1',
            'nama'      => 'Daerah Penguasaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.11',
            'nama'      => 'Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.12',
            'nama'      => 'Tanaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.13',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.2',
            'nama'      => 'Bangunan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.21',
            'nama'      => 'Jalan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.22',
            'nama'      => 'Jembatan Sementara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.23',
            'nama'      => 'Kantor Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.24',
            'nama'      => 'Gudang Proyek',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.25',
            'nama'      => 'Barak Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.26',
            'nama'      => 'Laboratorium Lapangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.27',
            'nama'      => 'Rumah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.3',
            'nama'      => 'Pekerjaan Tanah (Earth Work)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.31',
            'nama'      => 'Galian Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.32',
            'nama'      => 'Timnunan Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.4',
            'nama'      => 'Pondasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.41',
            'nama'      => 'Pondasi Kepala Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.42',
            'nama'      => 'Pondasi Pilar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.43',
            'nama'      => 'Pondasi Angker',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.5',
            'nama'      => 'Bangunan Bawah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.51',
            'nama'      => 'Kepala Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.52',
            'nama'      => 'Pilar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.53',
            'nama'      => 'Piloon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.54',
            'nama'      => 'Landasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.6',
            'nama'      => 'Bangunan Atas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.61',
            'nama'      => 'Gelagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.62',
            'nama'      => 'Lantai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.63',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.64',
            'nama'      => 'Jalan Orang / Trotoar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.65',
            'nama'      => 'Sandaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.66',
            'nama'      => 'Talang Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.7',
            'nama'      => 'Bangunan Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.71',
            'nama'      => 'Turap / Penahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.72',
            'nama'      => 'Bronjong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.73',
            'nama'      => 'Stek Dam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.74',
            'nama'      => 'Kist Dam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.75',
            'nama'      => 'Corepure',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.76',
            'nama'      => 'Krib',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.8',
            'nama'      => 'Bangunan Pelengkap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.81',
            'nama'      => 'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.82',
            'nama'      => 'Lampu Penerangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.83',
            'nama'      => 'Lampu Pengatur Lalu Lintas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.84',
            'nama'      => 'Patok Pengaman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.85',
            'nama'      => 'Patok ROW (Sempadan)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.86',
            'nama'      => 'Pagar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.9',
            'nama'      => 'Oprit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.91',
            'nama'      => 'Badan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.92',
            'nama'      => 'Perkerasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.93',
            'nama'      => 'Drainage',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.94',
            'nama'      => 'Baku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '632.95',
            'nama'      => 'Median',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '633',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '634',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '635',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640',
            'nama'      => 'BANGUNAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.1',
            'nama'      => 'Gedung Pengadilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.2',
            'nama'      => 'Rumah Pejabat Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.3',
            'nama'      => 'Gedung DPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.4',
            'nama'      => 'Gedung Balai Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.5',
            'nama'      => 'Penjara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '640.6',
            'nama'      => 'Perkantoran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '642',
            'nama'      => 'Bangunan Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '642.1',
            'nama'      => 'Taman Kanak-Kanak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '642.2',
            'nama'      => 'SD & SEKOLAH MENENGAH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '642.3',
            'nama'      => 'Perguruan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '643',
            'nama'      => 'Bangunan Rekreasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '643.1',
            'nama'      => 'BANGUNAN OLAH RAGA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '643.2',
            'nama'      => 'Gedung Kesenian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '643.3',
            'nama'      => 'Gedung Pemancar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '644',
            'nama'      => 'Bangunan Perdagangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '644.1',
            'nama'      => 'Pusat Perbelanjaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '644.2',
            'nama'      => 'Gedung Perdagangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '644.3',
            'nama'      => 'Bank',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '644.4',
            'nama'      => 'Pekantoran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645',
            'nama'      => 'Bangunan Pelayanan Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.1',
            'nama'      => 'MCK',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.2',
            'nama'      => 'Gedung Parkir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.3',
            'nama'      => 'Rumah Sakit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.4',
            'nama'      => 'Gedung Telkom',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.5',
            'nama'      => 'Terminal Angkutan udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.6',
            'nama'      => 'Terminal Angkutan udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.7',
            'nama'      => 'Terminal Angkutan Darat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '645.8',
            'nama'      => 'Bangunan Keagamaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '646',
            'nama'      => 'Bangunan Peninggalan Sejarah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '646.1',
            'nama'      => 'Monumen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '646.2',
            'nama'      => 'Candi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '646.3',
            'nama'      => 'Keraton',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '646.4',
            'nama'      => 'Rumah Tradisional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '647',
            'nama'      => 'Bangunan Industri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648',
            'nama'      => 'Bangunan Tempat Tinggal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.1',
            'nama'      => 'Rumah Perkotaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.11',
            'nama'      => 'Inti / Sederhana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.12',
            'nama'      => 'Sedang / Mewah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.2',
            'nama'      => 'Rumah Pedesaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.21',
            'nama'      => 'Rumah Contoh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.3',
            'nama'      => 'Real Estate',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '648.4',
            'nama'      => 'Bapetarum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649',
            'nama'      => 'Elemen Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.1',
            'nama'      => 'Pondasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.11',
            'nama'      => 'Di Atas Tiang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.2',
            'nama'      => 'Dinding',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.21',
            'nama'      => 'Penahan Beban',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.22',
            'nama'      => 'Tidak Menahan Beban',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.3',
            'nama'      => 'Atap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.4',
            'nama'      => 'Lantai / Langit-Langit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.41',
            'nama'      => 'Supended',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.42',
            'nama'      => 'Solit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.5',
            'nama'      => 'Pintu / Jendela',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.51',
            'nama'      => 'Pintu Harmonik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.52',
            'nama'      => 'Pintu Biasa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.53',
            'nama'      => 'Pintu Sorong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.54',
            'nama'      => 'Pintu Kayu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.55',
            'nama'      => 'Jendela Sorong',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '649.56',
            'nama'      => 'Jendela Vertikal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '650',
            'nama'      => 'TATA KOTA',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '651',
            'nama'      => 'Daerah Perdagangan / Pelabuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '651.1',
            'nama'      => 'Daerah Pusat Perbelanjaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '651.2',
            'nama'      => 'Daerah Perkotaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '652',
            'nama'      => 'Daerah Pemerintah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '653',
            'nama'      => 'Daerah Perumahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '653.1',
            'nama'      => 'Kepadatan Rendah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '653.2',
            'nama'      => 'Kepadatan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '654',
            'nama'      => 'Daerah Industri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '654.1',
            'nama'      => 'Industri Berat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '654.2',
            'nama'      => 'Industri Ringan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '654.3',
            'nama'      => 'Industri Ringan (Home Industry)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '655',
            'nama'      => 'Daerah Rekreasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '655.1',
            'nama'      => 'Public Garden',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '655.2',
            'nama'      => 'Sport & Playing Fields',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '655.3',
            'nama'      => 'Open Space',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '656',
            'nama'      => 'Transportasi (Tata Letak)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '656.1',
            'nama'      => 'Jaringan Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '656.11',
            'nama'      => 'Penerangan Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '656.2',
            'nama'      => 'Jaringan Kereta Api',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '656.3',
            'nama'      => 'Jaringan Sungai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657',
            'nama'      => 'Assaineering',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.1',
            'nama'      => 'Saluran Pengumpulan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.2',
            'nama'      => 'Instalasi Pengolahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.21',
            'nama'      => 'Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.211',
            'nama'      => 'Bangunan Penyaringan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.212',
            'nama'      => 'Bangunan Penghancur Kotoran / Sampah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.213',
            'nama'      => 'Bangunan Pengendap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.214',
            'nama'      => 'Bangunan Pengering Lumpur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.22',
            'nama'      => 'Unit Densifektan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '657.23',
            'nama'      => 'Unit Perpompaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658',
            'nama'      => 'Kesehatan Lingkungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.1',
            'nama'      => 'Persampahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.11',
            'nama'      => 'Bangunan Pengumpul',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.12',
            'nama'      => 'Bangunan Pemusnahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.2',
            'nama'      => 'Pengotoran Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.3',
            'nama'      => 'pengotoran Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.31',
            'nama'      => 'Air Buangan Industri Limbah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.4',
            'nama'      => 'Kegaduhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '658.5',
            'nama'      => 'Kebersihan Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '659',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660',
            'nama'      => 'TATA LINGKUNGAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660.1',
            'nama'      => 'Persampahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660.2',
            'nama'      => 'Kebersihan Lingkungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660.3',
            'nama'      => 'Pencemaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660.31',
            'nama'      => 'Pecemaran Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '660.32',
            'nama'      => 'Pencemaran Udara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '661',
            'nama'      => 'Daerah Hutan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '662',
            'nama'      => 'Daerah Pertanian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '663',
            'nama'      => 'Daerah Pemikiman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '664',
            'nama'      => 'Pusat Pertumbuhan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '665',
            'nama'      => 'Transportasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '665.1',
            'nama'      => 'Jaringan Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '665.2',
            'nama'      => 'Jaringan Kereta Api',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '665.3',
            'nama'      => 'Jaringan Sungai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '666',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '667',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '668',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '670',
            'nama'      => 'KETENAGAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671',
            'nama'      => 'Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.1',
            'nama'      => 'Kelistrikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.11',
            'nama'      => 'Kelisrikan PLN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.12',
            'nama'      => 'Kelistrikan Non PLN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.2',
            'nama'      => 'Pembangkit Tenaga Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.21',
            'nama'      => 'PLTA  ( Pembangkit  Listrik Tenaga Air )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.22',
            'nama'      => 'PLTD  ( Pembangkit Listrik Tenaga Diesel )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.23',
            'nama'      => 'PLTG P ( Pembangkit Listrik Tenaga Gas )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.24',
            'nama'      => 'PLTM ( Pembangkit  Listrik Tenaga Matahari )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.25',
            'nama'      => 'PLTN ( Pembangkit Listrik Tenaga Nuklir )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.26',
            'nama'      => 'PLTPB ( Pembangkit Listrik Tenaga Uap )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.3',
            'nama'      => 'Transmisi Tenaga Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.31',
            'nama'      => 'Gardu Induk/Gardu Penghubung/Gardu Trafo',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.32',
            'nama'      => 'Saluran Udara Tegangan Tinggi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.33',
            'nama'      => 'Kabel Bawah Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.4',
            'nama'      => 'Distribusi Tenaga Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.41',
            'nama'      => 'Gardu Distribusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.42',
            'nama'      => 'Tegangan Rendah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.43',
            'nama'      => 'Tegangan Menengah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.44',
            'nama'      => 'Jaringan Bawah Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.5',
            'nama'      => 'Pengusahaan Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.51',
            'nama'      => 'Sambungan Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.52',
            'nama'      => 'Penjualan Tenaga Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '671.53',
            'nama'      => 'Tarif Listrik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '672',
            'nama'      => 'Tenaga Air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '673',
            'nama'      => 'Tenaga Minyak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '674',
            'nama'      => 'Tenaga Gas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '675',
            'nama'      => 'Tenaga Matahari',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '676',
            'nama'      => 'Tenaga Nuklir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '677',
            'nama'      => 'Tenaga Panas Bumi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '678',
            'nama'      => 'Tenaga Uap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '679',
            'nama'      => 'Tenaga Lainya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '680',
            'nama'      => 'PERALATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '681',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '682',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '683',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '690',
            'nama'      => 'AIR MINUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691',
            'nama'      => 'Intake',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.1',
            'nama'      => 'Broncaptering',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.2',
            'nama'      => 'Sumur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.3',
            'nama'      => 'Bendungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.4',
            'nama'      => 'Saringan (screen)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.5',
            'nama'      => 'Pintu air',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.6',
            'nama'      => 'Saluran Pembawa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.7',
            'nama'      => 'Alat Ukur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '691.8',
            'nama'      => 'Perpompaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692',
            'nama'      => 'Transmisi Air Baku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.1',
            'nama'      => 'Perpipaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.2',
            'nama'      => 'Katup Udara (Air Relief)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.3',
            'nama'      => 'Katup Penguras (Blow Off)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.4',
            'nama'      => 'Bak Pelepas Tekanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.5',
            'nama'      => 'Jembatan Pipa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '692.6',
            'nama'      => 'Syphon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693',
            'nama'      => 'Instalasi Pengelolaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.1',
            'nama'      => 'Bangunan Ukur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.2',
            'nama'      => 'Bangunan Aerasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.3',
            'nama'      => 'Bangunan Pengendapan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.4',
            'nama'      => 'Bangunan Pembubuh Bahan Kimia',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.5',
            'nama'      => 'Bangunan Pengaduk',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.6',
            'nama'      => 'Bangunan Saringan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.7',
            'nama'      => 'Perpompaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '693.8',
            'nama'      => 'Clear Hell',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694',
            'nama'      => 'Distribusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.1',
            'nama'      => 'Reservoir Menara Bawah Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.11',
            'nama'      => 'Menara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.12',
            'nama'      => 'reservoir di Bawah Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.2',
            'nama'      => 'Perpipaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.3',
            'nama'      => 'Perpompaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.4',
            'nama'      => 'Jembatan Pipa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.5',
            'nama'      => 'Syphon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.6',
            'nama'      => 'Hydran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.61',
            'nama'      => 'Hydran Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.62',
            'nama'      => 'Hydran Kebakaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.7',
            'nama'      => 'Katup',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.71',
            'nama'      => 'Katup Udara (Air Relief)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.72',
            'nama'      => 'Katup Pelepas (Blow Off)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '694.8',
            'nama'      => 'Bak Pelepas Tekanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '695',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '696',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '697',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '698',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '699',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '700',
            'nama'      => 'PENGAWASAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '701',
            'nama'      => 'Bidang Urusan Dalam',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '702',
            'nama'      => 'Bidang Peralatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '703',
            'nama'      => 'Bidang Kekayaan Daerah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '704',
            'nama'      => 'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '705',
            'nama'      => 'Bidang Perencanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '706',
            'nama'      => 'Bidang Organisasi / Ketatalaksanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '707',
            'nama'      => 'Bidang Penelitian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '708',
            'nama'      => 'Bidang Konferensi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '709',
            'nama'      => 'Bidang Perjalanan Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '710',
            'nama'      => 'BIDANG PEMERINTAHAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '711',
            'nama'      => 'Bidang Pemerintahan Pusat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '712',
            'nama'      => 'Bidang Pemerintahan Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '713',
            'nama'      => 'Bidang Pemerintahan Kabupaten / Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '714',
            'nama'      => 'Bidang Pemerintahan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '715',
            'nama'      => 'Bidang MPR / DPR',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '716',
            'nama'      => 'Bidang DPRD Provinsi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '717',
            'nama'      => 'Bidang DPRD Kabupaten / Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '718',
            'nama'      => 'Bidang Hukum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '719',
            'nama'      => 'Bidang Hubungan Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '720',
            'nama'      => 'BIDANG POLITIK',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '721',
            'nama'      => 'Bidang Kepartaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '722',
            'nama'      => 'Bidang Organisasi Kemasyarakatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '723',
            'nama'      => 'Bidang Organisasi Profesi Dan Fungsional',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '724',
            'nama'      => 'Bidang Organisasi Pemuda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '725',
            'nama'      => 'Bidang Organisasi Buruh, Tani, Dan Nelayan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '726',
            'nama'      => 'Bidang Organisasi Wanita',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '727',
            'nama'      => 'Bidang Pemilihan Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '730',
            'nama'      => 'BIDANG KEAMANAN/KETERTIBAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '731',
            'nama'      => 'Bidang Pertahanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '732',
            'nama'      => 'Bidang Kemiliteran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '733',
            'nama'      => 'Bidang Perlindungan Masyarakat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '734',
            'nama'      => 'Bidang Kemanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '735',
            'nama'      => 'bidang Kejahatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '736',
            'nama'      => 'Bidang Bencana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '737',
            'nama'      => 'Bidang Kecelakaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '738',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '739',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '740',
            'nama'      => 'BIDANG KESEJAHTERAAN RAKYAT',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '741',
            'nama'      => 'Bidang Pembagunan Desa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '742',
            'nama'      => 'Bidang Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '743',
            'nama'      => 'Bidang Kebudayaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '744',
            'nama'      => 'Bidang Kesehatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '745',
            'nama'      => 'Bidang Agama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '746',
            'nama'      => 'Bidang Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '747',
            'nama'      => 'Bidang Kependudukan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '748',
            'nama'      => 'Bidang Media Massa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '749',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '750',
            'nama'      => 'BIDANG PEREKONOMIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '751',
            'nama'      => 'Bidang Perdagangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '752',
            'nama'      => 'Bidang Pertanian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '753',
            'nama'      => 'Bidang Perindustrian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '754',
            'nama'      => 'Bidang Pertambangan / Kesamudraan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '755',
            'nama'      => 'Bidang Perhubungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '756',
            'nama'      => 'Bidang Tenaga Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '757',
            'nama'      => 'Bidang Permodalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '758',
            'nama'      => 'Bidang Perbankan / Moneter',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '759',
            'nama'      => 'Bidang Agraria',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '760',
            'nama'      => 'BIDANG PEKERJAAN UMUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '761',
            'nama'      => 'Bidang Pengairan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '762',
            'nama'      => 'Bidang Jalan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '763',
            'nama'      => 'Bidang Jembatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '764',
            'nama'      => 'Bidang Bangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '765',
            'nama'      => 'Bidang Tata Kota',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '766',
            'nama'      => 'Bidang Lingkungan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '767',
            'nama'      => 'Bidang Ketenagaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '768',
            'nama'      => 'Bidang Peralatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '769',
            'nama'      => 'Bidang Air Minum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '770',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '771',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '772',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '780',
            'nama'      => 'BIDANG KEPEGAWAIAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '781',
            'nama'      => 'Bidang Pengadaan Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '782',
            'nama'      => 'Bidang Mutasi Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '783',
            'nama'      => 'Bidang Kedudukan Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '784',
            'nama'      => 'Bidang Kesejahteran Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '785',
            'nama'      => 'Bidang Cuti',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '786',
            'nama'      => 'Bidang Penilaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '787',
            'nama'      => 'Bidang Tata Usaha Kepegawaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '788',
            'nama'      => 'Bidang Pemberhentian Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '789',
            'nama'      => 'Bidang Pendidikan Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '790',
            'nama'      => 'BIDANG KEUANGAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '791',
            'nama'      => 'Bidang Anggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '792',
            'nama'      => 'Bidang Otorisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '793',
            'nama'      => 'Bidang Verifikasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '794',
            'nama'      => 'Bidang Pembukuan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '795',
            'nama'      => 'Bidang Perbendaharaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '796',
            'nama'      => 'Bidang Pembina Kebendaharaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '797',
            'nama'      => 'Bidang Pendapatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '798',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '799',
            'nama'      => 'Bidang Bendaharaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800',
            'nama'      => 'KEPEGAWAIAN',
            'uraian'    => 'Klasifikasi Disini: Kebijaksanaan Kepegawaian'])
        ;
        KodeSurat::create([
            'kode'      => '800.1',
            'nama'      => 'Perencanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800.2',
            'nama'      => 'Penelitian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800.043',
            'nama'      => 'Pengaduan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800.05',
            'nama'      => 'Tim',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800.07',
            'nama'      => 'Statistik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '800.08',
            'nama'      => 'Peraturan Perundang-Undangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '810',
            'nama'      => 'PENGADAAN',
            'uraian'    => 'Meliputi: Lamaran, Pengujian Kesehatan, Dan Pengangkatan Calon Pegawai'])
        ;
        KodeSurat::create([
            'kode'      => '811',
            'nama'      => 'Lamaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '811.1',
            'nama'      => 'Testing',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '811.2',
            'nama'      => 'Screening',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '811.3',
            'nama'      => 'Panggilan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '812',
            'nama'      => 'Pengujian Kesehatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813',
            'nama'      => 'Pengangkatan Calon Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813.1',
            'nama'      => 'Pengangkatan Calon Pegawai Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813.2',
            'nama'      => 'Pengangkatan Calon Pegawai Golongan II',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813.3',
            'nama'      => 'Pengangkatan Calon Pegawai Golongan III',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813.4',
            'nama'      => 'Pengangkatan Calon Pegawai Golongan IV',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '813.5',
            'nama'      => 'Pengangkatan Calon Guru Inpres',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '814',
            'nama'      => 'Pengangkatan Tenaga Lepas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '814.1',
            'nama'      => 'Pengangkatan Tenaga Bulanan / Tenaga Kontrak',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '814.2',
            'nama'      => 'Pengangkatan Tenaga Harian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '814.3',
            'nama'      => 'Pengangkatan Tenaga Pensiunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '815',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '816',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '817',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '820',
            'nama'      => 'MUTASI',
            'uraian'    => 'Meliputi: Pengangkatan, Kenaikan Gaji Berkala, Kenaikan Pangkat, Pemindahan, Pelimpahan Datasering, Tugas Belajar Dan Wajib Militer'])
        ;
        KodeSurat::create([
            'kode'      => '821',
            'nama'      => 'Pengangkatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.1',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Tetap',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.11',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.12',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.13',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.14',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.15',
            'nama'      => 'Pengangkatan Menjadi Pegawai Negeri Sipil Yang Cuti Di Luar Tanggungan Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.2',
            'nama'      => 'Pengangkatan Dalam Jabatan, Pembebasan Dari Jabatan, Berita Acara Serah Terima Jabatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.21',
            'nama'      => 'Sekjen/Dirjen/Irjen/Kabag',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.22',
            'nama'      => 'Kepala Biro/Direktur/Inspektur/Kepala Pusat/Sekretaris/Kepala Dinas/Asisten Sekwilda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.23',
            'nama'      => 'Kepala Bagian/Kepala Sub Direktorat/Kepala Bidang/Inspektur Pembantu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.24',
            'nama'      => 'Kepala Subbagian/Kepala Seksi/Kepala Sub Bidang/Pemeriksa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.25',
            'nama'      => 'Residen/Pembantu Gubernur',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.26',
            'nama'      => 'Wedana/Pembantu Bupati',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.27',
            'nama'      => 'Camat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.28',
            'nama'      => 'Lurah Administratif (Lurah Desa)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '821.29',
            'nama'      => 'Jabatan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '822',
            'nama'      => 'Kenaikan Gaji Berkala',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '822.1',
            'nama'      => 'Pegawai Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '822.2',
            'nama'      => 'Pegawai Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '822.3',
            'nama'      => 'Pegawai Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '822.4',
            'nama'      => 'Pegawai Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '823',
            'nama'      => 'Kenaikan Pangkat / Pengangkatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '823.1',
            'nama'      => 'Pegawai Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '823.2',
            'nama'      => 'Pegawai Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '823.3',
            'nama'      => 'Pegawai Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '823.4',
            'nama'      => 'Pegawai Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824',
            'nama'      => 'Pemindahan / Pelimpahan / Perbantuan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.1',
            'nama'      => 'Pegawai Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.2',
            'nama'      => 'Pegawai Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.3',
            'nama'      => 'Pegawai Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.4',
            'nama'      => 'Pegawai Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.5',
            'nama'      => 'Lolos Butuh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.6',
            'nama'      => 'Kurikulum dan Silabi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '824.7',
            'nama'      => 'Proposal (TOR)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '825',
            'nama'      => 'Datasering dan Penempatan Kembali',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '826',
            'nama'      => 'Penunjukan Tugas Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '826.1',
            'nama'      => 'Dalam Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '826.2',
            'nama'      => 'Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '826.3',
            'nama'      => 'Tunjangan Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '826.4',
            'nama'      => 'Penempatan Kembali',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '827',
            'nama'      => 'Wajib Militer',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '828',
            'nama'      => 'Mutasi Dengan Instansi Lain',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '829',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '830',
            'nama'      => 'KEDUDUKAN',
            'uraian'    => 'Meliputi: Perhitungan Masa Kerja, Penyesuaian Pangkat/Gaji, Penghargaan Ijasah, Dan Jenjang Pangkat'])
        ;
        KodeSurat::create([
            'kode'      => '831',
            'nama'      => 'Perhitungan Masa Kerja',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '832',
            'nama'      => 'Penyesuaian Pangkat / Gaji',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '832.1',
            'nama'      => 'Pegawai Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '832.2',
            'nama'      => 'Pegawai Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '832.3',
            'nama'      => 'Pegawai Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '832.4',
            'nama'      => 'Pegawai Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '833',
            'nama'      => 'Penghargaan Ijazah / Penyesuaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '834',
            'nama'      => 'Jenjang Pangkat / Eselonering',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '835',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '836',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '837',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '840',
            'nama'      => 'KESEJAHTERAAN PEGAWAI',
            'uraian'    => 'Meliputi: Tunjangan, Dana, Perawatan Kesehatan, Koperasi, Distribusi, Permahan/Tanah, Bantuan Sosial, Rekreasi Dan Dispensasi.']
    );
        KodeSurat::create([
            'kode'      => '841',
            'nama'      => 'Tunjangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.1',
            'nama'      => 'Jabatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.2',
            'nama'      => 'Kehormatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.3',
            'nama'      => 'Kematian/Uang Duka',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.4',
            'nama'      => 'Tunjangan Hari Raya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.5',
            'nama'      => 'Perjalanan Dinas Tetap/Cuti/Pindah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.6',
            'nama'      => 'Keluarga',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '841.7',
            'nama'      => 'Sandang, Pangan, Papan (Bapertarum)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '842',
            'nama'      => 'Dana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '842.1',
            'nama'      => 'Taspen',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '842.2',
            'nama'      => 'Kesehatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '842.3',
            'nama'      => 'Asuransi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '843',
            'nama'      => 'Perawatan Kesehatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '843.1',
            'nama'      => 'Poliklinik',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '843.2',
            'nama'      => 'Perawatan Dokter',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '843.3',
            'nama'      => 'Obat-Obatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '843.4',
            'nama'      => 'Keluarga Berencana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '844',
            'nama'      => 'Koperasi / Distribusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '844.1',
            'nama'      => 'Distribusi Pangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '844.2',
            'nama'      => 'Distribusi Sandang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '844.3',
            'nama'      => 'Distribusi Papan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '845',
            'nama'      => 'Perumahan/Tanah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '845.1',
            'nama'      => 'Perumahan Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '845.2',
            'nama'      => 'Tanah Kapling',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '845.3',
            'nama'      => 'Losmen/Hotel',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '846',
            'nama'      => 'Bantuan Sosial',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '846.1',
            'nama'      => 'Bantuan Kebakaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '846.2',
            'nama'      => 'Bantuan Kebanjiran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '847',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '848',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '849',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '850',
            'nama'      => 'CUTI ',
            'uraian'    => 'Meliputi Cuti Tahunan, Cuti Besar, Cuti Sakit, Cuti Hamil, Cuti Naik Haji, Cuti Diluar Tanggungan Negara Dan Cuti Alasan Lain'])
        ;
        KodeSurat::create([
            'kode'      => '851',
            'nama'      => 'Cuti Tahunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '852',
            'nama'      => 'Cuti Besar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '853',
            'nama'      => 'Cuti Sakit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '854',
            'nama'      => 'Cuti Hamil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '855',
            'nama'      => 'Cuti Naik Haji/Umroh',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '856',
            'nama'      => 'Cuti Di Luar Tangungan Neagara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '857',
            'nama'      => 'Cuti Alasan Lain/Alasan Penting',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '858',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '859',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '860',
            'nama'      => 'PENILAIAN',
            'uraian'    => 'Meliputi: Penghargaan, Hukuman, Konduite, Ujian Dinas,Penilaian Kakayaan Pribadi Dan Rehabilitasi'])
        ;
        KodeSurat::create([
            'kode'      => '861',
            'nama'      => 'Penghargaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '861.1',
            'nama'      => 'Bintang/Satyalencana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '861.2',
            'nama'      => 'Kenaikan Pangkat Anumerta',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '861.3',
            'nama'      => 'Kenaikan Gaji Istimewa',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '861.4',
            'nama'      => 'Hadiah Berupa Uang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '861.5',
            'nama'      => 'Pegawai Teladan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '862',
            'nama'      => 'Hukuman',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '862.1',
            'nama'      => 'Teguran Peringatan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '862.2',
            'nama'      => 'Penundaan Kenaikan Gaji',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '862.3',
            'nama'      => 'Penurunan Pangkat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '862.4',
            'nama'      => 'Pemindahan',
            'uraian'    => 'Catatan: Pemberhentian Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan Hormat Lihat 887 Dan 888'])
        ;
        KodeSurat::create([
            'kode'      => '863',
            'nama'      => 'Konduite, DP3, Disiplin Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '864',
            'nama'      => 'Ujian Dinas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '864.1',
            'nama'      => 'Tingkat 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '864.2',
            'nama'      => 'Tingkat 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '864.3',
            'nama'      => 'Tingkat 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '865',
            'nama'      => 'Penilaian Kehidupan Pegawai Negeri',
            'uraian'    => 'Meliputi: Petunjuk Pelaksanaan Hidup Sederhana, Penilaian Kekayaan Pribadi ( LP2P )']
    );
        KodeSurat::create([
            'kode'      => '866',
            'nama'      => 'Rehabilitasi / Pengaktifan Kembali',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '867',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '868',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '869',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '870',
            'nama'      => 'TATA USAHA KEPEGAWAIAN',
            'uraian'    => 'Meliputi: Formasi, Bezetting, Registrasi,Daftar, Riwayat Hidup, Hak, Penggajian, Sumpah,/Janji Dan Korps Pegawai'])
        ;
        KodeSurat::create([
            'kode'      => '871',
            'nama'      => 'Formasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '872',
            'nama'      => 'Bezetting/Daftar Urut Kepegawaian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '873',
            'nama'      => 'Registrasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '873.1',
            'nama'      => 'NIP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '873.2',
            'nama'      => 'KARPEG',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '873.3',
            'nama'      => 'Legitiminasi/Tanda Pengenal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '873.4',
            'nama'      => 'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '874',
            'nama'      => 'Daftar Riwayat Pekerjaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '874.1',
            'nama'      => 'Tanggal Lahir',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '874.2',
            'nama'      => 'Penggantian Nama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '874.3',
            'nama'      => 'Izin kepartaian Organisasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '875',
            'nama'      => 'Kewenangan Mutasi Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '875.1',
            'nama'      => 'Pelimpahan Wewenang',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '875.2',
            'nama'      => 'Specimen Tanda Tangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '876',
            'nama'      => 'Penggajian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '876.1',
            'nama'      => 'SKPP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '877',
            'nama'      => 'Sumpah/Janji',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '878',
            'nama'      => 'Korps Pegawai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '879',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '880',
            'nama'      => 'PEMBERHENTIAN PEGAWAI',
            'uraian'    => 'Meliputi Atas  Pemberhentian,Permintaan Sendiri, Dengan Hak Pensiun, Karena Meninggal Dunia, Alasan Lain, Dengan Diberi Uang Pesangon, Uang Tnggu Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan  Hormat'])
        ;
        KodeSurat::create([
            'kode'      => '881',
            'nama'      => 'Permintaan Sendiri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882',
            'nama'      => 'Dengan Hak Pensiun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.1',
            'nama'      => 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 1',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.2',
            'nama'      => 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 2',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.3',
            'nama'      => 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 3',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.4',
            'nama'      => 'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 4',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.5',
            'nama'      => 'Pensiun Janda / Duda',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.6',
            'nama'      => 'Pensiun Yatim Piatu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '882.7',
            'nama'      => 'Uang Muka Pensiun',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '883',
            'nama'      => 'Karena Meninggal',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '883.1',
            'nama'      => 'Karena Meninggal Dalam Tugas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '884',
            'nama'      => 'Alasan Lain',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '885',
            'nama'      => 'Uang Pesangon',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '886',
            'nama'      => 'Uang Tunggu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '887',
            'nama'      => 'Untuk Sementara Waktu',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '888',
            'nama'      => 'Tidak Dengan Hormat',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '889',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '890',
            'nama'      => 'PENDIDIKAN PEGAWAI',
            'uraian'    => 'Meliputi: Perencanaan, Pendidikan Reguler, Pendidikan Non-Reguler, Pendidikan Ke Luar Negeri, Metode, Tenaga Pengajar, Administrasi Pendidikan, Fasilitas Sarana Pendidikan'])
        ;
        KodeSurat::create([
            'kode'      => '891',
            'nama'      => 'Perencanaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '891.1',
            'nama'      => 'Program',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '891.2',
            'nama'      => 'Kurikulum dan Silabi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '891.3',
            'nama'      => 'Proposal ( TOR )',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '892',
            'nama'      => 'Pendidikan _Egular / Kader',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '892.1',
            'nama'      => 'IPDN / APDN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '892.2',
            'nama'      => 'Kursus-Kursus Reguler',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893',
            'nama'      => 'Pendidikan dan Pelatihan / Non Reguler',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893.1',
            'nama'      => 'LEMHANAS',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893.2',
            'nama'      => 'Pendidikan dan Pelatihan Struktural, SPATI, SPAMEN, SPAMA, ADUMLA, ADUM',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893.3',
            'nama'      => 'Kursus-Kursus / Penataran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893.4',
            'nama'      => 'Diklat Tehnik, Fungsional Dan Manajemen Pemerintahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '893.5',
            'nama'      => 'Diklat Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '894',
            'nama'      => 'Pendidikan Luar Negeri',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '894.1',
            'nama'      => 'Berkesinambungan / Berkala / Bergelar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '894.2',
            'nama'      => 'Non Gelar / Diploma',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895',
            'nama'      => 'Metode',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.1',
            'nama'      => 'Kuliah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.2',
            'nama'      => 'Ceramah, Simposium',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.3',
            'nama'      => 'Diskusi, Raker, Seminar, Lokakarya, Orientasi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.4',
            'nama'      => 'Studi Lapangan, Kkn, Widyawisata',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.5',
            'nama'      => 'Tanya Jawab / Sylabi / Modul / Kursil',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.7',
            'nama'      => 'Penugasan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '895.8',
            'nama'      => 'Gladi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '896',
            'nama'      => 'Tenaga Pengajar / Widyaiswara/Narasumber',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '896.1',
            'nama'      => 'Moderator',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897',
            'nama'      => 'Administrasi Pendidikan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897.1',
            'nama'      => 'Tahun Pelajaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897.2',
            'nama'      => 'Persyaratan, Pendaftaran, Testing, Ujian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897.3',
            'nama'      => 'STTP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897.4',
            'nama'      => 'Penilaian Angka Kredit',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '897.5',
            'nama'      => 'Laporan Pendidikan Dan Pelatihan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898',
            'nama'      => 'Fasilitas Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.1',
            'nama'      => 'Tunjangan Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.2',
            'nama'      => 'Asrama',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.3',
            'nama'      => 'Uang Makan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.4',
            'nama'      => 'Uang Transport',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.5',
            'nama'      => 'Uang Buku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.6',
            'nama'      => 'Uang Ujian',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.7',
            'nama'      => 'Uang Semester / Uang Kuliah',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '898.8',
            'nama'      => 'Uang Saku',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '899',
            'nama'      => 'Sarana',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '899.1',
            'nama'      => 'Bantuan Sarana Belajar',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '899.2',
            'nama'      => 'Bantuan Alat-Alat Tulis',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '899.3',
            'nama'      => 'Bantuan Sarana Belajar Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '900',
            'nama'      => 'KEUANGAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '901',
            'nama'      => 'Nota Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '902',
            'nama'      => 'APBN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '903',
            'nama'      => 'APBD',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '904',
            'nama'      => 'APBN-P',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '905',
            'nama'      => 'Dana Alokasi Umum',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '906',
            'nama'      => 'Dana Alokasi Khusus',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '907',
            'nama'      => 'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '907',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '908',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '910',
            'nama'      => 'ANGGARAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '911',
            'nama'      => 'Rutin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '912',
            'nama'      => 'Pembangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '913',
            'nama'      => 'Anggaran Belanja Tambahan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '914',
            'nama'      => 'Daftar Isian Kegiatan (DIK)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '914.1',
            'nama'      => 'Daftar Usulan Kegiatan (DUK)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '915',
            'nama'      => 'Daftar Isian Poyek (DIP)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '915.1',
            'nama'      => 'Daftar Usulan Proyek (DUP)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '915.2',
            'nama'      => 'Daftar Isian Pengguna Anggaran (DIPA)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '916',
            'nama'      => 'Revisi Anggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '917',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '918',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '920',
            'nama'      => 'OTORISASI / SKO',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '921',
            'nama'      => 'Rutin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '922',
            'nama'      => 'Pembangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '923',
            'nama'      => 'SIAP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '924',
            'nama'      => 'Ralat SKO',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '925',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '926',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '927',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '930',
            'nama'      => 'VERIFIKASI',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '931',
            'nama'      => 'SPM Rutin (daftar p8)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '932',
            'nama'      => 'SPM Pembangunan (daftar p8)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '933',
            'nama'      => 'Penerimaan (daftar p6. p7)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '934',
            'nama'      => 'SPJ Rutin',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '935',
            'nama'      => 'SPJ Pembangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '936',
            'nama'      => 'Nota Pemeriksaan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '937',
            'nama'      => 'SP Pemindahan Pembukuan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '938',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '939',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '940',
            'nama'      => 'PEMBUKUAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '941',
            'nama'      => 'Penyusunan Perhitungan Anggaran',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '942',
            'nama'      => 'Permintaan  Data Anggaran Laporan Fisik Pembangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '943',
            'nama'      => 'Laporan Fisik Pembangunan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '944',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '945',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '950',
            'nama'      => 'PERBENDAHARAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '951',
            'nama'      => 'Tuntutan Ganti Rugi (ICW Pasal 74)',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '952',
            'nama'      => 'Tuntutan Bendaharawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '953',
            'nama'      => 'Penghapusan Kekayaan Negara',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '954',
            'nama'      => 'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '955',
            'nama'      => 'Spesimen Tanda Tangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '956',
            'nama'      => 'Surat Tagihan Piutang, Ikhtisar Bulanan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '957',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '958',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '959',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '960',
            'nama'      => 'PEMBINAAN KEBENDAHARAAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '961',
            'nama'      => 'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '962',
            'nama'      => 'Pemeriksaan Administrasi Bendaharawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '963',
            'nama'      => 'Laporan Keuangan Bendaharawan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '964',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '965',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '966',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '970',
            'nama'      => 'PENDAPATAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '971',
            'nama'      => 'Perimbangan Keuangan',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '972',
            'nama'      => 'Subsidi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '973',
            'nama'      => 'Pajak,Ipeda, IHH,IHPH',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '974',
            'nama'      => 'Retribusi',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '975',
            'nama'      => 'Bea',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '976',
            'nama'      => 'Cukai',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '977',
            'nama'      => 'Pungutan / PNBP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '978',
            'nama'      => 'Bantuan Presiden, Menteri Dan Bantuan Lainnya',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '979',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '980',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '981',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '990',
            'nama'      => 'BENDAHARAWAN',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '991',
            'nama'      => 'SKPP / SPP',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '992',
            'nama'      => 'Teguran SPJ',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '993',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '994',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        KodeSurat::create([
            'kode'      => '995',
            'nama'      => '-',
            'uraian'    => '-'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
