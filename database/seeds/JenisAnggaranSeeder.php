<?php

use App\JenisAnggaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        JenisAnggaran::truncate();
        JenisAnggaran::create([
            'id'    => 4,
            'nama'  => 'PENDAPATAN'
        ]);
        JenisAnggaran::create([
            'id'    => 5,
            'nama'  => 'BELANJA'
        ]);
        JenisAnggaran::create([
            'id'    => 6,
            'nama'  => 'PEMBIAYAAN'
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
