<?php

use App\Asuransi;
use Illuminate\Database\Seeder;

class AsuransiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asuransi::truncate();
        Asuransi::create(['nama' => 'TIDAK/BELUM PUNYA']);
        Asuransi::create(['nama' => 'BPJS PENERIMA BANTUAN IURAN']);
        Asuransi::create(['nama' => 'BPJS NON PENERIMA BANTUAN IURAN']);
        Asuransi::create(['nama' => 'ASURANSI LAINNYA']);
    }
}
