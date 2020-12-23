<?php

use App\AkseptorKb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkseptorKbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AkseptorKb::truncate();
        AkseptorKb::create(['nama' => 'KB Alamiah/Kalender']);
        AkseptorKb::create(['nama' => 'Pil']);
        AkseptorKb::create(['nama' => 'Susuk KB (Implant)']);
        AkseptorKb::create(['nama' => 'Tubektomi']);
        AkseptorKb::create(['nama' => 'Kondom']);
        AkseptorKb::create(['nama' => 'Spiral']);
        AkseptorKb::create(['nama' => 'Tidak Menggunakan kontrasepsi']);
        AkseptorKb::create(['nama' => 'Vasektomi']);
        AkseptorKb::create(['nama' => 'Obat Tradisional']);
        AkseptorKb::create(['nama' => 'Suntik']);
        AkseptorKb::create(['nama' => 'Lainnya']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
