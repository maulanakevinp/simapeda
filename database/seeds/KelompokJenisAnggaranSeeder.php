<?php

use App\KelompokJenisAnggaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelompokJenisAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        KelompokJenisAnggaran::truncate();
        KelompokJenisAnggaran::create([
            'id'                => 41,
            'nama'              => 'Pendapatan Asli Desa'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 42,
            'nama'              => 'Pendapatan transfer'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 43,
            'nama'              => 'Pendapatan Lain-lain'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 51,
            'nama'              => 'BIDANG PENYELENGGARAN PEMERINTAHAN DESA'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 52,
            'nama'              => 'BIDANG PELAKSANAAN PEMBANGUNAN DESA'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 53,
            'nama'              => 'BIDANG PEMBINAAN KEMASYARAKATAN'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 54,
            'nama'              => 'BIDANG PEMBERDAYAAN MASYARAKAT'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 55,
            'nama'              => 'BIDANG PENANGGULANGAN BENCANA, DARURAT DAN MENDESAK DESA'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 61,
            'nama'              => 'Penerimaan Biaya'
        ]);

        KelompokJenisAnggaran::create([
            'id'                => 62,
            'nama'              => 'Pengeluaran Biaya'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
