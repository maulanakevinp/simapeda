<?php

use App\StatusRekam;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusRekamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StatusRekam::truncate();
        StatusRekam::create(['nama' => 'BELUM REKAM']);
        StatusRekam::create(['nama' => 'SUDAH REKAM']);
        StatusRekam::create(['nama' => 'CARD PRINTED']);
        StatusRekam::create(['nama' => 'PRINT READY RECORD']);
        StatusRekam::create(['nama' => 'CARD SHIPPED']);
        StatusRekam::create(['nama' => 'SENT FOR CARD PRINTING']);
        StatusRekam::create(['nama' => 'CARD ISSUED']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
