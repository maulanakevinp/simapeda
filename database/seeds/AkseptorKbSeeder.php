<?php

use App\AkseptorKb;
use Illuminate\Database\Seeder;

class AkseptorKbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AkseptorKb::create(['nama' => 'PIL']);
        AkseptorKb::create(['nama' => 'IUD']);
        AkseptorKb::create(['nama' => 'SUNTIK']);
        AkseptorKb::create(['nama' => 'KONDOM']);
        AkseptorKb::create(['nama' => 'SUSUK KB']);
        AkseptorKb::create(['nama' => 'STERILISASI WANITA']);
        AkseptorKb::create(['nama' => 'STERILISASI PRIA']);
        AkseptorKb::create(['nama' => 'LAINNYA']);
    }
}
