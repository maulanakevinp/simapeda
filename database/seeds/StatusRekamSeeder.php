<?php

use App\StatusRekam;
use Illuminate\Database\Seeder;

class StatusRekamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusRekam::create(['nama' => 'BELUM REKAM']);
        StatusRekam::create(['nama' => 'SUDAH REKAM']);
        StatusRekam::create(['nama' => 'CARD PRINTED']);
        StatusRekam::create(['nama' => 'PRINT READY RECORD']);
        StatusRekam::create(['nama' => 'CARD SHIPPED']);
        StatusRekam::create(['nama' => 'SENT FOR CARD PRINTING']);
        StatusRekam::create(['nama' => 'CARD ISSUED']);
    }
}
