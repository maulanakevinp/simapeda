<?php

use App\Asuransi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsuransiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Asuransi::truncate();
        Asuransi::create(['nama' => 'TIDAK/BELUM PUNYA']);
        Asuransi::create(['nama' => 'BPJS PENERIMA BANTUAN IURAN']);
        Asuransi::create(['nama' => 'BPJS NON PENERIMA BANTUAN IURAN']);
        Asuransi::create(['nama' => 'ASURANSI LAINNYA']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
